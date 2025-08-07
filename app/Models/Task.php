<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'long_description',
        'completed'
    ];

    protected $casts = [
        'completed' => 'boolean',
    ];

    protected $attributes = [
        'completed' => false,
    ];
    
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeCompleted($query)
    {
        return $query->where('completed', true);
    }

    public function scopePending($query)
    {
        return $query->where('completed', false);
    }

    // toggleStatus method is removed as per the recent edits
    public function toggleStatus()
    {
        $this->completed = !$this->completed;
        $this->save();
    }
}
