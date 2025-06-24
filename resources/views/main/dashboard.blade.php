@extends('base')
@section('title', __('dashboard.dashboard'))
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
                            <h2>{{ __('dashboard.dashboard') }} </h2>
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
                                <li class="breadcrumb-item active">{{ $room->name }} </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid general-widget">
                <div class="row">

                    <div class="col-sm-6 col-xl-3 box-col-6">
                        <div class="card widget-1">
                            <div class="card-body">
                                <div class="widget-content">
                                    <div class="widget-round secondary">
                                        <div class="bg-round">
                                            <i class="fas fa-server text-secondary"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h4>{{ number_format($armoiresCount, 0, '', ' ') }} </h4><span class="f-light">{{ __('dashboard.cabinets') }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3 box-col-6">
                        <div class="card widget-1">
                            <div class="card-body">
                                <div class="widget-content">
                                    <div class="widget-round primary">
                                        <div class="bg-round">
                                            <i class="fa-solid fa-book-open text-primary"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h4>{{ number_format($classeursCount, 0, '', ' ') }}</h4><span class="f-light">{{ __('dashboard.binders') }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3 box-col-6">
                        <div class="card widget-1">
                            <div class="card-body">
                                <div class="widget-content">
                                    <div class="widget-round secondary">
                                        <div class="bg-round">
                                            <i class="fa-solid fa-folder text-secondary"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h4>{{ number_format($chemisesCount, 0, '', ' ') }}</h4><span class="f-light">{{ __('dashboard.folders') }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3 box-col-6">
                        <div class="card widget-1">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card pie-card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h3>{{ __('dashboard.archive_status') }} </h3>
                            </div>
                        </div>
                        <div class="card-body revenue-category row">
                            <div class="col-md-6">
                                <div class="pie-chart mb-3" id="pie-chart"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="border border-primary rounded border-2 alert-light-primary" role="alert">
                                    <div class="text-center p-3">
                                        <i class="fa-solid fa-file-zipper text-center mb-3 fa-3x text-primary"></i>
                                        <h2 class="mb-3 text-dark">{{ number_format($documentsArchivCount, 0, '', ' ') }}/{{ number_format($documentsCount, 0, '', ' ') }}</h2>
                                        <p class="text-dark">{{ __('dashboard.archived_documents') }} </p>
                                    </div>
                                </div>
                                <div class="mb-2"></div>
                                <div class="border border-secondary rounded border-2 alert-light-secondary" role="alert">
                                    <div class="text-center p-3">
                                        <i class="fa-solid fa-file text-center mb-3 fa-3x text-secondary"></i>
                                        <h2 class="mb-3 text-dark">{{ number_format($documentsNonArchivCount, 0, '', ' ') }}/{{ number_format($documentsCount, 0, '', ' ') }}</h2>
                                        <p class="text-dark">{{ __('dashboard.draft_documents') }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">

                </div>
            </div>




        </div>
    </div>

</div>

<input type="hidden" id="archiveds" value="{{ __('dashboard.archiveds') }}">
<input type="hidden" id="drafts" value="{{ __('dashboard.drafts') }}">

@include('global.scipt')

<script>
    window.archived = {!! $archived !!};
    window.draft = {!! $draft !!};
</script>

<!-- sidebar -->
<script src="{{ asset('assets/js/sidebar.js') }}"></script>
<!-- scrollbar-->
<script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>

<script src="{{ asset('assets/js/chart/morris-chart/prettify.min.js') }}"></script>

<!-- apex-->
<script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>

<script src="{{ asset('assets/js/custom/dashboard.js') }}"></script>

@endsection
