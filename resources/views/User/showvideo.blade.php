@extends('User.master.layout')

@section('content')
    <!--start-first-section-->
    <div class="first-section">
        <iframe id="video-frame" width="250" height="315" src="{{ $video->url }}" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen ></iframe>
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
                <ol id="video-list">
                    @foreach ($video->course->videos as $videoo)
                        <li>
                            <a href="{{ route('videos.show', $videoo->id) }}" data-video-url="{{ $videoo->url }}" data-video-id="{{ $videoo->id }}">
                                <div class="left">
                                    <svg width="27" height="19" viewBox="0 0 27 19" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: none">
                                        <rect y="0.26123" width="27" height="18" rx="2" fill="#1181A1"/>
                                        <path d="M8.37109 11.2339V12.2612H4.68359V6.62451H5.86328V11.2339H8.37109ZM10.6211 12.2612H9.44141V6.62451H10.6211V12.2612ZM14.918 12.2612H13.4922L11.5859 6.62451H12.918L14.1992 10.9331H14.2695L15.5273 6.62451H16.7969L14.918 12.2612ZM21.4961 11.2534V12.2612H17.7617V6.62451H21.4961V7.63232H18.9414V8.94873H21.3516V9.88232H18.9414V11.2534H21.4961Z" fill="white"/>
                                        </svg>
                                    <img src="{{ asset('images/play-icon.svg') }}" alt="">
                                    <p id="video-title-{{ $videoo->id }}">- {{ $videoo->title }}</p>
                                </div>
                            </a>
                            <hr>
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
                        @foreach ($video->comments as $comment)
                        <button class="accordion">  <div class="message" data-aos="fade-right"  
                            data-aos-easing="ease-in-sine">
                                <img src="{{ $comment->user->profile_image ? asset('images/' . $comment->user->profile_image) : asset('images/square.png') }}"
                                    alt="Profile Image" onclick="toggleDropdown()" width="50" height="50">

                                <div class="desc">
                                    <h5>{{ $comment->user->name }}</h5>
                                    <p class="comment-content">{{ $comment->content }}</p>
                                    <div class="date">
                                        <p>{{ $comment->created_at->format('H:i') }}</p>
                                        <p>{{ $comment->created_at->format('y/m/d') }}</p>
                                    </div>

                                  
                                </div>
                            </div></button>
                        <div class="panel">
                           <!-- Edit and Delete buttons -->
                           @if (auth()->user() && auth()->user()->id == $comment->user_id)
                           <div class="actions">
                               <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                   style="display:inline;">
                                   @csrf
                                   @method('DELETE')
                                   <button class="delete" type="submit"
                                       onclick="return confirm('Are you sure?')">Delete</button>
                                   
                               </form>

                           </div>
                           

                           <!-- Edit form (hidden by default) -->
                       
                       @endif
                        </div>
                          
                        @endforeach
                    </div>

                    <form action="{{ route('comments.store', $video) }}" method="POST">
                        @csrf
                        <div class="search-container">
                            <input type="text" name="content" placeholder="Add your comment ..." required>
                            <button type="submit">
                                <img src="{{ asset('images/send.svg') }}" alt="">
                            </button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
        <div class="right2">
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var videoLinks = document.querySelectorAll('#video-list a');
            var currentVideoId = '{{ $video->id }}';
    
            // وظيفة لتحديث الألوان وإظهار/إخفاء العناصر
            function updateVideoTitles(newVideoId) {
                var currentTitleElement = document.getElementById('video-title-' + currentVideoId);
                if (currentTitleElement) {
                    currentTitleElement.style.color = ''; // إعادة تعيين اللون للفيديو السابق
                    // إظهار عنصر img وإخفاء عنصر svg
                    var currentImgElement = currentTitleElement.closest('a').querySelector('img');
                    var currentSvgElement = currentTitleElement.closest('a').querySelector('svg');
                    currentImgElement.style.display = 'block';
                    currentSvgElement.style.display = 'none';
                }
    
                var newTitleElement = document.getElementById('video-title-' + newVideoId);
                if (newTitleElement) {
                    newTitleElement.style.color = 'blue'; // تغيير اللون للفيديو الحالي
                    // إخفاء عنصر img وإظهار عنصر svg
                    var newImgElement = newTitleElement.closest('a').querySelector('img');
                    var newSvgElement = newTitleElement.closest('a').querySelector('svg');
                    newImgElement.style.display = 'none';
                    newSvgElement.style.display = 'block';
                }
                currentVideoId = newVideoId; // تحديث الفيديو الحالي
            }
    
            // ضبط اللون للفيديو الحالي عند التحميل
            updateVideoTitles(currentVideoId);
    
            // إضافة حدث لكل رابط فيديو
            videoLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    event.preventDefault(); // منع التصفح الافتراضي
                    var newVideoId = this.getAttribute('data-video-id');
                    var newUrl = this.getAttribute('href');
    
                    // تحديث الألوان وإظهار/إخفاء العناصر
                    updateVideoTitles(newVideoId);
    
                    // تحديث الموقع لتحميل الفيديو الجديد
                    window.location.href = newUrl;
                });
            });
        });







        var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
    </script>
    
@endsection




