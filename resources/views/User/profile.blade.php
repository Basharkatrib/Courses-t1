@extends('User.master.layout')

@section('content')

<div class="pro-all">
    <div class="head">
        <h3>My Account</h3>
    </div>

    <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
          My Options
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><a class="dropdown-item" href="#">Personalisation</a></li>
          <li><a class="dropdown-item" href="#">Account</a></li>
          <li><a class="dropdown-item" href="#">Payment Methods</a></li>
          <li><a class="dropdown-item" href="#">Notifications</a></li>
          <li><a class="dropdown-item" href="#">Privacy</a></li>
        </ul>
      </div>
                  
    <div class="pro-section">
        <ul>
            <li class="link"><a href="#">Profile</a></li>
            <li class="link"><a href="#">Personalisation</a></li>
            <li class="link"><a href="#">Account</a></li>
            <li class="link"><a href="#">Payment Methods</a></li>
            <li class="link"><a href="#">Notifications</a></li>
            <li class="link"><a href="#">Privacy</a></li>
        </ul>
    </div>

    <div class="pro-img">
        <div class="main-image">
            <img src="{{ $user->profile_image ? asset('images/' . $user->profile_image) : asset('images/square.png') }}" alt="Profile Image" width="100" height="100">
        </div>
        <div class="camera-icon">
            <label for="profile_image" style="cursor: pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                    <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0"/>
                </svg>
            </label>
        </div>
    </div>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="{{ $user->email }}">
        <hr>
        <label for="profile_image">Profile Image</label>
        <input type="file" id="profile_image" name="profile_image" accept="image/*">
        <hr>
        <select name="language" id="language">
            <option value="Arabic" {{ $user->language == 'Arabic' ? 'selected' : '' }}>Arabic</option>
            <option value="English" {{ $user->language == 'English' ? 'selected' : '' }}>English</option>
            <option value="Germany" {{ $user->language == 'Germany' ? 'selected' : '' }}>Germany</option>
        </select>
        <button type="submit">Save</button>
    </form>
</div>

@endsection
