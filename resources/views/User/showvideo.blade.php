@extends('User.master.layout')

@section('content')
    <!--start-first-section-->
    <div class="first-section">
        <iframe width="250" height="315" src="{{ $video->url }}"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div class="right-section">
            <div class="right-head">
                <div class="left-head">
                    <h4>{{ $video->title }}</h4>
                    <p>{{ $video->created_at->format('l, d M Y . h:i A') }}</p>
                </div>
                <div class="right-link">
                    <a href="#">Follow</a>
                </div>
            </div>
            <div class="videos">
                <ol>
                    @foreach ($video->course->videos as $videoo)
                        <li>
                            <a href="{{ route('videos.show', $videoo->id)}}">
                                <div class="left">
                                    <img src="{{ asset('images/play-icon.svg') }}" alt="">
                                    <p>{{ $videoo->id }}- {{ $videoo->title }}</p>
                                </div>
                            </a>
                            <div class="right">
                                <p>{{ $videoo->created_at->format('d M Y') }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
    <!--end-first-section-->

    <!--start-second-section-->
    <div class="second-section">
        <div class="left">
            <div class="first">
                <h3>7. Painting Interaction</h3>
                <div class="first-right">
                    <img src="{{ asset('images/eye.svg') }}" alt="">
                    <p>2.3K</p>
                </div>
            </div>
            <div class="second">
                <div class="left">
                    <img src="{{ asset('images/image 7.svg') }}" alt="" width="50" height="50">
                    <div class="left-desc">
                        <h4>Marius Ciocirland</h4>
                        <p>Behance</p>
                    </div>
                </div>
                <div class="right">
                    <button type="submit">LIVE NOW</button>
                </div>
            </div>
            <div class="third">
                <div class="first">
                    <ul>
                        <li><a href="#" class="link">ABOUT</a></li>
                        <li><a href="#" class="link">Comments</a></li>
                    </ul>
                </div>
                <div class="second-chat-all">
                    <div class="comments">
                        @foreach($video->comments as $comment)
                            <div class="message">
                                <img src="{{ asset('images/' . $comment->user->profile_image) }}" alt="" width="50" height="50">
                                <div class="desc">
                                    <h5>{{ $comment->user->email }}</h5>
                                    <p>{{ $comment->content }}</p>
                                    <div class="date">
                                        <p>{{ $comment->created_at->format('H:i') }}</p>
                                        <p>{{ $comment->created_at->format('y/m/d') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <form action="{{ route('comments.store', $video) }}" method="POST">
                        @csrf
                        <div class="search-container">
                            <input type="text" name="content" placeholder="Add your comment ..." required >                            <button type="submit"><img src="{{ asset('images/send.svg') }}" alt=""></button>
                        </div>
                    </form>
                    
                    
                </div>
            </div>
        </div>
        <div class="right">
            <div class="image-container">
                <div class="left">
                    <h4>One Day Learn a Photo.</h4>
                    <p>Sarah Molek</p>
                    <button type="submit"><a href="#">Get it Now</a></button>
                </div>
                <div class="right">
                    <img src="{{ asset('images/Overlay.png') }}" alt="" width="300" height="300">
                </div>
            </div>
        </div>
    </div>
    <!--end-second-section-->
@endsection
