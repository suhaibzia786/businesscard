<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['photo', 'first_name', 'password', 'role_id', 'last_name', 'office_phone', 
    'fax', 'email', 'mobile', 'company_id', 'status', 'status',
    'created_by', 'updated_by', 'deleted_at'];
}