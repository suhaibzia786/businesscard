<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'color', 'font_family', 'sample_image', 'logo_position', 'has_qrCode'];
}