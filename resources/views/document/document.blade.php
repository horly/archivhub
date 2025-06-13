@extends('base')
@section('title', 'Documents')
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
                            <h2>Documents </h2>
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
                                <li class="breadcrumb-item active">Documents </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @include('message.flash-message')

            <div class="card border">
                <div class="card-body">
                    @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                        <a class="btn btn-primary mb-4" role="button" href="{{ route('app_add_document', ['id_site' => $site->id, 'id_room' => $room->id, 'id_document' => 0]) }}">
                            <i class="fa-solid fa-circle-plus"></i>
                            {{ __('auth.add') }}
                        </a>
                    @endif

                    <form action="{{ url()->current() }}" method="GET">
                        @method('get')

                        <div class="row input-group-wrapper">
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control search-box" id="searchInput" name="search-document" placeholder="{{ __('dashboard.search_for_a_document') }}" value="{{ request()->get('search-document') }}">
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

                    @if ($documents->isEmpty())
                        <div class="alert alert-light-dark light alert-dismissible fade show text-dark border-left-wrapper mb-0" role="alert"><i class="fa-solid fa-circle-info"> </i>
                            <p class="mb-0">{{ __('dashboard.no_data_available') }}   </p>
                            {{-- <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                        </div>
                    @else
                        <div class="file-content">
                            <div class="file-manager row">
                                @foreach ($documents as $document)
                                    <div class="folder col-md-2 mb-3">
                                        <a href="{{ route('app_add_document', ['id_site' => $site->id, 'id_room' => $room->id, 'id_document' => $document->id]) }}" class="folder-box folder-box-document">
                                            <div class="d-block"><i class="fa-solid fa-file-lines text-primary fs-1"></i>
                                                <div class="mt-3">
                                                    <h6 class="mb-2 text-muted">{{ str($document->titre)->limit(25) }} </h6>
                                                    <h6 class="mb-2 text-muted">{{ str($document->reference)->limit(25) }} </h6>
                                                    @php
                                                        $isDraft = $document->lien_numerisation ? "false" : "true";
                                                    @endphp
                                                    <p>
                                                        <span class="fw-bold {{ $isDraft === 'false' ? 'text-success' : 'text-warning' }}">{{ $isDraft === 'false' ? __('dashboard.archived') : __('dashboard.draft') }} </span>
                                                        <span class="pull-right"> <i class="fa-solid fa-clock"></i> {{ Carbon\Carbon::parse($document->updated_at)->ago() }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="mt-3">
                        {{ $documents->onEachSide(1)->links() }}
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
    window.jsonData = {!! $documentsJson !!};
</script>

<script src="{{ asset('assets/js/custom/document.js') }}"></script>

@endsection
