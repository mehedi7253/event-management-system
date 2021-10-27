<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'carts';
    protected $fillable = [
        'package_id', 'category_id', 'sub_category_id','invoice_number'
    ];
}
