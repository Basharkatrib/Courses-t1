@extends('User.master.layout')



@section('content')
    <div class="all_videos_all">
        <div class="head">
            <h3>{{$course->title}}</h3>
        </div>

        <div class="all-cards">
            @foreach($course->videos as $video)
            <div class="cards">
                <a href="{{ route('videos.show', $video->id) }}">
                    <img  class="image" src="{{ Storage::url($video->image) }}" alt="Course Image">
                
                </a>
                <h3>{{$video->title}}</h3>
                <div class="link">
                    <img src="{{ asset('images/person.svg') }}" alt="" srcset="">
                    <a href="#">{{$video->teacher}}</a>
                </div>
                <p>{{$video->description}}</p>
                <div class="review">
                    <div class="rating">
                        <i class="rating__star far fa-star"></i>
                        <i class="rating__star far fa-star"></i>
                        <i class="rating__star far fa-star"></i>
                        <i class="rating__star far fa-star"></i>
                        <i class="rating__star far fa-star"></i>
                    </div>
                    <p>(1.2)K</p>
                </div>
                
            </div>
            @endforeach


        </div>
    </div>
@endsection
