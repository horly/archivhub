@extends('base')
@section('title', $etagere ? __('dashboard.update_shelve') : __('dashboard.add_shelve'))
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
                            <h2>{{ $etagere ? __('dashboard.update_shelve') : __('dashboard.add_shelve') }} </h2>
                            {{--<p class="mb-0 text-muted">{{ $room->name }} </p>--}}
                        </div>
                        <div class="col-sm-6 col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app_etagere', ['id_site' => $site->id, 'id_room' => $room->id]) }}"><i class="iconly-Filter icli svg-color"></i></a></li>
                                <li class="breadcrumb-item">{{ __('dashboard.shelves') }}</li>
                                <li class="breadcrumb-item active">{{ $etagere ? __('dashboard.update_shelve') : __('dashboard.add_shelve') }} </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @include('message.flash-message')

            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card border tree-view">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-sitemap me-2"></i>{{ __('dashboard.tree_view') }}
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="tree-structure">
                                <div class="tree-item">
                                    <div class="d-flex align-items-center">
                                         <i class="fa-solid fa-city tree-icon"></i>
                                        <strong>Site : {{ $site->name }} </strong>
                                    </div>
                                </div>

                                <div class="tree-item mt-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-door-open tree-icon"></i>
                                        <strong>{{ __('dashboard.room') }} : {{ $room->name }} </strong>
                                    </div>
                                </div>

                                <div class="tree-item mt-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-server tree-icon"></i>
                                        <strong>{{ __('dashboard.cabinet') }} : {{ $etagere ? $etagere->armoire->numero : "" }} </strong>
                                    </div>
                                </div>

                                <div class="tree-item mt-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-layer-group tree-icon"></i>
                                        <strong>{{ __('dashboard.shelve') }} : {{ $etagere ? $etagere->numero : "" }} </strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card border">
                        <div class="card-body">
                            <form class="theme-form row g-3" action="{{ route('app_save_etagere') }}" method="POST">
                                @csrf

                                <input type="hidden" name="request-type" value="{{ $etagere ? "edit" : "add" }}">
                                <input type="hidden" name="id" value="{{ $etagere ? $etagere->id : "0" }}">
                                <input type="hidden" name="id_site" value="{{ $site->id }}">
                                <input type="hidden" name="id_room" value="{{ $room->id }}">

                                <div class="col-sm-3">
                                    <label for="armoire-number" class="form-label">{{ __('dashboard.number') }} </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('etagere-number') is-invalid @enderror" name="etagere-number" id="etagere-number" placeholder="{{ __('dashboard.enter_shelve_number_e_g_E01') }}" value="{{ $etagere ? $etagere->numero : old('etagere-number') }}">
                                    <small class="text-danger">@error('etagere-number') {{ $message }} @enderror</small>
                                </div>

                                <div class="col-sm-3">
                                    <label for="armoire-description" class="form-label">Description </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('etagere-description') is-invalid @enderror" name="etagere-description" id="etagere-description" placeholder="{{ __('dashboard.enter_a_description_of_the_shelve') }}" value="{{ $etagere ? $etagere->description : old('etagere-description') }}">
                                    <small class="text-danger">@error('etagere-description') {{ $message }} @enderror</small>
                                </div>

                                <div class="col-sm-3">
                                    <label for="etagere-armoire" class="form-label">{{ __('dashboard.cabinet') }} </label>
                                </div>
                                <div class="col-sm-9">
                                    <select name="etagere-armoire" id="etagere-armoire" class="form-select @error('etagere-armoire') is-invalid @enderror">

                                        @if ($etagere)
                                            <option value="{{ $etagere->armoire->id }}" selected>
                                                {{ $etagere->armoire->numero }} - {{ $etagere->armoire->description }}
                                            </option>
                                        @else
                                            <option value="" {{ old('etagere-armoire') === null ? 'selected' : '' }}>
                                                {{ __('dashboard.select_the_cabinet') }}
                                            </option>
                                        @endif

                                        @foreach ($armoires as $armoire)
                                            <option value="{{ $armoire->id }}" {{ old('etagere-armoire') == $armoire->id ? 'selected' : '' }}>
                                                {{ $armoire->numero }} - {{ $armoire->description }}
                                            </option>
                                        @endforeach

                                    </select>
                                    <small class="text-danger">@error('etagere-armoire'){{ $message }}@enderror</small>
                                </div>

                                <div class="text-end">
                                    @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                        @include('buttons.save-button')

                                        @if ($etagere)
                                            <button class="btn btn-danger btn-air-light" type="button" onclick="deleteElement('{{ $etagere->id }}', '{{ route('app_delete_etagere') }}', '{{ csrf_token() }}')">
                                                <i class="fa-solid fa-trash-can"></i>
                                                {{ __('dashboard.delete') }}
                                            </button>
                                        @endif
                                    @endif
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="card border">
                        <div class="card-body">
                            <h3 class="mb-4">{{ __('dashboard.boxes') }} </h3>

                            @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                @if ($etagere)
                                    <a class="btn btn-primary mb-4" role="button" href="{{ route('app_add_boite', ['id_site' => $site->id, 'id_room' => $room->id, 'id_boite' => 0]) }}">
                                        <i class="fa-solid fa-circle-plus"></i>
                                        {{ __('auth.add') }}
                                    </a>
                                @endif
                            @endif

                            <table class="display" id="basic-2">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>{{ __('dashboard.number') }} </th>
                                        <th>Description </th>
                                        <th>{{ __('dashboard.binders') }} </th>
                                        <th>{{ __('dashboard.folders') }} </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($boites as $boite)
                                        <tr>
                                            <td>{{ $loop->iteration }} </td>
                                            <td>{{ $boite->numero }} </td>
                                            <td>{{ $boite->description }} </td>
                                            <td>
                                                <span class="badge rounded-pill badge-light-primary">
                                                    <span class="d-flex">
                                                        <i class="fa-solid fa-book-open icli"></i>
                                                        <span class="ms-1">{{ number_format($boite->classeurs->count(), 0, '', ' ') }}</span>
                                                    </span>
                                                </span>
                                            </td>
                                            <td>
                                                @php
                                                    $chemises = App\Models\Chemise::select('chemises.*')
                                                            ->join('classeurs', 'classeurs.id', '=', 'chemises.classeur_id')
                                                            ->where('classeurs.boite_id', $boite->id)
                                                            ->count();
                                                @endphp
                                                <span class="badge rounded-pill badge-light-primary">
                                                    <span class="d-flex">
                                                        <i class="fa-solid fa-folder icli"></i>
                                                        <span class="ms-1">{{ number_format($chemises, 0, '', ' ') }}</span>
                                                    </span>
                                                </span>
                                            </td>
                                            <td>
                                                @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                                    <ul class="action">
                                                        <li class="edit">
                                                            <a href="{{ route('app_add_boite', ['id_site' => $site->id, 'id_room' => $room->id, 'id_boite' => $boite->id]) }}"><i class="icon-pencil-alt"></i></a>
                                                        </li>
                                                        <li class="delete">
                                                            <a href="#" onclick="deleteElement('{{ $boite->id }}', '{{ route('app_delete_boite') }}', '{{ csrf_token() }}')"><i class="icon-trash"></i></a>
                                                        </li>
                                                    </ul>
                                                @endif
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
    </div>
</div>


@include('global.scipt')

<!-- sidebar -->
<script src="{{ asset('assets/js/sidebar.js') }}"></script>
<!-- scrollbar-->
<script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>

<!-- Sweetalert js-->
<script src="{{ asset('assets/lib/sweet-alert/sweetalert.min.js') }}"></script>

<!-- datatable-->
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<!-- page_datatable-->
<script src="{{ asset('assets/js/js-datatables/datatables/datatable.custom.js') }}"></script>
<!-- page_datatable-->
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>

@endsection
