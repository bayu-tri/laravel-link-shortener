@extends('layouts.main')

@section('title', 'Create Link')

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

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Create New Link</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="{{ route('links.store') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Link Name</label>
                                            <input type="text"
                                                class="form-control @error('name')
                                  is-invalid
                            @enderror"
                                                id="name" name="name" value="{{ old('name') }}">
                                        </div>
                                        @error('name')
                                            <p class="text-danger text-small" style="margin-top: -10px">{{ $message }}</p>
                                        @enderror

                                        <div class="form-group">
                                            <label for="url">Link URL</label>
                                            <input type="text"
                                                class="form-control @error('url')
                                    is-invalid
                                @enderror"
                                                id="url" name="url" value="{{ old('url') }}">
                                        </div>
                                        @error('url')
                                            <p class="text-danger text-small" style="margin-top: -10px">{{ $message }}</p>
                                        @enderror

                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input type="text"
                                                class="form-control @error('slug')
                                    is-invalid
                                @enderror"
                                                id="slug" name="slug" value="{{ old('slug') }}">
                                        </div>
                                        @error('slug')
                                            <p class="text-danger text-small" style="margin-top: -10px">{{ $message }}</p>
                                        @enderror
                                        <p class="text-secondary text-small" style="margin-top: -10px">* Leave blank for
                                            auto generate slug.</p>

                                        <button type="submit" class="btn btn-primary mt-4">Shorten</button>
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
