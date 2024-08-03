<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'title','teacher', 'description', 'url', 'image'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function isPlaying()
    {
        // تأكد من أن لديك عمود is_playing في جدول الفيديوهات
        return $this->is_playing;
    }
}
