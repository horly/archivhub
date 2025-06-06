@extends('base')
@section('title', $site ? __('dashboard.update_site') : __('dashboard.add_site'))
@section('content')

@include('global.loader')

<div class="page-wrapper compact-wrapper" id="pageWrapper">
    @include('main.header')

    <div class="container">

        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <h2>{{ $site ? __('dashboard.update_site') : __('dashboard.add_site') }}</h2>
                            {{-- <p class="mb-0 text-title-gray">Welcome back! Let’s start from where you left.</p> --}}
                        </div>
                        <div class="col-sm-6 col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app_site') }}"><i class="iconly-Home icli svg-color"></i></a></li>
                                <li class="breadcrumb-item">Sites</li>
                                <li class="breadcrumb-item active">{{ $site ? __('dashboard.update_site') : __('dashboard.add_site') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border">
            <div class="card-body">
                <form class="theme-form row g-3" action="{{ route('app_save_site') }}" method="POST">
                    @csrf

                    <input type="hidden" name="request-type" value="{{ $site ? "edit" : "add" }}">
                    <input type="hidden" name="id" value="{{ $site ? $site->id : "0" }}">

                    <div class="col-sm-3">
                        <label for="site-name" class="form-label">{{ __('dashboard.name') }} </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('site-name') is-invalid @enderror" name="site-name" id="site-name" placeholder="{{ __('dashboard.enter_the_site_name') }}" value="{{ $site ? $site->name : old('site-name') }}">
                        <small class="text-danger">@error('site-name') {{ $message }} @enderror</small>
                    </div>

                    <div class="col-sm-3">
                        <label for="site-address" class="form-label">{{ __('dashboard.address') }} </label>
                    </div>
                    <div class="col-sm-9">
                        <textarea class="form-control @error('site-address') is-invalid @enderror" id="site-address" name="site-address" rows="5" cols="5" placeholder="{{ __('dashboard.enter_the_site_address') }}">{{ $site ? $site->address : old('site-address') }}</textarea>
                        <small class="text-danger">@error('site-address') {{ $message }} @enderror</small>
                    </div>

                    <div class="text-end">
                        @include('buttons.save-button')

                        @if ($site)
                            <button class="btn btn-danger btn-air-light" type="button" onclick="deleteElement('{{ $site->id }}', '{{ route('app_delete_site') }}', '{{ csrf_token() }}')">
                                <i class="fa-solid fa-trash-can"></i>
                                {{ __('dashboard.delete') }}
                            </button>
                        @endif
                    </div>


                </form>
            </div>
        </div>

    </div>

</div>

@include('global.scipt')

<!-- Sweetalert js-->
<script src="{{ asset('assets/lib/sweet-alert/sweetalert.min.js') }}"></script>

@endsection
