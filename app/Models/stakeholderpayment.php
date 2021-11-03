<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stakeholderpayment extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'stakeholderpayments';
    protected $fillable = [
        'stakeholder_id', 'order_id', 'percent', 'given_amount', 'status'
    ];

    public function categories(){
        return $this->hasMany(category::class);
    }
}
