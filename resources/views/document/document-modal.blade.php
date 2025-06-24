@if ($document)
    <!-- Modal -->
    <div class="modal fade" id="overview-document-{{ $document->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    </h1>{{ __('dashboard.document_preview') }}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($document && $document->lien_numerisation)
                        <object data="{{ asset('assets/documents') }}/{{ $document->id }}.pdf" type="application/pdf" width="100%" height="600px">
                            <div class="alert alert-warning text-center" role="alert">
                                <i class="fa-regular fa-file"></i> {{ __('dashboard.no_preview_available') }}
                            </div>
                        </object>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> {{ __('dashboard.close') }} </button>
                </div>
            </div>
        </div>
    </div>
@endif
