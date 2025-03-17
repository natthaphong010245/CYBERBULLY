<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // กำหนดชื่อตารางให้ตรงกับที่สร้างในฐานข้อมูล
    protected $table = 'categories_infographics';

    protected $fillable = [
        'name',
        'image',
        'description'
    ];

    /**
     * Get the infographics for the category
     */
    public function infographics()
    {
        return $this->hasMany(Infographic::class, 'categories_infographics_id');
    }
    
    /**
     * Get only active infographics for the category
     */
    public function activeInfographics()
    {
        return $this->hasMany(Infographic::class, 'categories_infographics_id')
                    ->where('is_active', true)
                    ->orderBy('order', 'asc')
                    ->orderBy('id', 'asc');
    }
}