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
                    @if ($document)
                        <div class="file-content">
                            <div class="card border">
                                <div class="card-body file-manager">
                                    <h4 class="mb-3">{{ __('dashboard.upload_a_document') }} </h4>

                                    <form class="mb-4 row" id="upload_pdf_document" method="POST" action="{{ route('app_upload_pdf_document') }}" token="{{ csrf_token() }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id-document" value="{{ $document->id }}">
                                        <input type="hidden" name="id_site" value="{{ $site->id }}">
                                        <input type="hidden" name="id_room" value="{{ $room->id }}">

                                        <input type="hidden" name="file-message" id="file-message" value="{{ __('dashboard.please_select_a_file') }}">
                                        <input type="hidden" name="file-message-pdf-extension" id="file-message-pdf-extension" value="{{ __('dashboard.only_PDF_files_are_allowed') }}">
                                        <input type="hidden" name="file-size" id="file-size" value="{{ __('dashboard.file_must_not_exceed') }}">

                                        <label for="file-add" class="col-sm-3 col-form-label">{{ __('dashboard.add_a_file') }}</label>
                                        <div class="col-sm-9">
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <input class="form-control" type="file" id="file-add" name="file_add" accept=".pdf">
                                                </div>
                                                <small class="text-danger" id="file-add-error"></small>
                                            </div>

                                            <div class="progress mb-3" id="zone-progress-bar-purchase" hidden>
                                                <div class="progress-bar bg-success" role="progressbar" id="progress-bar-purchase" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                            </div>

                                            @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "superadmin" || $iSpermission === true)
                                                <div class="float-end">
                                                    <button class="btn btn-primary btn-file" type="submit" id="button-addon2">
                                                        <i class="fa-solid fa-floppy-disk"></i>
                                                        {{ __('licence.save') }}
                                                    </button>
                                                    <button class="btn btn-primary btn-loading-file d-none" type="button" disabled>
                                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                        {{ __('auth.loading') }}
                                                    </button>
                                                </div>
                                            @endif


                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card border">
                                <div class="card-body">
                                    @if ($document->lien_numerisation)
                                        <ul class="d-flex flex-row files-content mb-3">
                                            <li class="folder-box d-flex align-items-center">
                                                <div class="d-flex align-items-center files-list">
                                                    <a href="#" class="flex-shrink-0 file-left" data-bs-toggle="modal" onclick="setConsultation('{{ Auth::user()->id }}', '{{ $document->id }}', '{{ $room->id }}', '{{ csrf_token() }}', '{{ route('app_set_doc_consultation') }}')" data-bs-target="#overview-document-{{ $document->id }}"><i class="fa-solid fa-file-pdf text-danger fs-4"></i></a>
                                                    <div class="flex-grow-1 ms-3">
                                                    <a href="#" class="f-w-600 h5 text-primary" data-bs-toggle="modal" onclick="setConsultation('{{ Auth::user()->id }}', '{{ $document->id }}', '{{ $room->id }}', '{{ csrf_token() }}', '{{ route('app_set_doc_consultation') }}')" data-bs-target="#overview-document-{{ $document->id }}">{{ $document->titre . '.pdf' }} </a>
                                                    <p>{{ Carbon\Carbon::parse($document->updated_at)->ago() }}, {{ $size_human }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="alert alert-light-primary" role="alert">
                                            <p class="text-primary"><i class="fa-solid fa-file-zipper"></i> {{ __('dashboard.archived_document') }}  </p>
                                        </div>

                                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#consultation-modal">
                                            <i class="fa-solid fa-eye"></i>
                                            {{ __('dashboard.consultation_history') }}
                                        </button>
                                    @else
                                        <div class="alert alert-light-warning" role="alert">
                                            <p class="text-warning"><i class="fa-solid fa-file"></i> {{ __('dashboard.draft_document') }}  </p>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endif

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

{{-- Modal aperçu document --}}
@include('document.document-modal')

<!-- Modal -->
<div class="modal fade" id="consultation-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                {{ __('dashboard.consultation_history') }}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="display" id="basic-2">
                    <thead>
                        <th>N°</th>
                        {{--<th>Document </th>--}}
                        <th>{{ __('auth.user') }} </th>
                        <th>Consultation </th>
                    </thead>
                    <tbody>
                        @foreach ($consultations as $consultation)
                            <tr>
                                <td>{{ $loop->iteration }} </td>
                                {{--<td>{{ str($consultation->document->titre)->limit(30) }} </td>--}}
                                <td>{{ $consultation->user->name }} </td>
                                <td>
                                    <span class="badge rounded-pill badge-light-primary">
                                        <span class="d-flex">
                                            <span class="ms-1">{{ Carbon\Carbon::parse($consultation->updated_at)->ago() }}</span>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> {{ __('dashboard.close') }} </button>
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

<script src="{{ asset('assets/lib/jqueryForm/jqueryForm.min.js') }}"></script>

<script src="{{ asset('assets/js/custom/document-add.js') }}"></script>

@endsection
