<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'events';
    protected $fillable = [
        'event_name', 'location', 'start_date','description','image','status',
    ];
}
