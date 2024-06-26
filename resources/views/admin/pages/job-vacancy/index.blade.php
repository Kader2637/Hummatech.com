@extends('admin.layouts.app')

@section('subcontent')
    <div class="py-1"></div>
    <div class="px-3">
        <div class="page-title">
            <div class="d-flex justify-content-between">
                <div class="p-0">
                    <h3>Lowongan</h3>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('job-vacancy.create') }}" class="btn btn-primary">Tambah</a>
                </div>

                {{-- <div class="col-sm-5 ">
                    <div class="d-flex align-items-center">
                        <form action="">
                            <div class="col-12 col-lg-12 d-flex justify-content-end">
                                <div class="d-flex justify-content-lg-end justify-content-start">
                                    <div class="d-flex align-items-center gap-2 mx-2">
                                        <label for="search">Cari:</label>
                                        <input type="text" name="name" value="{{ request()->name }}" id="search" class="form-control mx-3">
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#create-modal">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('content')
<ul class="simple-wrapper nav nav-tabs justify-content-between" id="myTab" role="tablist">
    <div class="d-flex">
        <li class="nav-item"><a class="nav-link active txt-primary" id="profile-tabs" data-bs-toggle="tab"
                href="#active" role="tab" aria-controls="profile" aria-selected="false">Lowongan aktif</a></li>
        <li class="nav-item"><a class="nav-link txt-primary" id="contact-tab" data-bs-toggle="tab"
                href="#nonactive" role="tab" aria-controls="contact" aria-selected="false">Lowongan tidak aktif</a>
        </li>
    </div>  
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active py-3" id="active" role="tabpanel">
        <div class="row">
            @forelse ($activeJobs as $jobVacancy)
            <div class="col-xxl-3 col-xl-50 col-sm-6 proorder-xl-2">
                <div class="card since">
                    <div class="card-header bg-tansparent">
                        @if ($jobVacancy->image != null && Storage::disk('public')->exists($jobVacancy->image))
                            <img src="{{ asset('storage/' . $jobVacancy->image) }}" alt="{{ $jobVacancy->name }}" style="object-fit: cover; width: 100%; height: 200px" class="rounded-top card-img-thumbnail" />
                        @else
                            <img src="{{ asset('blank-img.jpg') }}" alt="{{ $jobVacancy->name }}" style="object-fit: cover; width: 100%; height: 200px" class="rounded-top card-img-thumbnail" />
                        @endif
                    </div>
                    <div class="card-body" style="min-height: 9pc; max-height: 9pc">
                        <div class="d-flex justify-content-between mx-2">
                            <div class="badge bg-light-success text-success">
                                aktif
                            </div>
                            <div>
                                <a href="{{ route('job-vacancy.edit', $jobVacancy->id) }}" class="col col-auto bg-transparent border-0 text-primary fs-5 btn-edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <button class="col col-auto bg-transparent border-0 text-danger fs-5 btn-delete" type="button" data-id="{{ $jobVacancy->id }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mx-2">
                            <h4 class="">{{ $jobVacancy->name }}</h4>
                            <p class="mt-0 mb-2" style="font-size: 17px">{!! Str::words($jobVacancy->description, 14, '...') !!}</p>
                        </div>
                    </div>
                    <div class="mx-2 card-footer gap-2">
                        <button type="button" class="btn btn-primary w-100 btn-detail" 
                        data-id="{{ $jobVacancy->id }}"
                        data-name="{{ $jobVacancy->name }}" 
                        data-description="{{ $jobVacancy->description }}"
                        data-qualification="{{ $jobVacancy->qualification }}"
                        data-email="{{ $jobVacancy->email }}"
                        data-image="{{ $jobVacancy->image != null ? asset('storage/'. $jobVacancy->image) : asset('blank-img.jpg') }}" 
                        data-whatsapp="{{ $jobVacancy->whatsapp }}"
                        data-status="{{ $jobVacancy->status }}"
                        >Detail</button>
                    </div>
                </div>
            </div>
        @empty
            <div class="d-flex justify-content-center">
                <img src="{{ asset('nodata.jpg') }}" alt="" width="400px">
            </div>
            <h5 class="text-center">
                Data Masih Kosong
            </h5>
        @endforelse
        </div>
    </div>

    <div class="tab-pane fade py-3" id="nonactive" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
            @forelse ($nonActiveJobs as $jobVacancy)
            <div class="col-xxl-3 col-xl-50 col-sm-6 proorder-xl-2">
                <div class="card since">
                    <div class="card-header bg-transparent">
                        @if ($jobVacancy->image != null && Storage::disk('public')->exists($jobVacancy->image))
                            <img src="{{ asset('storage/' . $jobVacancy->image) }}" alt="{{ $jobVacancy->name }}" style="object-fit: cover; width: 100%; height: 200px" class="rounded-top card-img-thumbnail" />
                        @else
                            <img src="{{ asset('blank-img.jpg') }}" alt="{{ $jobVacancy->name }}" style="object-fit: cover; width: 100%; height: 200px" class="rounded-top card-img-thumbnail" />
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between my-3 mx-2">
                            <div class="badge bg-light-danger text-danger">
                                tidak aktif
                            </div>
                            <div>
                                <a href="{{ route('job-vacancy.edit', $jobVacancy->id) }}" class="col col-auto bg-transparent border-0 text-primary fs-5 btn-edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <button class="col col-auto bg-transparent border-0 text-danger fs-5 btn-delete" type="button" data-id="{{ $jobVacancy->id }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mx-2">
                            <h4 class="">{{ $jobVacancy->name }}</h4>
                            <p class="mt-0 mb-2" style="font-size: 17px">{!! Str::words($jobVacancy->description, 14, '...') !!}</p>
                        </div>
                    </div>
                    <div class="mx-2 mt-4 card-footer gap-2">
                        <button type="button" class="btn btn-primary w-100 btn-detail" 
                        data-id="{{ $jobVacancy->id }}"
                        data-name="{{ $jobVacancy->name }}" 
                        data-description="{{ $jobVacancy->description }}"
                        data-qualification="{{ $jobVacancy->qualification }}"
                        data-email="{{ $jobVacancy->email }}"
                        data-image="{{ $jobVacancy->image != null ? asset('storage/'. $jobVacancy->image) : asset('blank-img.jpg') }}" 
                        data-whatsapp="{{ $jobVacancy->whatsapp }}"
                        data-status="{{ $jobVacancy->status }}"
                        >Detail</button>
                    </div>
                </div>
            </div>
            @empty
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('nodata.jpg') }}" alt="" width="400px">
                </div>
                <h5 class="text-center">
                    Data Masih Kosong
                </h5>
            @endforelse
        </div>
    </div>
</div>

{{-- detail modal start --}}
<div class="modal fade" id="detail-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Lowongan Pekerjaan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="image-detail" class="w-100 mb-4">
                <div class="mb-3 border-bottom pb-2">
                    <h5><b>Posisi: </b><span id="name-detail"></span><span class="badge bg-success ms-3" id="status-detail"></span></h5>
                </div>
                <div class="mb-3 border-bottom">
                    <h5 class="fw-bold">Deskripsi</h5>
                    <div id="description-detail"></div>
                </div>
                <div class="mb-3 border-bottom">
                    <h5 class="fw-bold">Kualifikasi</h5>
                    <div id="qualification-detail"></div>
                </div>
                <div class="mb-3 row text-center">
                    <div class="col">
                        <h5 class="fw-bold">Email</h5>
                        <p id="email-detail"></p>
                    </div>
                    <div class="col border-start">
                        <h5 class="fw-bold">No. whatsApp</h5>
                        <p id="whatsapp-detail"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- detail modal end --}}

@include('admin.components.delete-modal-component')

@endsection

@section('script')
    <script>
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/admin/job-vacancy/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var description = $(this).data('description');
            var qualification = $(this).data('qualification');
            var email = $(this).data('email');
            var whatsapp = $(this).data('whatsapp');
            var status = $(this).data('status');
            $('#name-edit').val(name);
            desc2.root.innerHTML = description;
            qual2.root.innerHTML = qualification;
            $('#email-edit').val(email);
            $('#whatsapp-edit').val(whatsapp);

            if (status === 'active') {
                $('#active-edit').prop('checked', true);
            } else if (status === 'nonactive') {
                $('#nonactive-edit').prop('checked', true);
            }
            $('#form-update').attr('action', '/admin/job-vacancy/' + id);
            $('#update-modal').modal('show');
        });

        $('.btn-detail').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var description = $(this).data('description');
            var qualification = $(this).data('qualification');
            var email = $(this).data('email');
            var whatsapp = $(this).data('whatsapp');
            var status = $(this).data('status');
            var image = $(this).data('image');
            console.log(image);
            $('#name-detail').text(name);
            $('#description-detail').html(description);
            $('#qualification-detail').html(qualification);
            $('#email-detail').text(email);
            $('#whatsapp-detail').text(whatsapp);
            $('#status-detail').text(status);
            $('#image-detail').attr('src', image);
            $('#detail-modal').modal('show');
        });
    </script>

    <script>
        var customToolbar = [
            [{ 'font': [] }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            ['bold', 'italic', 'underline', 'strike', 'blockquote'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }],
            [{ 'direction': 'rtl' }],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'align': [] }],
            ['link'],
            ['clean'],
            ['code-block'],
            [{ 'html': 'HTML' }]
        ];

        const desc = new Quill('#description-editor', {
            theme: 'snow',
            placeholder: "Masukkan deskripsi lowongan",
            modules: {
                toolbar: {
                    container: customToolbar,
                }
            },
        });
        desc.on('text-change', (eventName, ...args) => {
            $('#description').val(desc.root.innerHTML);
        });

        const desc2 = new Quill('#description-editor-edit', {
            theme: 'snow',
            placeholder: "Masukkan deskripsi lowongan",
            modules: {
                toolbar: {
                    container: customToolbar,
                }
            },
        });
        desc2.on('text-change', (eventName, ...args) => {
            $('#description-edit').val(desc2.root.innerHTML);
        });

        const qual = new Quill('#qualification-editor', {
            theme: 'snow',
            placeholder: "Masukkan deskripsi lowongan",
            modules: {
                toolbar: {
                    container: customToolbar,
                }
            },
        });
        qual.on('text-change', (eventName, ...args) => {
            $('#qualification').val(qual.root.innerHTML);
        });
        const qual2 = new Quill('#qualification-editor-edit', {
            theme: 'snow',
            placeholder: "Masukkan deskripsi lowongan",
            modules: {
                toolbar: {
                    container: customToolbar,
                }
            },
        });
        qual2.on('text-change', (eventName, ...args) => {
            $('#qualification-edit').val(qual2.root.innerHTML);
        });
    </script>
@endsection
