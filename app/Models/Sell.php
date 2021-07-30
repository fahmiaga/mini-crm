<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;
    public $timestap = false;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'sells';
    protected $fillable = ['item', 'price', 'discount', 'employee', 'created_date'];
}
