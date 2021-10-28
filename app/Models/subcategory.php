<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'subcategories';
    protected $fillable = [
        'category_id', 'name', 'price','package_id'
    ];

    public function mainCategory(){
        return $this->hasMany(category::class);
    }
}
