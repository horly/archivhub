@extends('base')
@section('title', $room ? __('dashboard.update_room') : __('dashboard.add_a_room'))
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
                            <h2>{{ $room ? __('dashboard.update_room') : __('dashboard.add_a_room') }}</h2>
                            {{-- <p class="mb-0 text-title-gray">Welcome back! Let’s start from where you left.</p> --}}
                        </div>
                        <div class="col-sm-6 col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app_room', ['id_site' => $site->id]) }}"><i class="fa-solid fa-door-open text-primary"></i></a></li>
                                <li class="breadcrumb-item">{{ __('dashboard.rooms') }} </li>
                                <li class="breadcrumb-item active">{{ $room ? __('dashboard.update_room') : __('dashboard.add_a_room') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border">
            <div class="card-body">
                <form class="theme-form row g-3" action="{{ route('app_save_room') }}" method="POST">
                    @csrf

                    <input type="hidden" name="request-type" value="{{ $room ? "edit" : "add" }}">
                    <input type="hidden" name="id" value="{{ $room ? $room->id : "0" }}">
                    <input type="hidden" name="id_site" value="{{ $site->id }}">

                    <div class="col-sm-3">
                        <label for="room-name" class="form-label">{{ __('dashboard.name') }} </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('room-name') is-invalid @enderror" name="room-name" id="room-name" placeholder="{{ __('dashboard.enter_the_room_name') }}" value="{{ $room ? $room->name : old('room-name') }}">
                        <small class="text-danger">@error('room-name') {{ $message }} @enderror</small>
                    </div>

                    <div class="col-sm-3">
                        <label for="room-description" class="form-label">Description </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('room-description') is-invalid @enderror" name="room-description" id="room-description" placeholder="{{ __('dashboard.enter_the_room_description') }}" value="{{ $room ? $room->description : old('room-description') }}">
                        <small class="text-danger">@error('room-description') {{ $message }} @enderror</small>
                    </div>

                    <div class="text-end">
                        @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                            @include('buttons.save-button')

                            @if ($room)
                                <button class="btn btn-danger btn-air-light" type="button" onclick="deleteElement('{{ $room->id }}', '{{ route('app_delete_room') }}', '{{ csrf_token() }}')">
                                    <i class="fa-solid fa-trash-can"></i>
                                    {{ __('dashboard.delete') }}
                                </button>
                            @endif
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
