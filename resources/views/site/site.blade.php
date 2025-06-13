@extends('base')
@section('title', 'sites')
@section('content')

@include('global.loader')

<div class="page-wrapper compact-wrapper" id="pageWrapper">
    @include('main.header')

    <div class="container">

        <div class="page-body">
            <div class="container-fluid general-widget">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <h2>{{ __('dashboard.main_menu') }} </h2>
                            {{-- <p class="mb-0 text-title-gray">Welcome back! Let’s start from where you left.</p> --}}
                        </div>
                        <div class="col-sm-6 col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app_site') }}"><i class="iconly-Home icli svg-color"></i></a></li>
                                <li class="breadcrumb-item">{{ __('dashboard.main_menu') }}</li>
                                <li class="breadcrumb-item active">Sites</li>
                            </ol>
                        </div>
                    </div>
                </div>

                @include('message.flash-message')

                <div class="card border">
                    <div class="card-body">
                        <div class="container-fluid general-widget">
                            <div class="row">

                                <div class="col-sm-6 col-xl-3 box-col-6">
                                    <div class="card widget-1 border">
                                        <div class="card-body">
                                            <div class="widget-content">
                                                <div class="widget-round secondary">
                                                    <div class="bg-round">
                                                        <i class="fa-solid fa-city text-secondary"></i>
                                                    </div>
                                                </div>
                                            <div>
                                                <h4>{{ number_format($sitesCount, 0, '', ' ') }} </h4><span class="f-light">Sites </span>
                                            </div>
                                            </div>
                                            {{--<div class="font-success f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>{{ number_format($sitesThisMonth, 0, '', ' ') }} {{ __('dashboard.this_month') }}</span></div>--}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3 box-col-6">
                                    <div class="card widget-1 border">
                                        <div class="card-body">
                                            <div class="widget-content">
                                                <div class="widget-round primary">
                                                    <div class="bg-round">
                                                        <i class="fas fa-door-open text-primary"></i>
                                                    </div>
                                                </div>
                                            <div>
                                                <h4>{{ number_format($roomsCount, 0, '', ' ') }}</h4><span class="f-light">{{ __('dashboard.rooms') }} </span>
                                            </div>
                                            </div>
                                            {{--<div class="font-success f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>{{ number_format($roomsThisMonth, 0, '', ' ') }} {{ __('dashboard.this_month') }}</span></div>--}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3 box-col-6">
                                    <div class="card widget-1 border">
                                        <div class="card-body">
                                            <div class="widget-content">
                                                <div class="widget-round secondary">
                                                    <div class="bg-round">
                                                        <i class="fa-solid fa-box-archive text-secondary"></i>
                                                    </div>
                                                </div>
                                            <div>
                                                <h4>{{ number_format($boxesCount, 0, '', ' ') }}</h4><span class="f-light">{{ __('dashboard.boxes') }} </span>
                                            </div>
                                            </div>
                                            {{--<div class="font-success f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>{{ number_format($boxesThisMonth, 0, '', ' ') }} {{ __('dashboard.this_month') }}</span></div>--}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3 box-col-6">
                                    <div class="card widget-1 border">
                                        <div class="card-body">
                                            <div class="widget-content">
                                                <div class="widget-round success">
                                                    <div class="bg-round">
                                                        <i class="fa-solid fa-file-lines text-success"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4>{{ number_format($documentsCount, 0, '', ' ') }}</h4><span class="f-light">Documents </span>
                                                </div>
                                            </div>
                                            {{--<div class="font-success f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>{{ number_format($documentsThisMonth, 0, '', ' ') }} {{ __('dashboard.this_month') }}--}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border">
                            <div class="card-header h3 text-muted">{{ __('dashboard.archive_sites') }} </div>
                            <div class="card-body">

                                @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                    <a class="btn btn-primary mb-4" role="button" href="{{ route('app_add_site', ['id' => 0]) }}">
                                        <i class="fa-solid fa-circle-plus"></i>
                                        {{ __('auth.add') }}
                                    </a>
                                @endif

                                <form action="{{ url()->current() }}" method="GET">
                                    @method('get')

                                    <div class="row input-group-wrapper">
                                        <div class="col-md-3">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control search-box" id="searchInput" name="search-site" placeholder="{{ __('dashboard.search_for_a_site') }}" value="{{ request()->get('search-site') }}">
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

                                @if ($sites->isEmpty())
                                    <div class="alert alert-light-dark light alert-dismissible fade show text-dark border-left-wrapper mb-0" role="alert"><i class="fa-solid fa-circle-info"> </i>
                                        <p class="mb-0">{{ __('dashboard.no_data_available') }}   </p>
                                        {{-- <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                                    </div>
                                @else
                                    <div class="row">

                                        @foreach ($sites as $site)
                                            <div class="col-lg-4 col-md-6 mb-4">
                                                <div class="city-card border">
                                                    <div class="city-name">
                                                        <div class="city-icon">
                                                            <i class="fas fa-city"></i>
                                                        </div>
                                                        {{ $site->name }}
                                                    </div>
                                                    <div class="city-address">{{ str($site->address)->limit(32) }}</div>
                                                    <div class="mb-3">
                                                        <div>
                                                            <i class="fas fa-door-open stat-icon" style="width: 25px"></i>
                                                            <span>{{ number_format($site->rooms->count(), 0, '', ' ') }} {{ __('dashboard.rooms') }}</span>
                                                        </div>
                                                        @php
                                                            $documents = App\Models\Document::select('documents.*')
                                                                    ->join('chemises', 'chemises.id', '=', 'documents.chemise_id')
                                                                    ->join('classeurs', 'classeurs.id', '=', 'chemises.classeur_id')
                                                                    ->join('boites', 'boites.id', '=', 'classeurs.boite_id')
                                                                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                                                                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                                                                    ->join('rooms', 'rooms.id', '=', 'armoires.room_id')
                                                                    ->where('rooms.site_id', $site->id)
                                                                    ->count();
                                                        @endphp
                                                        <div>
                                                            <i class="fas fa-file-alt stat-icon" style="width: 25px"></i>
                                                            <span>{{ number_format($documents, 0, '', ' ') }} documents</span>
                                                        </div>
                                                    </div>
                                                    <div class="action-buttons">
                                                        <a href="{{ route('app_room', ['id_site' => $site->id]) }}" role="button" class="btn btn-primary text-white view-link fw-bold">
                                                            <i class="iconly-Show icli"></i>
                                                            {{ __('dashboard.view_rooms') }}
                                                        </a>
                                                        @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                                            <div>
                                                                <a href="{{ route('app_add_site', ['id' => $site->id]) }}" role="button" class="edit-btn text-primary" title="{{ __('dashboard.edit') }}">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <button class="delete-btn text-danger" onclick="deleteElement('{{ $site->id }}', '{{ route('app_delete_site') }}', '{{ csrf_token() }}')" title="{{ __('dashboard.delete') }}">
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
                                    {{ $sites->onEachSide(1)->links() }}
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="card border">
                                    <div class="card-header h3 text-muted" id="site-chart-title">{{ __('dashboard.documents_per_site') }} </div>
                                    <div class="card-body">
                                        <div class="bar-chart-widget">
                                            <div class="bottom-content card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div id="chart-widget4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card border">
                                    <div class="card-header h3 text-muted">{{ __('dashboard.recent_activities') }} </div>
                                    <div class="card-body">
                                        <div class="mb-3 text-end">
                                            <a href="{{ route('app_all_notification') }}" class="fw-bold"><span class="font-primary">{{ __('dashboard.view_all') }} </span></a>
                                        </div>
                                        @include('main.notification-list')
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@include('global.no_result')

@include('global.scipt')

<script>
    window.jsonData = {!! $sitesJson !!};
    window.jsonDataApex = {!! $sitesJsonApex !!};
</script>

<!-- datatable-->
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<!-- page_datatable-->
<script src="{{ asset('assets/js/js-datatables/datatables/datatable.custom.js') }}"></script>
<!-- page_datatable-->
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
<!-- theme_customizer-->

<!-- Sweetalert js-->
<script src="{{ asset('assets/lib/sweet-alert/sweetalert.min.js') }}"></script>

<!-- apex-->
<script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<!-- chart_widget-->
{{-- <script src="{{ asset('assets/js/chart-widget.js') }}"></script>--}}
<script src="{{ asset('assets/js/custom/chart.js') }}"></script>

<script src="{{ asset('assets/js/custom/site.js') }}"></script>

@endsection
