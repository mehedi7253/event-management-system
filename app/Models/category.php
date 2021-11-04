<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'categories';
    protected $fillable = [
        'package_id', 'category_name', 'price','description'
    ];

    public function packages(){
        return $this->belongsTo(package::class, 'package_id');
    }

    public function subcategory(){
        return $this->hasMany(subcategory::class, 'category_id');
    }
}
