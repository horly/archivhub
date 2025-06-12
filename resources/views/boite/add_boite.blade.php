@extends('base')
@section('title', $boite ? __('dashboard.update_box') : __('dashboard.add_box'))
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
                            <h2>{{ $boite ? __('dashboard.update_box') : __('dashboard.add_box') }} </h2>
                            {{--<p class="mb-0 text-muted">{{ $room->name }} </p>--}}
                        </div>
                        <div class="col-sm-6 col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app_boite', ['id_site' => $site->id, 'id_room' => $room->id]) }}"><i class="iconly-Bag-2 icli svg-color"></i></a></li>
                                <li class="breadcrumb-item">{{ __('dashboard.boxes') }}</li>
                                <li class="breadcrumb-item active">{{ $boite ? __('dashboard.update_box') : __('dashboard.add_box') }} </li>
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

                                    <div class="tree-item mt-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-door-open tree-icon"></i>
                                            <strong>{{ __('dashboard.room') }} : {{ $room->name }} </strong>
                                        </div>

                                        <div class="tree-item mt-2">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-server tree-icon"></i>
                                                <strong>{{ __('dashboard.cabinet') }} : {{ $boite ? $boite->etagere->armoire->numero : "" }} </strong>
                                            </div>

                                            <div class="tree-item mt-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-layer-group tree-icon"></i>
                                                    <strong>{{ __('dashboard.shelve') }} : {{ $boite ? $boite->etagere->numero : "" }} </strong>
                                                </div>

                                                <div class="tree-item mt-2">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa-solid fa-box-archive tree-icon"></i>
                                                        <strong>{{ __('dashboard.box') }} : {{ $boite ? $boite->numero : "" }} </strong>
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
                <div class="col-md-9">
                    <div class="card border">
                        <div class="card-body">
                            <form class="theme-form row g-3" action="{{ route('app_save_boite') }}" method="POST">
                                @csrf
                                <input type="hidden" name="request-type" value="{{ $boite ? "edit" : "add" }}">
                                <input type="hidden" name="id" value="{{ $boite ? $boite->id : "0" }}">
                                <input type="hidden" name="id_site" value="{{ $site->id }}">
                                <input type="hidden" name="id_room" value="{{ $room->id }}">

                                <div class="col-sm-3">
                                    <label for="boite-number" class="form-label">{{ __('dashboard.number') }} </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('boite-number') is-invalid @enderror" name="boite-number" id="boite-number" placeholder="{{ __('dashboard.enter_box_number_e_g_B01') }}" value="{{ $boite ? $boite->numero : old('boite-number') }}">
                                    <small class="text-danger">@error('boite-number') {{ $message }} @enderror</small>
                                </div>

                                <div class="col-sm-3">
                                    <label for="boite-description" class="form-label">Description </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('boite-description') is-invalid @enderror" name="boite-description" id="boite-description" placeholder="{{ __('dashboard.enter_a_description_of_the_box') }}" value="{{ $boite ? $boite->description : old('boite-description') }}">
                                    <small class="text-danger">@error('boite-description') {{ $message }} @enderror</small>
                                </div>

                                <div class="col-sm-3">
                                    <label for="boite-etagere" class="form-label">{{ __('dashboard.shelve') }} </label>
                                </div>
                                <div class="col-sm-9">
                                    <select name="boite-etagere" id="boite-etagere" class="form-select @error('boite-etagere') is-invalid @enderror">

                                        @if ($boite)
                                            <option value="{{ $boite->etagere->id }}" selected>
                                                {{ __('dashboard.shelve') }} : {{ $boite->etagere->numero }} ({{ $boite->etagere->description }}) &rarr;
                                                {{ __('dashboard.cabinet') }} : {{ $boite->etagere->armoire->numero }} ({{ $boite->etagere->armoire->description }})
                                            </option>
                                        @else
                                            <option value="" {{ old('boite-etagere') === null ? 'selected' : '' }}>
                                                {{ __('dashboard.select_the_shelve') }}
                                            </option>
                                        @endif

                                        @foreach ($etageres as $etagere)
                                            <option value="{{ $etagere->id }}" {{ old('boite-etagere') == $etagere->id ? 'selected' : '' }}>
                                                {{ __('dashboard.shelve') }} : {{ $etagere->numero }} ({{ $etagere->description }}) &rarr;
                                                {{ __('dashboard.cabinet') }} : {{ $etagere->armoire->numero }} ({{ $etagere->armoire->description }})
                                            </option>
                                        @endforeach

                                    </select>
                                    <small class="text-danger">@error('boite-etagere'){{ $message }}@enderror</small>
                                </div>

                                <div class="text-end">
                                    @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                        @include('buttons.save-button')

                                        @if ($boite)
                                            <button class="btn btn-danger btn-air-light" type="button" onclick="deleteElement('{{ $boite->id }}', '{{ route('app_delete_boite') }}', '{{ csrf_token() }}')">
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
                            <h3 class="mb-4">{{ __('dashboard.binders') }} </h3>

                            @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                @if ($etagere)
                                    <a class="btn btn-primary mb-4" role="button" href="{{ route('app_add_classeur', ['id_site' => $site->id, 'id_room' => $room->id, 'id_classeur' => 0]) }}">
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
                                        <th>{{ __('dashboard.folders') }} </th>
                                        <th>Documents </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classeurs as $classeur)
                                        <tr>
                                            <td>{{ $loop->iteration }} </td>
                                            <td>{{ $classeur->numero }} </td>
                                            <td>{{ $classeur->description }} </td>
                                            <td>
                                                <span class="badge rounded-pill badge-light-primary">
                                                    <span class="d-flex">
                                                        <i class="fa-solid fa-folder icli"></i>
                                                        <span class="ms-1">{{ number_format($classeur->chemises->count(), 0, '', ' ') }}</span>
                                                    </span>
                                                </span>
                                            </td>
                                            <td>
                                                @php
                                                    $documents = App\Models\Document::select('documents.*')
                                                            ->join('chemises', 'chemises.id', '=', 'documents.chemise_id')
                                                            ->where('chemises.classeur_id', $classeur->id)
                                                            ->count();
                                                @endphp
                                                <span class="badge rounded-pill badge-light-primary">
                                                    <span class="d-flex">
                                                        <i class="fa-solid fa-file-lines icli"></i>
                                                        <span class="ms-1">{{ number_format($documents, 0, '', ' ') }}</span>
                                                    </span>
                                                </span>
                                            </td>
                                            <td>
                                                @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                                    <ul class="action">
                                                        <li class="edit">
                                                            <a href="{{ route('app_add_classeur', ['id_site' => $site->id, 'id_room' => $room->id, 'id_classeur' => $boite->id]) }}"><i class="icon-pencil-alt"></i></a>
                                                        </li>
                                                        <li class="delete">
                                                            <a href="#" onclick="deleteElement('{{ $classeur->id }}', '{{ route('app_delete_classeur') }}', '{{ csrf_token() }}')"><i class="icon-trash"></i></a>
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
