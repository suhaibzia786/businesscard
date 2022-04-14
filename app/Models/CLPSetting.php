<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CLPSetting extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'color', 'template_id'];
}