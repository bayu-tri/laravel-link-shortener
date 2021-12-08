@extends('layouts.main')

@section('title', 'Edit Link')

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
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <h6><i class="fa fa-info-circle"></i> Name</h6>
                                    <p class="font-weight-bold btn btn-dark disabled">{{ $links->name }}</p>
                                    <h6><i class="fa fa-globe-americas"></i> Link URL</h6>
                                    <p class="font-weight-bold btn btn-dark disabled">{{ $links->link }}</p>
                                    <h6><i class="fa fa-cut"></i> Slug</h6>
                                    <p class="font-weight-bold btn btn-dark disabled">{{ "/".$links->slug }}</p>
                                    <h6><i class="fa fa-power-off"></i> Status</h6>
                                    @if ($links->status == 1)
                                        <p class="font-weight-bold btn btn-success disabled">Active</p>
                                    @endif
                                    @if ($links->status == 0)
                                        <p class="font-weight-bold btn btn-danger disabled">Inactive</p>
                                    @endif
                                    
                                    <h6><i class="fa fa-bars"></i> Click</h6>
                                    <p class="font-weight-bold btn btn-dark disabled">{{ $links->counter }} Times Clicked</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Link</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="{{ route('links.update', $links->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name">Link Name</label>
                                            <input type="text"
                                                class="form-control @error('name')
                                                is-invalid
                                            @enderror"
                                                id="name" name="name" value="{{ $links->name }}">
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
                                                id="url" name="url" value="{{ $links->link }}">
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
                                                id="slug" name="slug" value="{{ $links->slug }}">
                                        </div>
                                        @error('slug')
                                            <p class="text-danger text-small" style="margin-top: -10px">{{ $message }}</p>
                                        @enderror
                                        <p class="text-secondary text-small" style="margin-top: -10px">* Leave blank for
                                            auto generate slug.</p>
                                        
                                        <div class="d-flex flex-row">
                                            <div class="form-check mr-3">
                                                <input class="form-check-input" type="radio" name="status" id="activeRadio" @if ($links->status == 1)
                                                    checked
                                                @endif name="status" value="active">
                                                <label class="form-check-label" for="activeRadio">
                                                  Active
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="inactiveRadio" @if ($links->status == 0)
                                                    checked
                                                @endif name="status" value="inactive">
                                                <label class="form-check-label" for="inactiveRadio">
                                                  Inactive
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" name="resetClick" id="resetTotalClick">
                                            <label class="form-check-label" for="resetTotalClick">
                                              Reset Total Click
                                            </label>
                                          </div>
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
