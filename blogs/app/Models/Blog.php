<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'author',
        'github',
        'twitter',
        'telegram',
        'cover',
        'date',
        'content',
    ];
    protected $casts = [
        'date' => 'date',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function setCoverAttribute($file)
    {
        if ($this->cover) {
            Storage::disk('public')->delete($this->cover);
        }
        $path = $file->store('coversBlog', 'public');
        $this->attributes['cover'] = '/assets/'.$path;
        $this->save();
    }
    
}
