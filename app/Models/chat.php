<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'chats';
    protected $fillable = [
        'sender_id', 'rechiver_id', 'message','status'
    ];
}
