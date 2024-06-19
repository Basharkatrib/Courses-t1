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
                <h3>VUE JS SCRATCH COURSE</h3>
                <div class="link">
                    <img src="{{ asset('images/person.svg') }}" alt="" srcset="">
                    <a href="#">{{$video->title}}</a>
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
                <div class="price">
                    <p>$400 USD</p>
                    <del>$600 USD</del>
                </div>
            </div>
            @endforeach


        </div>
    </div>
@endsection
