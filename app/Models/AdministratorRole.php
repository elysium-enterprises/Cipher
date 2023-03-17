<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministratorRole extends Model
{
    use HasFactory;

    protected $table = 'administrator_roles';

    protected $fillable = [
        'member_id',
        'permission'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}