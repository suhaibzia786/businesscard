<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['logo', 'name', 'slogan', 'website', 'slug', 'email', 'password', 'role_id', 'address_line1', 
    'address_line2', 'city', 'state', 'country', 'zip_code', 'color', 'status',
    'created_by', 'updated_by', 'deleted_at'];
    
}