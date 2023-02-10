<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Encryption\Encrypter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use PragmaRX\Google2FA\Google2FA as Google2FA;
use Spatie\Crypto\Rsa\KeyPair;

class Member extends Model
{
    use HasFactory;

    const OFFLINE_TIMEOUT_S = 20;

    protected $table = 'members';

    protected $fillable = [
        'display_name',
        'status',
        'about_me',
        'contact_code',
        'email',
        'phone',
        'birthday',
        'login_notification',
        'findable_by_mutual_contacts',
        'allow_requests_from',
        'dark_mode'
    ];

    protected $hidden = [
        'password',
        'mfa_secret',
        'private_key'
    ];

    public function receivedContacts() {
        return $this->hasMany(Contact::class, 'recipient_id');
    }

    public function sentContacts() {
        return $this->hasMany(Contact::class, 'author_id');
    }

    public function getContactRequestsAttribute() {
        return $this->receivedContacts()->where('accepted', '=', false)->get();
    }

    public function getContactsAttribute() {
        $receivedContacts = $this->receivedContacts()->where('accepted', true)->get();
        $sentContacts = $this->sentContacts()->where('accepted', true)->get();
        return $receivedContacts->merge($sentContacts);
    }

    public function getMutualContactsAttribute() {
        if($this->attributes['id'] == Auth::user()->id) {
            return null;
        } else {
            $mutualContacts = Contact::where(function ($query) {
                $query->where('author_id', Auth::user()->id)
                      ->where('recipient_id', [])
                      ->where('accepted', true);
            })->orWhere(function ($query) {
                $query->where('recipient_id', Auth::user()->id)
                      ->where('accepted', true);
            })->get();
        }
    }

    public function getMfaEnabledAttribute() {
        return !empty($this->attributes['mfa_secret']);
    }

    public function getIsOnlineAttribute() {
        $now = Carbon::now();
        $latest_ping = Carbon::parse($this->latest_ping);
        return $latest_ping->diffInSeconds($now) < Member::OFFLINE_TIMEOUT_S;
    }

    public function getIsVerifiedAttribute() {
        return !empty($this->attributes['verified_since']);
    }

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = Hash::make($password);
        $this->generateKeypair($password);
    }

    public function setLoginNameAttribute($loginName) {
        $this->attributes['login_name'] = Hash::make($loginName);
    }

    public function updateLatestPingAttribute()
    {
        $this->latest_ping = Carbon::now();
        $this->save();
    }

    public function generateMfaSecretAttribute($password) {
        $mfa = new Google2FA();
        $this->attributes['mfa_secret'] = base64_encode(openssl_encrypt($mfa->generateSecretKey(20), 'AES-128-CBC', $password, OPENSSL_NO_PADDING, $this->attributes['id']));
    }

    public function generateContactSeedAttribute() {
        $this->attributes['contact_seed'] = base64_encode(random_bytes(64));
    }

    public function generateKeypair($password) {
        [$privateKey, $publicKey] = (new KeyPair())->password($password)->generate();
        $this->attributes['public_key'] = $publicKey;
        $this->attributes['private_key'] = $privateKey;
    }

}
