<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_css', 
        'seo_description', 
        'seo_keywords',
        'app_name',
        'default_fonts',
        'home_images',
        'maintenance_mode',
        'maintenance_token',
    ];
}
