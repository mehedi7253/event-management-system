<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'packages';
    protected $fillable = [
        'package_name', 'image', 'status'
    ];

    public function categories(){
        return $this->hasMany(category::class);
    }
}
