<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function show($id)
    {
        $video = Video::with('course.videos')->findOrFail($id);
        return view('User.showvideo', compact('video'));
    }
}
