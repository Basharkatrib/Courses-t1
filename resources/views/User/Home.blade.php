@extends('User.master.layout')



@section('content')
    <!--start slider -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{ asset('images/Hero.jpg') }}" alt="" srcset=""></div>
            <div class="swiper-slide"><img src="{{ asset('images/R.png') }}" alt="" srcset=""></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <!--end slider -->
    <!--start category -->
    <div class="all-category">
        @foreach ($courses as $course)
        <div class="item" data-aos="fade-up"><a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a></div>
        @endforeach
    </div>

    <!--end category -->



    <!--start cards -->

    <div class="all">
        <div class="head">
            <h3>More About AraTech Courses</h2>
                <p>We know the best things for You. Top picks for You.</p>
        </div>
        <div class="all-cards" id="course-list">
            @foreach ($courses as $course)      
                @if (($course->id)%2==0)
                <div class="cards" data-aos="fade-right"  
                data-aos-easing="ease-in-sine">
                    <a href="{{ route('courses.show', $course->id) }}">
                    <img  class="image" src="{{ Storage::url($course->image) }}" alt="Course Image">
                    </a>
                    <h3>{{ $course->title }}</h3>
                    <div class="link">
                        <img src="{{ asset('images/person.svg') }}" alt="" srcset="">
                        <a href="#">{{$course->instructer}}</a>
                    </div>
                    <p>{{ $course->description }}</p>
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
                        <p>${{$course->new_price}}USD</p>
                        <del>${{$course->old_price}}USD</del>
                    </div>
                </div>
                    
                @else
                <div class="cards" data-aos="fade-left"  
                data-aos-easing="ease-in-sine">
                    <a href="{{ route('courses.show', $course->id) }}">
                    <img  class="image" src="{{ Storage::url($course->image) }}" alt="Course Image">
                    </a>
                    <h3>{{ $course->title }}</h3>
                    <div class="link">
                        <img src="{{ asset('images/person.svg') }}" alt="" srcset="">
                        <a href="#">{{$course->instructer}}</a>
                    </div>
                    <p>{{ $course->description }}</p>
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
                        <p>${{$course->new_price}}USD</p>
                        <del>${{$course->old_price}}USD</del>
                    </div>
                </div>
                    
                @endif
                
                
            @endforeach
        </div>
    </div>

    <!--end cards -->

    <!--start pupular-->
    <div class="all-popular">
        <div class="pop-head">
            <h3>Popular Instructor</h2>
                <p>We know the best things for You. Top picks for You.</p>

        </div>
        <div class="all-cards">
            <div class="cards">
                <img src="{{ asset('images/inst.jpg') }}" alt="" srcset="" width="100%" height="400">
                <div class="desc">
                    <h3>Bashat katrib</h3>
                    <p>Marketing</p>
                </div>
            </div>
            <div class="cards">
                <img src="{{ asset('images/inst.jpg') }}" alt="" srcset="" width="100%" height="400">
                <div class="desc">
                    <h3>Bashat katrib</h3>
                    <p>Marketing</p>
                </div>
            </div>
            <div class="cards">
                <img src="{{ asset('images/inst.jpg') }}" alt="" srcset="" width="100%" height="400">
                <div class="desc">
                    <h3>Bashat katrib</h3>
                    <p>Marketing</p>
                </div>
            </div>
            <div class="cards">
                <img src="{{ asset('images/inst.jpg') }}" alt="" srcset="" width="100%" height="400">
                <div class="desc">
                    <h3>Bashat katrib</h3>
                    <p>Marketing</p>
                </div>
            </div>
        </div>
    </div>




    <!--end pupular-->
@endsection
