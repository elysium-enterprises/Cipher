<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'recipient_id'
    ];

    public function setMessageAttribute($message) {
        $this->attributes['message'] = $message;
    }

    public function getMessageAttribute() {
        return $this->attributes['message'];
    }

    public function setAcceptedAttribute($accepted) {
        if($accepted == true) {
            $this->attributes['accepted'] = true;
        } else {
            $this->delete();
        }
    }
}
