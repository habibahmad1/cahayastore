@extends('layouts.main')

@section('container')
    <div class="container text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <img src="{{ asset('img/404/404.png') }}" alt="404 Page Not Found" class="img-fluid mb-4">
                <h1 class="display-4">Page Not Found</h1>
                <p class="lead">Sorry, the page you are looking for doesn't exist.</p>
                <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    </div>
@endsection
