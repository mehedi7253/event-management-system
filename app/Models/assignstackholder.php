<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignstackholder extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'assignstackholders';
    protected $fillable = [
        'order_id', 'stackholder_id', 'process','comission'
    ];

}
