<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'ratings';
    protected $fillable = [
        'user_id', 'package_id','status', 'description',
    ];
}
