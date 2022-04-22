@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Employee') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{-- <div class="row">

        <!-- Users -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('Users') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['users'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">{{ __('Add Employe') }}</h1>
                                        </div>

                                        @if ($errors->any())
                                            <div class="alert alert-danger border-left-danger" role="alert">
                                                <ul class="pl-4 my-2">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('employe.store') }}" class="user"
                                            enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" name="full_name"
                                                    placeholder="{{ __('Fullname') }}" value="{{ old('full_name') }}"
                                                    required autofocus>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                    name="job_position" placeholder="{{ __('Job Position') }}"
                                                    value="{{ old('job_position') }}" required autofocus>
                                            </div>

                                            <div class="form-group">
                                                <input type="file" class="form-control" name="profile_picture"
                                                    placeholder="{{ __('Profile_picute') }}"
                                                    value="{{ old('profile_picture') }}" required autofocus>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    {{ __('Submit') }}
                                                </button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection