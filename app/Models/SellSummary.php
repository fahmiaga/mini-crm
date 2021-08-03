<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellSummary extends Model
{
    use HasFactory;
    public $timestap = false;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'sell_summaries';
    protected $fillable = ['date', 'employee', 'created_date', 'last_update', 'price_total', 'discount_total', 'total'];
}
