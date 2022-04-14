<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'template_id', 'slug', 'created_by', 'updated_by', 'deleted_at'];
}