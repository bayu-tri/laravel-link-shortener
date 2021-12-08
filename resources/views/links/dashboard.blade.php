@extends('layouts.main')

@section('title', 'Dashboard')

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

                        <!-- Total Link Information -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Link</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLinks }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Active Link Information -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Active Link</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalActive }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Inactive Link Information -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total Inactive Link
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalInactive }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-ban fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Click Information -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Click</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalClick }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calculator fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!-- Most Clicked Link -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Your Link</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body table-responsive">
                                    <table class="table table-striped table-bordered " cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Short Link</th>
                                                <th>Status</th>
                                                <th>Total Click</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($userLinks) == 0)
                                                <tr>
                                                    <td colspan="5" class="text-center pt-4">
                                                        <p>There is no Links here.</p>
                                                    </td>
                                                </tr>
                                            @endif
                                            @foreach ($userLinks as $link)
                                                <tr>
                                                    <td>{{ $link->name }}</td>
                                                    <td><a href="{{ $link->slug }}">{{ url('/')."/".$link->slug }}</a></td>
                                                    <td>
                                                        @if ($link->status == 1)
                                                            <span class="badge badge-pill badge-success">Active</span>
                                                        @endif
                                                        @if ($link->status == 0)
                                                            <span class="badge badge-pill badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $link->counter }}</td>
                                                    <td class="d-flex justify-content-center">
                                                        <a class="btn btn-primary mr-3" href="{{ route('links.edit', $link->id) }}">
                                                            <i class="fas fa-pencil-alt mr-2"></i> Update</a>
                                                        <form method="POST" action="{{ route('links.destroy', $link->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash mr-2"></i>Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
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

