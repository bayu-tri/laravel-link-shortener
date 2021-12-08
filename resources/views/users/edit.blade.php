@extends('layouts.main')

@section('title', 'Edit User')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.partials.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.partials.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Account Settings</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="{{ route('user.update', $userInfo->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text"
                                                class="form-control @error('name')
                                                is-invalid
                                            @enderror"
                                                id="name" name="name" value="{{ $userInfo->name }}">
                                        </div>
                                        @error('name')
                                            <p class="text-danger text-small" style="margin-top: -10px">{{ $message }}</p>
                                        @enderror

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email"
                                                class="form-control @error('email')
                                                is-invalid
                                            @enderror"
                                                id="email" name="email" value="{{ $userInfo->email }}">
                                        </div>
                                        @error('email')
                                            <p class="text-danger text-small" style="margin-top: -10px">{{ $message }}</p>
                                        @enderror

                                        <div class="form-group">
                                            <label for="picture">Profile Picture</label>
                                            <input type="file"
                                                class="form-control @error('picture')
                                                is-invalid
                                            @enderror"
                                                id="picture" name="picture" value="{{ old('thumbnail') }}">
                                        </div>
                                        @error('picture')
                                            <p class="text-danger text-small" style="margin-top: -10px">{{ $message }}</p>
                                        @enderror
                                        
                                        <button type="submit" class="btn btn-primary mt-4">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.partials.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    @include('layouts.partials.scroll_top')
    @include('layouts.partials.logout_modal')
@endsection
