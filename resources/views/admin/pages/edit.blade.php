@extends('adminlte::page')

@section('title', 'Edit ' . $page->title)

<!-- CSS untuk Summernote & Custom Style -->
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <style>
        .gallery-item { position: relative; margin-bottom: 20px; }
        .gallery-item img { height: 120px; width: 100%; object-fit: cover; border-radius: 5px; border: 1px solid #ddd; }
        /* Khusus untuk logo client agar ukurannya proporsional dan tidak terpotong */
        .client-item img { height: 80px; width: 100%; object-fit: contain; background: #fff; padding: 5px; }
        .new-badge { position: absolute; top: 5px; right: 5px; }
    </style>
@stop

@section('content_header')
    <h1>Edit {{ $page->title }} Content</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
        // Filter foto berdasarkan tipe untuk ditampilkan di area form yang tepat
        $bgGallery = $page->galleries->where('type', 'background')->first();
        $sliderGalleries = $page->galleries->where('type', 'slider');
        $clientGalleries = $page->galleries->where('type', 'client'); // Khusus Partner/Client
    @endphp

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Content Editor</h3>
        </div>
        
        <form action="{{ url('admin/pages/'.$page->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                
                <!-- 1. Form Upload Single Image (Untuk Background) -->
                <div class="form-group mb-4">
                    <label>Featured / Background Image</label>
                    <input type="file" name="image" class="form-control" id="imageInput">
                    <small class="text-muted">Leave blank if you don't want to change the current image.</small>
                    
                    @php
                        $bgImg = asset('images/bg/festival.jpg'); // Default fallback
                        if ($bgGallery) {
                            $bgImg = str_starts_with($bgGallery->image, 'images/') ? asset($bgGallery->image) : asset('storage/' . $bgGallery->image);
                        }
                    @endphp
                    <br>
                    <img id="imagePreview" src="{{ $bgImg }}" alt="Current Image" style="max-width: 250px; margin-top: 10px; border-radius: 5px;">
                    
                    @if(!$bgGallery)
                        <br>
                        <span class="badge badge-secondary mt-2">Default Background</span>
                    @endif
                </div>

                <!-- 2A. Form Upload Multiple Image (KHUSUS TIMOR LESTE - SLIDER) -->
                @if($page->slug == 'timor-leste')
                <div class="form-group mb-4 p-3" style="border: 1px dashed #ccc; border-radius: 5px; background-color: #f9f9f9;">
                    <label>Content Slider Gallery (Carousel Images)</label>
                    <p class="text-muted" style="margin-bottom: 5px;"><small>You can select multiple images at once to update the carousel slider.</small></p>
                    
                    <!-- Input dengan array name="galleries[]" dan atribut "multiple" -->
                    <input type="file" name="galleries[]" id="galleryInput" class="form-control" multiple>
                    
                    <div id="newGalleryPreviews" class="row mt-3"></div>
                    
                    <label class="mt-4">Images Currently Displayed on Website:</label>
                    <div class="row mt-2">
                        @if($sliderGalleries && $sliderGalleries->count() > 0)
                            @foreach($sliderGalleries as $gallery)
                                <div class="col-md-2 col-sm-4 gallery-item text-center">
                                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="Carousel Image">
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this image?')) document.getElementById('delete-gallery-{{ $gallery->id }}').submit();" class="btn btn-sm btn-danger mt-1 btn-block">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-2 col-sm-4 gallery-item text-center">
                                <img src="{{ asset('images/folio/timor2.jpg') }}" alt="Default" style="opacity: 0.8;">
                                <span class="badge badge-secondary new-badge">Default</span>
                            </div>
                            <div class="col-md-2 col-sm-4 gallery-item text-center">
                                <img src="{{ asset('images/folio/icon_timor.jpg') }}" alt="Default" style="opacity: 0.8;">
                                <span class="badge badge-secondary new-badge">Default</span>
                            </div>
                        @endif
                    </div>
                </div>
                <hr>
                @endif

                <!-- 2B. Form Upload Multiple Image (KHUSUS COMPANY OVERVIEW - PARTNERS) -->
                @if($page->slug == 'company-overview')
                <div class="form-group mb-4 p-3" style="border: 1px dashed #17a2b8; border-radius: 5px; background-color: #f4fbfd;">
                    <label class="text-info"><i class="fas fa-handshake"></i> Strategic Partners / Clients Logos</label>
                    <p class="text-muted" style="margin-bottom: 5px;"><small>Select multiple logo images to display in the partners section.</small></p>
                    
                    <!-- Input name="clients[]" khusus untuk partner -->
                    <input type="file" name="clients[]" id="clientInput" class="form-control" multiple>
                    
                    <div id="newClientPreviews" class="row mt-3"></div>
                    
                    <label class="mt-4">Logos Currently Displayed:</label>
                    <div class="row mt-2">
                        @if($clientGalleries && $clientGalleries->count() > 0)
                            @foreach($clientGalleries as $gallery)
                                <div class="col-md-2 col-sm-3 gallery-item client-item text-center">
                                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="Client Logo">
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Remove this partner logo?')) document.getElementById('delete-gallery-{{ $gallery->id }}').submit();" class="btn btn-sm btn-danger mt-1 btn-block">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <!-- Fallback Logo Default jika kosong -->
                            <div class="col-md-2 col-sm-3 gallery-item client-item text-center">
                                <img src="{{ asset('images/clients/ajari.png') }}" alt="Default" style="opacity: 0.7;">
                                <span class="badge badge-secondary new-badge">Default</span>
                            </div>
                            <div class="col-md-2 col-sm-3 gallery-item client-item text-center">
                                <img src="{{ asset('images/clients/hydsoft.png') }}" alt="Default" style="opacity: 0.7;">
                                <span class="badge badge-secondary new-badge">Default</span>
                            </div>
                            <div class="col-md-2 col-sm-3 gallery-item client-item text-center">
                                <img src="{{ asset('images/clients/tech5.png') }}" alt="Default" style="opacity: 0.7;">
                                <span class="badge badge-secondary new-badge">Default</span>
                            </div>
                            <div class="col-md-2 col-sm-3 gallery-item client-item text-center">
                                <img src="{{ asset('images/clients/pat.png') }}" alt="Default" style="opacity: 0.7;">
                                <span class="badge badge-secondary new-badge">Default</span>
                            </div>
                            <div class="col-md-2 col-sm-3 gallery-item client-item text-center">
                                <img src="{{ asset('images/clients/interbio.png') }}" alt="Default" style="opacity: 0.7;">
                                <span class="badge badge-secondary new-badge">Default</span>
                            </div>
                            <div class="col-md-2 col-sm-3 gallery-item client-item text-center">
                                <img src="{{ asset('images/clients/bright.png') }}" alt="Default" style="opacity: 0.7;">
                                <span class="badge badge-secondary new-badge">Default</span>
                            </div>
                            <div class="col-12 mt-2">
                                <p class="text-muted"><small><i class="fas fa-info-circle"></i> No custom logos uploaded. Default template logos are currently displayed on the website.</small></p>
                            </div>
                        @endif
                    </div>
                </div>
                <hr>
                @endif

                <!-- 3. Form Summernote (Untuk Teks) -->
                <div class="form-group">
                    <label>Page Content</label>
                    <textarea name="content" id="summernote" class="form-control">{{ $page->content }}</textarea>
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Changes</button>
            </div>
        </form>
    </div>

    <!-- Form invisible untuk hapus gambar gallery (semua tipe) -->
    @if($page->galleries)
        @foreach($page->galleries as $gallery)
            <form id="delete-gallery-{{ $gallery->id }}" action="{{ url('admin/pages/gallery/'.$gallery->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        @endforeach
    @endif

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 400,
                placeholder: 'Write your content here...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            // Preview Background Image
            $('#imageInput').on('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const preview = document.getElementById('imagePreview');
                    preview.src = URL.createObjectURL(file);
                    preview.style.display = 'block';
                }
            });

            // Preview Multiple Gallery Images (Slider)
            $('#galleryInput').on('change', function(e) {
                const files = e.target.files;
                const previewContainer = $('#newGalleryPreviews');
                previewContainer.empty(); 
                if (files && files.length > 0) {
                    previewContainer.append('<div class="col-12 mb-2"><span class="text-success"><i class="fas fa-check"></i> <b>New images selected:</b></span></div>');
                    $.each(files, function(i, file) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            const imgHTML = `<div class="col-md-2 col-sm-4 gallery-item text-center">
                                    <img src="${event.target.result}" style="border: 2px solid #28a745;">
                                    <span class="badge badge-success new-badge">New</span></div>`;
                            previewContainer.append(imgHTML);
                        }
                        reader.readAsDataURL(file);
                    });
                }
            });

            // Preview Multiple Client Logos (Partners)
            $('#clientInput').on('change', function(e) {
                const files = e.target.files;
                const previewContainer = $('#newClientPreviews');
                previewContainer.empty(); 
                if (files && files.length > 0) {
                    previewContainer.append('<div class="col-12 mb-2"><span class="text-info"><i class="fas fa-check"></i> <b>New logos selected:</b></span></div>');
                    $.each(files, function(i, file) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            const imgHTML = `<div class="col-md-2 col-sm-3 gallery-item client-item text-center">
                                    <img src="${event.target.result}" style="border: 2px solid #17a2b8;">
                                    <span class="badge badge-info new-badge">New</span></div>`;
                            previewContainer.append(imgHTML);
                        }
                        reader.readAsDataURL(file);
                    });
                }
            });
        });
    </script>
@stop