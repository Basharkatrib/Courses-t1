<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewCourseBroadcastNotification;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description','instructer','new_price','old_price','image'];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function getRouteKeyName()
    {
        return 'title';
    }
    
}
