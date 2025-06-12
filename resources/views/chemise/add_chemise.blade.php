@extends('base')
@section('title', $chemise ? __('dashboard.update_folder') : __('dashboard.add_folder'))
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
                            <h2>{{ $chemise ? __('dashboard.update_folder') : __('dashboard.add_folder') }} </h2>
                            {{--<p class="mb-0 text-muted">{{ $room->name }} </p>--}}
                        </div>
                        <div class="col-sm-6 col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app_chemise', ['id_site' => $site->id, 'id_room' => $room->id]) }}"><i class="iconly-Folder icli svg-color"></i></a></li>
                                <li class="breadcrumb-item">{{ __('dashboard.folders') }}</li>
                                <li class="breadcrumb-item active">{{ $chemise ? __('dashboard.update_folder') : __('dashboard.add_folder') }} </li>
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
                                                <strong>{{ __('dashboard.cabinet') }} : {{ $chemise ? $chemise->classeur->boite->etagere->armoire->numero : "" }} </strong>
                                            </div>

                                            <div class="tree-item mt-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-layer-group tree-icon"></i>
                                                    <strong>{{ __('dashboard.shelve') }} : {{ $chemise ? $chemise->classeur->boite->etagere->numero : "" }} </strong>
                                                </div>

                                                <div class="tree-item mt-2">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa-solid fa-box-archive tree-icon"></i>
                                                        <strong>{{ __('dashboard.box') }} : {{ $chemise ? $chemise->classeur->boite->numero : "" }} </strong>
                                                    </div>

                                                    <div class="tree-item mt-2">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fa-solid fa-book-open tree-icon"></i>
                                                            <strong>{{ __('dashboard.binder') }} : {{ $chemise ? $chemise->classeur->numero : "" }} </strong>
                                                        </div>

                                                        <div class="tree-item mt-2">
                                                            <div class="d-flex align-items-center">
                                                                <i class="fa-solid fa-folder tree-icon"></i>
                                                                <strong>{{ __('dashboard.folder') }} : {{ $chemise ? $chemise->numero : "" }} </strong>
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
                </div>

                <div class="col-md-9">
                    <div class="card border">
                        <div class="card-body">
                            <form class="theme-form row g-3" action="{{ route('app_save_chemise') }}" method="POST">
                                @csrf
                                <input type="hidden" name="request-type" value="{{ $chemise ? "edit" : "add" }}">
                                <input type="hidden" name="id" value="{{ $chemise ? $chemise->id : "0" }}">
                                <input type="hidden" name="id_site" value="{{ $site->id }}">
                                <input type="hidden" name="id_room" value="{{ $room->id }}">

                                <div class="col-sm-3">
                                    <label for="chemise-number" class="form-label">{{ __('dashboard.number') }} </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('chemise-number') is-invalid @enderror" name="chemise-number" id="chemise-number" placeholder="{{ __('dashboard.enter_folder_number_e_g_F01') }}" value="{{ $chemise ? $chemise->numero : old('chemise-number') }}">
                                    <small class="text-danger">@error('chemise-number') {{ $message }} @enderror</small>
                                </div>

                                <div class="col-sm-3">
                                    <label for="chemise-description" class="form-label">Description </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('chemise-description') is-invalid @enderror" name="chemise-description" id="chemise-description" placeholder="{{ __('dashboard.enter_a_description_of_the_folder') }}" value="{{ $chemise ? $chemise->description : old('chemise-description') }}">
                                    <small class="text-danger">@error('chemise-description') {{ $message }} @enderror</small>
                                </div>

                                <div class="col-sm-3">
                                    <label for="chemise-classeur" class="form-label">{{ __('dashboard.binder') }} </label>
                                </div>
                                <div class="col-sm-9">
                                    <select name="chemise-classeur" id="chemise-classeur" class="form-select @error('chemise-classeur') is-invalid @enderror">
                                        @if ($chemise)
                                            <option value="{{ $chemise->classeur->id }}" selected>
                                                {{ __('dashboard.binder') }} : {{ $chemise->classeur->numero }} ({{ $chemise->classeur->description }}) &rarr;
                                                {{ __('dashboard.box') }} : {{ $chemise->classeur->boite->numero }} ({{ $chemise->classeur->boite->description }}) &rarr;
                                                {{ __('dashboard.shelve') }} : {{ $chemise->classeur->boite->etagere->numero }} ({{ $chemise->classeur->boite->etagere->description }}) &rarr;
                                                {{ __('dashboard.cabinet') }} : {{ $chemise->classeur->boite->etagere->armoire->numero }} ({{ $chemise->classeur->boite->etagere->armoire->description }})
                                            </option>
                                        @else
                                            <option value="" {{ old('chemise-classeur') === null ? 'selected' : '' }}>
                                                {{ __('dashboard.select_the_binder') }}
                                            </option>
                                        @endif

                                        @foreach ($classeurs as $classeur)
                                            <option value="{{ $classeur->id }}" {{ old('chemise-classeur') == $classeur->id ? 'selected' : '' }}>
                                                {{ __('dashboard.binder') }} : {{ $classeur->numero }} ({{ $classeur->description }}) &rarr;
                                                {{ __('dashboard.box') }} : {{ $classeur->boite->numero }} ({{ $classeur->boite->description }}) &rarr;
                                                {{ __('dashboard.shelve') }} : {{ $classeur->boite->etagere->numero }} ({{ $classeur->boite->etagere->description }}) &rarr;
                                                {{ __('dashboard.cabinet') }} : {{ $classeur->boite->etagere->armoire->numero }} ({{ $classeur->boite->etagere->armoire->description }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">@error('chemise-classeur'){{ $message }}@enderror</small>
                                </div>

                                <div class="text-end">
                                    @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                        @include('buttons.save-button')

                                        @if ($chemise)
                                            <button class="btn btn-danger btn-air-light" type="button" onclick="deleteElement('{{ $chemise->id }}', '{{ route('app_delete_chemise') }}', '{{ csrf_token() }}')">
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
