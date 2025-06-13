@extends('base')
@section('title', __('dashboard.folders'))
@section('content')

@include('global.loader')

<div class="page-wrapper compact-wrapper" id="pageWrapper">

    @include('main.header')

    <div class="page-body-wrapper">

        @include('menu.navigation-menu')

        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <h2>{{ __('dashboard.folders') }} </h2>
                            <p class="mb-0 text-primary">
                                <i class="fa-solid fa-city"></i>&ensp;
                                {{ $site->name }} -
                                <i class="fa-solid fa-door-open"></i>&ensp;
                                {{ $room->name }}
                            </p>
                        </div>
                        <div class="col-sm-6 col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app_dashboard', ['id_site' => $site->id, 'id_room' => $room->id]) }}"><i class="iconly-Home icli svg-color"></i></a></li>
                                <li class="breadcrumb-item">{{ __('dashboard.dashboard') }}</li>
                                <li class="breadcrumb-item active">{{ __('dashboard.folders') }} </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @include('message.flash-message')

            <div class="card border">
                <div class="card-body">
                    @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                        <a class="btn btn-primary mb-4" role="button" href="{{ route('app_add_chemise', ['id_site' => $site->id, 'id_room' => $room->id, 'id_chemise' => 0]) }}">
                            <i class="fa-solid fa-circle-plus"></i>
                            {{ __('auth.add') }}
                        </a>
                    @endif

                    <form action="{{ url()->current() }}" method="GET">
                        @method('get')

                        <div class="row input-group-wrapper">
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control search-box" id="searchInput" name="search-chemise" placeholder="{{ __('dashboard.search_for_a_folder') }}" value="{{ request()->get('search-chemise') }}">
                                    <a class="btn btn-outline-secondary" href="{{ url()->current() }}">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </a>
                                    {{--
                                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                    --}}
                                </div>
                                <div id="suggestions" class="suggestions-container"></div>
                            </div>
                        </div>
                    </form>

                    @if ($chemises->isEmpty())
                        <div class="alert alert-light-dark light alert-dismissible fade show text-dark border-left-wrapper mb-0" role="alert"><i class="fa-solid fa-circle-info"> </i>
                            <p class="mb-0">{{ __('dashboard.no_data_available') }}   </p>
                            {{-- <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                        </div>
                    @else
                        <div class="row">
                            @foreach ($chemises as $chemise)
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="city-card border">
                                        <div class="city-name">
                                            <div class="city-icon">
                                                <i class="fa-solid fa-folder"></i>
                                            </div>
                                            {{ __('dashboard.folder') }} {{ $chemise->numero }}
                                        </div>
                                        <div class="city-address">{{ str($chemise->description)->limit(32) }} </div>
                                        <div class="mb-3">
                                            <div>
                                                <i class="fa-solid fa-file-lines stat-icon" style="width: 25px"></i>
                                                <span>{{ number_format($chemise->documents->count(), 0, '', ' ') }} Documents</span>
                                            </div>
                                        </div>
                                        <div class="action-buttons">
                                            <a href="{{ route('app_add_chemise', ['id_site' => $site->id, 'id_room' => $room->id, 'id_chemise' => $chemise->id]) }}" role="button" class="btn btn-primary text-white view-link fw-bold">
                                                <i class="iconly-Show icli"></i>
                                                {{ __('dashboard.see_documents') }}
                                            </a>
                                            @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                                <div>
                                                    <a href="{{ route('app_add_chemise', ['id_site' => $site->id, 'id_room' => $room->id, 'id_chemise' => $chemise->id]) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="delete-btn text-danger" onclick="deleteElement('{{ $chemise->id }}', '{{ route('app_delete_chemise') }}', '{{ csrf_token() }}')" title="{{ __('dashboard.delete') }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="mt-3">
                        {{ $chemises->onEachSide(1)->links() }}
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>

@include('global.no_result')


@include('global.scipt')

<!-- sidebar -->
<script src="{{ asset('assets/js/sidebar.js') }}"></script>
<!-- scrollbar-->
<script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>

<!-- Sweetalert js-->
<script src="{{ asset('assets/lib/sweet-alert/sweetalert.min.js') }}"></script>

<script>
    window.jsonData = {!! $chemisesJson !!};
</script>

<script src="{{ asset('assets/js/custom/chemise.js') }}"></script>

@endsection
