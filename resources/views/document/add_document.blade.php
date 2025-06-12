@extends('base')
@section('title', $document ? __('dashboard.update_document') : __('dashboard.add_document'))
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
                            <h2>{{ $document ? __('dashboard.update_document') : __('dashboard.add_document') }} </h2>
                            {{--<p class="mb-0 text-muted">{{ $room->name }} </p>--}}
                        </div>
                        <div class="col-sm-6 col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app_document', ['id_site' => $site->id, 'id_room' => $room->id]) }}"><i class="iconly-Document icli svg-color"></i></a></li>
                                <li class="breadcrumb-item">Documents</li>
                                <li class="breadcrumb-item active">{{ $document ? __('dashboard.update_document') : __('dashboard.add_document') }} </li>
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
                                                <strong>{{ __('dashboard.cabinet') }} : {{ $document ? $document->chemise->classeur->boite->etagere->armoire->numero : "" }} </strong>
                                            </div>

                                            <div class="tree-item mt-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-layer-group tree-icon"></i>
                                                    <strong>{{ __('dashboard.shelve') }} : {{ $document ? $document->chemise->classeur->boite->etagere->numero : "" }} </strong>
                                                </div>

                                                <div class="tree-item mt-2">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa-solid fa-box-archive tree-icon"></i>
                                                        <strong>{{ __('dashboard.box') }} : {{ $document ? $document->chemise->classeur->boite->numero : "" }} </strong>
                                                    </div>

                                                    <div class="tree-item mt-2">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fa-solid fa-book-open tree-icon"></i>
                                                            <strong>{{ __('dashboard.binder') }} : {{ $document ? $document->chemise->classeur->numero : "" }} </strong>
                                                        </div>

                                                        <div class="tree-item mt-2">
                                                            <div class="d-flex align-items-center">
                                                                <i class="fa-solid fa-folder tree-icon"></i>
                                                                <strong>{{ __('dashboard.folder') }} : {{ $document ? $document->chemise->numero : "" }} </strong>
                                                            </div>

                                                            <div class="tree-item mt-2">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fa-solid fa-file-lines tree-icon"></i>
                                                                    <strong>Document : {{ $document ? $document->titre : "" }} </strong>
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
                </div>

                <div class="col-md-9">
                    <div class="card border">
                        <div class="card-body">
                            <form class="theme-form row g-3" action="{{ route('app_save_document') }}" method="POST">
                                @csrf
                                <input type="hidden" name="request-type" value="{{ $document ? "edit" : "add" }}">
                                <input type="hidden" name="id" value="{{ $document ? $document->id : "0" }}">
                                <input type="hidden" name="id_site" value="{{ $site->id }}">
                                <input type="hidden" name="id_room" value="{{ $room->id }}">

                                <div class="col-sm-3">
                                    <label for="document-titre" class="form-label">{{ __('dashboard.title') }} *</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('document-titre') is-invalid @enderror" name="document-titre" id="document-titre" placeholder="{{ __('dashboard.enter_the_document_title') }}" value="{{ $document ? $document->titre : old('document-titre') }}">
                                    <small class="text-danger">@error('document-titre') {{ $message }} @enderror</small>
                                </div>

                                <div class="col-sm-3">
                                    <label for="document-reference" class="form-label">{{ __('dashboard.reference') }} *</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('document-reference') is-invalid @enderror" name="document-reference" id="document-reference" placeholder="{{ __('dashboard.enter_the_document_reference') }}" value="{{ $document ? $document->reference : old('document-reference') }}">
                                    <small class="text-danger">@error('document-reference') {{ $message }} @enderror</small>
                                </div>

                                <div class="col-sm-3">
                                    <label for="document-source" class="form-label">Source </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('document-source') is-invalid @enderror" name="document-source" id="document-source" placeholder="{{ __('dashboard.enter_the_document_source') }}" value="{{ $document ? $document->origine : old('document-source') }}">
                                    <small class="text-danger">@error('document-source') {{ $message }} @enderror</small>
                                </div>

                                <div class="col-sm-3">
                                    <label for="document-dure" class="form-label">{{ __('dashboard.shelf_life') }} </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row g-2">
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <select class="form-select" id="document-dure-detail" name="document-dure-detail">
                                                    @if ($document)
                                                        <option value="{{ $document->detail_duree_conservation == "" ? '' : $document->detail_duree_conservation  }}" selected>
                                                            {{ $document->detail_duree_conservation == "" ? __('dashboard.days_or_months_or_years') : __('dashboard.' . $document->detail_duree_conservation) }}
                                                        </option>
                                                    @else
                                                        @php
                                                            $oldValue = old('document-dure-detail');
                                                        @endphp
                                                        <option value="{{ $oldValue ?? '' }}" {{ !$oldValue ? 'selected' : '' }}>
                                                            {{ $oldValue ? __('dashboard.' . $oldValue) : __('dashboard.days_or_months_or_years') }}
                                                        </option>
                                                    @endif

                                                    <option value="days" {{ !$document && $oldValue === 'days' ? 'selected' : '' }}>
                                                        {{ __('dashboard.days') }}
                                                    </option>
                                                    <option value="months" {{ !$document && $oldValue === 'months' ? 'selected' : '' }}>
                                                        {{ __('dashboard.months') }}
                                                    </option>
                                                    <option value="years" {{ !$document && $oldValue === 'years' ? 'selected' : '' }}>
                                                        {{ __('dashboard.years') }}
                                                    </option>
                                                </select>
                                                <label for="document-dure-detail">{{ __('dashboard.duration_in') }} </label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="number" class="form-control @error('document-dure') is-invalid @enderror" name="document-dure" id="document-dure" value="{{ $document ? $document->duree_conservation : old('document-dure') }}">
                                                <label for="document-dure">{{ __('dashboard.enter_the_documents_shelf_life') }}</label>
                                            </div>
                                            <small class="text-danger">@error('document-dure') {{ $message }} @enderror</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="document-folder" class="form-label">{{ __('dashboard.folder') }} *</label>
                                </div>
                                <div class="col-sm-9">
                                    <select name="document-folder" id="document-folder" class="form-select @error('document-folder') is-invalid @enderror">
                                        @if ($document)
                                            <option value="{{ $document->chemise->id }}" selected>
                                                {{ __('dashboard.folder') }} : {{ $document->chemise->numero }} ({{ $document->chemise->description }}) &rarr;
                                                {{ __('dashboard.binder') }} : {{ $document->chemise->classeur->numero }} ({{ $document->chemise->classeur->description }}) &rarr;
                                                {{ __('dashboard.box') }} : {{ $document->chemise->classeur->boite->numero }} ({{ $document->chemise->classeur->boite->description }}) &rarr;
                                                {{ __('dashboard.shelve') }} : {{ $document->chemise->classeur->boite->etagere->numero }} ({{ $document->chemise->classeur->boite->etagere->description }}) &rarr;
                                                {{ __('dashboard.cabinet') }} : {{ $document->chemise->classeur->boite->etagere->armoire->numero }} ({{ $document->chemise->classeur->boite->etagere->armoire->description }})
                                            </option>
                                        @else
                                            <option value="" {{ old('document-folder') === null ? 'selected' : '' }}>
                                                {{ __('dashboard.select_the_folder') }}
                                            </option>
                                        @endif

                                        @foreach ($chemises as $chemise)
                                            <option value="{{ $chemise->id }}" {{ old('document-folder') == $chemise->id ? 'selected' : '' }}>
                                                {{ __('dashboard.folder') }} : {{ $chemise->numero }} ({{ $chemise->description }}) &rarr;
                                                {{ __('dashboard.binder') }} : {{ $chemise->classeur->numero }} ({{ $chemise->classeur->description }}) &rarr;
                                                {{ __('dashboard.box') }} : {{ $chemise->classeur->boite->numero }} ({{ $chemise->classeur->boite->description }}) &rarr;
                                                {{ __('dashboard.shelve') }} : {{ $chemise->classeur->boite->etagere->numero }} ({{ $chemise->classeur->boite->etagere->description }}) &rarr;
                                                {{ __('dashboard.cabinet') }} : {{ $chemise->classeur->boite->etagere->armoire->numero }} ({{ $chemise->classeur->boite->etagere->armoire->description }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">@error('document-folder') {{ $message }} @enderror</small>
                                </div>

                                <div class="col-sm-3">
                                    <label for="document-context" class="form-label">{{ __('dashboard.context') }} </label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="document-context" id="document-context" rows="4" placeholder="{{ __('dashboard.enter_the_document_context') }}">{{ $document ? $document->context : old('document-context') }}</textarea>
                                    <small class="text-danger">@error('document-context') {{ $message }} @enderror</small>
                                </div>

                                <div class="text-end">
                                    @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                        @include('buttons.save-button')

                                        @if ($document)
                                            <button class="btn btn-danger btn-air-light" type="button" onclick="deleteElement('{{ $document->id }}', '{{ route('app_delete_document') }}', '{{ csrf_token() }}')">
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
