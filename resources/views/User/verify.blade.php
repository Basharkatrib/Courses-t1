@extends('User.master.layout')



@section('content')
<div class="container">
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            A new verification link has been sent to your email address.
        </div>
    @endif

    @if (auth()->user() && !auth()->user()->hasVerifiedEmail())
        <div class="alert alert-warning">
            <strong>Warning!</strong> Please verify your email address.
        </div>
    @endif
</div>


    <!--end pupular-->
@endsection
