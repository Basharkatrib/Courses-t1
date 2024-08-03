<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('usercss/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('usercss/home.css') }}">
    <link rel="stylesheet" href="{{ asset('usercss/showvideo.css') }}">
    <link rel="stylesheet" href="{{ asset('usercss/myprofile.css') }}">
    <link rel="stylesheet" href="{{ asset('usercss/login.css') }}">
    <link rel="stylesheet" href="{{ asset('usercss/sign_up.css') }}">
    <link rel="stylesheet" href="{{ asset('usercss/all_videos.css') }}">
    <link rel="stylesheet" href="{{ asset('usercss/payment.css') }}">



    <title>Courses</title>
</head>

<body>
    <!--start nav-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a href="/" style="text-decoration: none">
                <div class="nav-left">
                    <img src="{{ asset('images/image 8.svg') }}" alt="" srcset="">
                    <div class="nav-desc">AraTech Course</div>
                </div>
                </a>
                <div class="nav-center">
                    <form action="#" method="GET" onsubmit="return false;">
                        <div class="search-container">
                            <input type="search" name="query" id="search" placeholder="search for course">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="login-modal" id="loginModal">
                    <div class="modal-content">
                        <div class="login-img">
                            <img src="{{ asset('images/login.png') }}" alt="">
                        </div>
                        <div class="modal-right">
                            <div class="modal-header">
                                <h2>AraTech Courses</h2>
                                <span class="close-button" id="closeButton">&times;</span>
                            </div>
                            <div class="modal-body">
                                <p>Join us and get more benefits. We promise to keep your data safely.</p>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <input type="email" name="email" placeholder="Email Address" required>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <button type="submit">Login</button>
                                </form>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <button class="btn social-login facebook"> <img src="{{asset('images/Facebook.png')}}" alt="" srcset="">   Continue with Facebook</button>
                                <button class="btn social-login apple"><img src="{{asset('images/Apple.png')}}" alt="" srcset="">   Continue with Apple</button>
                                <p class="container"><img src="{{asset('images/Google.png')}}" alt=""> <a href="{{ url('auth/google') }}" class="btn social-login google">Continue with
                                        Google</a> </p>
                                    
                                <p class="text-center my-2">Need an Account? <a href="{{ route('register') }}">Sign
                                        Up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--sign up-->
                <div class="login-modal" id="loginModal2">
                    <div class="modal-content">
                        <div class="login-img">
                            <img src="{{ asset('images/login.png') }}" alt="" srcset="">
                        </div>
                        <div class="modal-right2">
                            <div class="modal-header">
                                <img src="{{ asset('images/image 8.svg') }}" alt="" srcset=""
                                    height="40">
                                <h2>AraTech Courses</h2>
                                <span class="close-button" id="closeButton2">&times;</span>
                            </div>
                            <div class="modal-body2">
                                <p>Join us and get more benefits. We promise to keep your data safely.</p>
                                <p class="text-center">or you can</p>
                                <button class="btn social-login facebook"> <img src="{{asset('images/Facebook.png')}}" alt="" srcset="">   Continue with Facebook</button>
                                <button class="btn social-login apple"><img src="{{asset('images/Apple.png')}}" alt="" srcset="">   Continue with Apple</button>
                                <p class="container"><img src="{{asset('images/Google.png')}}" alt=""> <a href="{{ url('auth/google') }}" class="btn social-login google">Continue with
                                        Google</a> </p>
                                    


                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <input type="text" name="name" placeholder="Name" required>
                                    <input type="email" name="email" placeholder="Email Address" required>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <input type="password" name="password_confirmation"
                                        placeholder="Confirm Password" required>
                                    <button type="submit">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nav-right">
                    <a href="#">Become instructor</a>
                    <a href="/payment">
                    <img src="{{ asset('images/shop-cart.svg') }}" alt="" srcset="">
                    </a>

                    @auth


                        <div class="profile-container">
                            <div class="main-image">
                                <img src="{{ Auth::user()->profile_image ? asset('images/' . Auth::user()->profile_image) : asset('images/square.png') }}"
                                    alt="Profile Image" onclick="toggleDropdown()">
                            </div>
                            <div id="myDropdown" class="dropdown-content">
                                <a style="margin-left: 0;padding-left:10px" href="{{ route('profile.show') }}">View Profile</a>
                                @if (Auth::user()->role == 'admin')
                                    <a style="margin-left: 0;padding-left:10px" href="{{ url('/nova') }}">Dashboard</a>
                                @endif

                                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" style="background:none;border:none;padding:12px 16px 12px 0px;text-align:left;width:100%;">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <button class="login" id="openModalButton">Login</button>
                        <button class="signup" id="openModalButton2">SignUp</button>
                    @endauth
                </div>

            </div>
        </div>
    </nav>
    <!--end nav-->
    <!--start content-->
    <div class="content-all">
        @yield('content')
    </div>
    <!--end content-->
    <!--start join-->

    <div class="containe">
        <div class="all-join">
            <div class="join-left">
                <h3>Join and get amazing discount</h3>
                <p>With our responsive themes and mobile and desktop apps</p>

            </div>
            <div class="join-right">
                <form action="#">
                    <div class="search-container">
                        <input type="text" placeholder="Search...">
                        <button type="submit"><i class="fas fa-search"></i></button>


                    </div>
                    <div class="sub"><button type="submit">Subscribe</button></div>
                </form>
            </div>
        </div>
    </div>
    <!--end join-->
    <!--start footer-->
    <footer>
        <div class="contain">
            <div class="footer-1">
                <img src="{{ asset('images/image 8.svg') }}" alt="" srcset="">
                <div class="footer-desc">AraTech Course</div>
            </div>
            <div class="footer-2">
                <ul>
                    <li><a href="#">Web Programming</a></li>
                    <li><a href="#">Mobile Programming</a></li>
                    <li><a href="#">Java Beginner</a></li>
                    <li><a href="#">PHP Beginner</a></li>
                </ul>
            </div>
            <div class="footer-3">
                <ul>
                    <li><a href="#">Adobe Illustrator</a></li>
                    <li><a href="#">Adobe Photoshop</a></li>
                    <li><a href="#">Design Logo</a></li>
                </ul>
            </div>
            <div class="footer-4">
                <ul>
                    <li><a href="#">Writing Course</a></li>
                    <li><a href="#">Photography</a></li>
                    <li><a href="#">Video Making</a></li>
                </ul>
            </div>
        </div>
        <div class="hr">
            <hr>
        </div>
        <div class="under-hr">
            <div class="left"><a href="">Copyright © AraTech Courses.com 2024. All Rights Reserved</a></div>
            <div class="footer-icon">
                <a href="#"><img src="{{ asset('images/Facebook.svg') }}" alt="" srcset=""></a>
                <a href="#"><img src="{{ asset('images/instagram.svg') }}" alt="" srcset=""></a>
                <a href="#"><img src="{{ asset('images/Twitter.svg') }}" alt="" srcset=""></a>
            </div>
        </div>
    </footer>
    <!--end footer-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('userjs/script.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            let query = $(this).val();
            $.ajax({
                url: "{{ route('search') }}",
                type: "GET",
                data: {'query': query},
                success: function(data) {
                    $('#course-list').empty(); // تفريغ القائمة الحالية
                    $.each(data, function(key, course) {
                        let card = `
                            <div class="cards" data-aos="${(course.id % 2 == 0) ? 'fade-right' : 'fade-left'}" data-aos-easing="ease-in-sine">
                                <a href="/courses/${course.id}">
                                    <img class="image" src="/storage/${course.image}" alt="Course Image">
                                </a>
                                <h3>${course.title}</h3>
                                <div class="link">
                                    <img src="{{ asset('images/person.svg') }}" alt="" srcset="">
                                    <a href="#">${course.instructer}</a>
                                </div>
                                <p>${course.description}</p>
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
                                    <p>$${course.new_price} USD</p>
                                    <del>$${course.old_price} USD</del>
                                </div>
                            </div>
                        `;
                        $('#course-list').append(card);
                    });
                }
            });
        });
    });
</script>



</body>

</html>
