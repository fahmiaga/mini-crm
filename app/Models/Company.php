<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    use HasFactory;
    public $timestap = false;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'companies';
    protected $fillable = ['name', 'email', 'logo', 'website', 'timezone', 'created_at', 'updated_at'];
}
