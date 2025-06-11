@extends('base')
@section('title', $classeur ? __('dashboard.update_binder') : __('dashboard.add_binder'))
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
                            <h2>{{ $classeur ? __('dashboard.update_binder') : __('dashboard.add_binder') }} </h2>
                            {{--<p class="mb-0 text-muted">{{ $room->name }} </p>--}}
                        </div>
                        <div class="col-sm-6 col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app_classeur', ['id_site' => $site->id, 'id_room' => $room->id]) }}"><i class="iconly-Category icli svg-color"></i></a></li>
                                <li class="breadcrumb-item">{{ __('dashboard.binders') }}</li>
                                <li class="breadcrumb-item active">{{ $classeur ? __('dashboard.update_binder') : __('dashboard.add_binder') }} </li>
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
                                                <strong>{{ __('dashboard.cabinet') }} : {{ $classeur ? $classeur->boite->etagere->armoire->numero : "" }} </strong>
                                            </div>

                                            <div class="tree-item mt-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-layer-group tree-icon"></i>
                                                    <strong>{{ __('dashboard.shelve') }} : {{ $classeur ? $classeur->boite->etagere->numero : "" }} </strong>
                                                </div>

                                                <div class="tree-item mt-2">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa-solid fa-box-archive tree-icon"></i>
                                                        <strong>{{ __('dashboard.box') }} : {{ $classeur ? $classeur->boite->numero : "" }} </strong>
                                                    </div>

                                                    <div class="tree-item mt-2">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fa-solid fa-book-open tree-icon"></i>
                                                            <strong>{{ __('dashboard.binder') }} : {{ $classeur ? $classeur->numero : "" }} </strong>
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
                </div>
                <div class="col-md-9">
                    <div class="card border">
                        <div class="card-body">
                            <form class="theme-form row g-3" action="{{ route('app_save_classeur') }}" method="POST">
                                @csrf
                                <input type="hidden" name="request-type" value="{{ $classeur ? "edit" : "add" }}">
                                <input type="hidden" name="id" value="{{ $classeur ? $classeur->id : "0" }}">
                                <input type="hidden" name="id_site" value="{{ $site->id }}">
                                <input type="hidden" name="id_room" value="{{ $room->id }}">

                                <div class="col-sm-3">
                                    <label for="classeur-number" class="form-label">{{ __('dashboard.number') }} </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('classeur-number') is-invalid @enderror" name="classeur-number" id="classeur-number" placeholder="{{ __('dashboard.enter_binder_number_e_g_B01') }}" value="{{ $classeur ? $classeur->numero : old('classeur-number') }}">
                                    <small class="text-danger">@error('classeur-number') {{ $message }} @enderror</small>
                                </div>

                                <div class="col-sm-3">
                                    <label for="classeur-description" class="form-label">Description </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('classeur-description') is-invalid @enderror" name="classeur-description" id="classeur-description" placeholder="{{ __('dashboard.enter_a_description_of_the_binder') }}" value="{{ $classeur ? $classeur->description : old('classeur-description') }}">
                                    <small class="text-danger">@error('classeur-description') {{ $message }} @enderror</small>
                                </div>

                                <div class="col-sm-3">
                                    <label for="classeur-boite" class="form-label">{{ __('dashboard.box') }} </label>
                                </div>
                                <div class="col-sm-9">
                                    <select name="classeur-boite" id="classeur-boite" class="form-select @error('classeur-boite') is-invalid @enderror">
                                        @if ($classeur)
                                            <option value="{{ $classeur->boite->id }}" selected>
                                                {{ __('dashboard.box') }} : {{ $classeur->boite->numero }} ({{ $classeur->boite->description }}) &rarr;
                                                {{ __('dashboard.shelve') }} : {{ $classeur->boite->etagere->numero }} ({{ $classeur->boite->etagere->description }}) &rarr;
                                                {{ __('dashboard.cabinet') }} : {{ $classeur->boite->etagere->armoire->numero }} ({{ $classeur->boite->etagere->armoire->description }})
                                            </option>
                                        @else
                                            <option value="" {{ old('classeur-boite') === null ? 'selected' : '' }}>
                                                {{ __('dashboard.select_the_box') }}
                                            </option>
                                        @endif

                                        @foreach ($boites as $boite)
                                            <option value="{{ $boite->id }}" {{ old('classeur-boite') == $boite->id ? 'selected' : '' }}>
                                                {{ __('dashboard.box') }} : {{ $boite->numero }} ({{ $boite->description }}) &rarr;
                                                {{ __('dashboard.shelve') }} : {{ $boite->etagere->numero }} ({{ $boite->etagere->description }}) &rarr;
                                                {{ __('dashboard.cabinet') }} : {{ $boite->etagere->armoire->numero }} ({{ $boite->etagere->armoire->description }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">@error('classeur-boite'){{ $message }}@enderror</small>
                                </div>

                                <div class="text-end">
                                    @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                        @include('buttons.save-button')

                                        @if ($classeur)
                                            <button class="btn btn-danger btn-air-light" type="button" onclick="deleteElement('{{ $classeur->id }}', '{{ route('app_delete_classeur') }}', '{{ csrf_token() }}')">
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
                            <h3 class="mb-4">{{ __('dashboard.folders') }} </h3>

                            @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                @if ($classeur)
                                    <a class="btn btn-primary mb-4" role="button" href="{{ route('app_add_chemise', ['id_site' => $site->id, 'id_room' => $room->id, 'id_chemise' => 0]) }}">
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
                                        <th>Documents </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($chemises as $chemise)
                                        <tr>
                                            <td>{{ $loop->iteration }} </td>
                                            <td>{{ $chemise->numero }} </td>
                                            <td>{{ $chemise->description }} </td>
                                            <td>
                                                <span class="badge rounded-pill badge-light-primary">
                                                    <span class="d-flex">
                                                        <i class="fa-solid fa-file-lines icli"></i>
                                                        <span class="ms-1">{{ number_format($chemise->documents->count(), 0, '', ' ') }}</span>
                                                    </span>
                                                </span>
                                            </td>
                                            <td>
                                                @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                                    <ul class="action">
                                                        <li class="edit">
                                                            <a href="{{ route('app_add_chemise', ['id_site' => $site->id, 'id_room' => $room->id, 'id_chemise' => $chemise->id]) }}"><i class="icon-pencil-alt"></i></a>
                                                        </li>
                                                        <li class="delete">
                                                            <a href="#" onclick="deleteElement('{{ $chemise->id }}', '{{ route('app_delete_chemise') }}', '{{ csrf_token() }}')"><i class="icon-trash"></i></a>
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
