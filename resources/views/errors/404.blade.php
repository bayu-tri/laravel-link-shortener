@extends('layouts.main')

@section('title', 'Not Found')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- 404 Error Text -->
        <div class="text-center" style="margin-top: 200px">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
            <a href="{{ route('dashboard') }}">&larr; Back to Main Page</a>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection