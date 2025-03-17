<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infographic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'categories_infographics_id', // เปลี่ยนจาก category_id เป็น categories_infographics_id
        'order',
        'is_active'
    ];

    /**
     * Get the category that owns the infographic
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_infographics_id');
    }

    /**
     * Get the previous infographic in the same category
     */
    public function getPrevious()
    {
        return $this->where('categories_infographics_id', $this->categories_infographics_id)
                    ->where('id', '<', $this->id)
                    ->where('is_active', true)
                    ->orderBy('id', 'desc')
                    ->first();
    }

    /**
     * Get the next infographic in the same category
     */
    public function getNext()
    {
        return $this->where('categories_infographics_id', $this->categories_infographics_id)
                    ->where('id', '>', $this->id)
                    ->where('is_active', true)
                    ->orderBy('id', 'asc')
                    ->first();
    }
}