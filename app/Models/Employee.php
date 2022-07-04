<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incomingMails()
    {
        return $this->hasMany(IncomingMail::class);
    }

    public function outgoingMails()
    {
        return $this->hasMany(OutgoingMail::class);
    }
}
