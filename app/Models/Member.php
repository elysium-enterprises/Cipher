<?php

namespace App\Models;

use Carbon\Carbon;
use Error;
use Exception;
use Illuminate\Encryption\Encrypter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use PragmaRX\Google2FA\Google2FA as Google2FA;
use Spatie\Crypto\Rsa\KeyPair;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use HasFactory;

    const OFFLINE_TIMEOUT_S = 60;

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
        'cid',
        'password',
        'mfa_secret',
        'private_key',
        'contact_seed'
    ];

    protected $casts = [
        'contact_requests' => 'array',
        'contacts' => 'array',
        'admin_roles' => 'array',
        'mutual_contacts' => 'array'
    ];

    public function getMfaEnabledAttribute()
    {
        return !empty($this->attributes['mfa_secret']);
    }

    public function getIsOnlineAttribute()
    {
        $now = Carbon::now();
        $latest_ping = Carbon::parse($this->latest_ping);
        return $latest_ping->diffInSeconds($now) < Member::OFFLINE_TIMEOUT_S;
    }

    public function getIsVerifiedAttribute()
    {
        return !empty($this->attributes['verified_since']);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
        $this->generateKeypair($password);
        $this->generateContactSeedAttribute();
    }

    public function setCidAttribute($cid)
    {
        $this->attributes['cid'] = $cid;
    }

    public function getCidAttribute()
    {
        return $this->attributes['cid'];
    }

    public function updateLatestPingAttribute()
    {
        $this->latest_ping = Carbon::now();
        $this->save();
    }

    public function generateMfaSecretAttribute($password)
    {
        $mfa = new Google2FA();
        $this->attributes['mfa_secret'] = base64_encode(openssl_encrypt($mfa->generateSecretKey(20), 'AES-128-CBC', $password, OPENSSL_NO_PADDING, $this->attributes['id']));
    }

    public function generateContactSeedAttribute()
    {
        $this->attributes['contact_seed'] = base64_encode(random_bytes(64));
    }

    public function generateKeypair($password)
    {
        [$privateKey, $publicKey] = (new KeyPair())->password($password)->generate();

        $this->attributes['public_key'] = $publicKey;
        $this->attributes['private_key'] = $privateKey;
    }

    // Admin roles
    public function getAdminRolesAttribute()
    {
        return $this->hasMany(AdministratorRole::class, 'member_id');
    }

    public function hasPermission($permission)
    {
        return $this->adminRoles()->where('permission', $permission)->exists();
    }

    public function grantPermission($permission)
    {
        if (!$this->hasPermission($permission)) {
            $role = new AdministratorRole();
            $role->permission = $permission;
            $this->adminRoles()->save($role);
        }
    }

    public function revokePermission($permission)
    {
        $this->adminRoles()->where('permission', $permission)->delete();
    }

    // Contacts

    public function contacts()
    {
        return $this->belongsToMany(Member::class, 'contacts', 'author_id', 'recipient_id')
            ->wherePivot('accepted', true)
            ->orWhere(function ($query) {
                $query->wherePivot('recipient_id', $this->id)
                    ->wherePivot('accepted', true);
            })
            ->withPivot(['id', 'accepted', 'created_at']);
    }

    public function receivedContacts()
    {
        return $this->hasMany(Contact::class, 'recipient_id');
    }

    public function sentContacts()
    {
        return $this->hasMany(Contact::class, 'author_id');
    }

    public function getContactsAttribute()
    {
        // TODO: Maybe this can use some optimizations?
        // Fetch all contacts where the member is either the author or the recipient
        $contacts = Contact::where(function ($query) {
            $query->where('author_id', $this->id)
                ->where('accepted', true);
        })->orWhere(function ($query) {
            $query->where('recipient_id', $this->id)
                ->where('accepted', true);
        })->get();

        // Filter and merge the received and sent contacts
        $receivedContacts = $contacts->filter(function ($contact) {
            return $contact->recipient_id === $this->id;
        });

        $sentContacts = $contacts->filter(function ($contact) {
            return $contact->author_id === $this->id;
        });

        return $receivedContacts->merge($sentContacts);
    }

    public function getContactRequestsAttribute()
    {
        return $this->receivedContacts()->where('accepted', '=', false)->get();
    }

    public function sendContactRequest(Member $recipient)
    {
        $this->contacts()->attach($recipient, ['accepted' => false]);
        // $recipient->notify(new ContactRequestNotification($this));
    }

    public function acceptContactRequest(Member $requester)
    {
        $this->contacts()->updateExistingPivot($requester, ['accepted' => true]);
        $requester->contacts()->updateExistingPivot($this, ['accepted' => true]);
    }

    public function getMutualContactsAttribute()
    {
        if ($this->attributes['id'] == Auth::id()) {
            return [];
        } else {
            $mutualContacts = Contact::where(function ($query) {
                $query->where('author_id', Auth::id())
                    ->where('recipient_id', [])
                    ->where('accepted', true);
            })->orWhere(function ($query) {
                $query->where('recipient_id', Auth::id())
                    ->where('accepted', true);
            })->get();
        }
    }

    // Shop

    public function likedProducts()
    {
        return $this->belongsToMany(Product::class, 'product_likes');
    }
}
