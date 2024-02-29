@extends('admin.layouts.app')

@section('content')
    <div class=" p-1">
        <div class="card border-0 shadow p-3 mt-3">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h5 class="m-2 fw-bold">Visi dan Misi</h5>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-lg-end justify-content-start">
                        <div class="d-flex align-items-center gap-2">
                            <p class="m-0 me-2">Cari:</p>
                            <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                        </div>
                        <button class="btn btn-primary m-0" type="button" data-bs-toggle="modal"
                            data-bs-target="#tambah">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-1">
        <h3 class="mb-3">Visi</h3>
        @if ($visionAndMisions)
        <div class="card pb-0 border-l-primary border-4 border-0 shadow">
            <div class="card-header">
                <div class="card-header-right">
                    <ul class="">
                        <li><i class="fa fa-pen text-primary btn-edit-visi" type="button"
                                data-id="{{ $visionAndMisions ? $visionAndMisions->id : '' }}" data-visi="{{ $visionAndMisions ? $visionAndMisions->vision : '' }}"></i></li>
                        <li><i class="fa fa-trash text-primary btn-delete" data-id="{{ $visionAndMisions ? $visionAndMisions->id : ''  }}"></i></li>
                    </ul>
                </div>
                <p class="" style="width:95%;">{{ $visionAndMisions ? $visionAndMisions->vision : '' }}
                </p>
            </div>
        </div>
        @else
        <div class="d-flex justify-content-center">
            <img src="{{ asset('nodata.jpg') }}" alt="" width="400px">
        </div>
        <h5 class="text-center">
            Data Masih Kosong
        </h5>
        @endif
        <h3 class="mb-3">Misi</h3>
        @forelse ($mision as $item)
            <div class="card pb-0 border-l-primary border-4 border-0 shadow">
                <div class="card-header">
                    <div class="card-header-right">
                        <ul class="">
                            <li><i class="fa fa-pen text-primary btn-edit-misi" type="button" data-id="{{ $item->id }}"
                                    data-misi="{{ $item->mission }}"></i></li>
                            <li><i class="fa fa-trash text-primary btn-delete-misi" data-id="{{ $item->id }}"></i></li>
                        </ul>
                    </div>
                    <p class="" style="width:95%;">
                        {{ $item->mission }}
                    </p>
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


    <!-- Add Modal -->
    <div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Tambah Visi Misi</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" action="{{ route('create.vision.mision') }}" method="POST"
                    id="bookmark-form" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Visi</label>
                                <input class="form-control" type="text" value="{{ $visionAndMisions ? $visionAndMisions->vision : '' }}" autocomplete="name"
                                    placeholder="Masukkan Visi" name="vision">
                                    @error('vision')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Misi</label>
                                <input class="form-control" type="text" name="mission[]" required=""
                                    autocomplete="name" placeholder="Masukkan Misi" />
                                    @error('mission.*')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                <div id="product-listing"></div>

                                <button type="button" class="btn add-button-trigger btn-primary mt-3">Tambah
                                    Misi</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal Edit Visi-->
    <div class="modal fade modal-bookmark" id="edit-visi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Edit Visi </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" id="form-update" action="" method="POST"
                    id="bookmark-form" novalidate="" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Visi</label>
                                <input class="form-control" id="visi-edit" type="text" required="" value=""
                                    autocomplete="name" placeholder="Masukkan Visi" name="vision">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal Edit Misi-->

    <div class="modal fade modal-bookmark" id="edit-misi" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Edit Misi</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" id="form-update-misi" method="POST" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Misi</label>
                                <input class="form-control" type="text" name="mission" id="misi-edit" required=""
                                    autocomplete="name" placeholder="Masukkan Misi" />
                                <div id="product-listing"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.components.delete-modal-component')
@endsection

@section('script')
    <script>
        const deleteElement = (id) => $('#' + id).remove();

        (() => {
            $('.add-button-trigger').click((e) => {
                let idInput = 'input_' + Math.random().toString(36).substr(2, 9); // Generate random id
                let target = $(e.target).parent().find('#product-listing');
                target.append(`<div class="d-flex align-items-center mt-3 gap-2" id="${idInput}">
            <input class="form-control mb-0" type="text" name="mission[]"
                required="" autocomplete="name"
                placeholder="Masukkan Misi" />
            <button onclick="deleteElement('${idInput}')" type="button" class="btn delete-trigger px-3 mt-0 btn-danger"><i
                    class="fas fa-trash"></i></button>
        </div>`);
            });

            $('.btn-close').click((e) => {
                let target = $(e.target).parent('.modal').find('.delete-trigger');
                target.each((i, el) => $(el).click());
            });
        })();

        $('.btn-edit-visi').click(function() {
            var id = $(this).data('id');
            var visi = $(this).data('visi');
            $('#form-update').attr('action', '/update/vision/mision/' + id);
            $('#visi-edit').val(visi);
            $('#edit-visi').modal('show');
        });

        $('.btn-edit-misi').click(function() {
            var id = $(this).data('id');
            var misi = $(this).data('misi');
            $('#form-update-misi').attr('action', '/update/mision/mision/' + id);
            $('#misi-edit').val(misi);
            $('#edit-misi').modal('show');
        });
        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/delete/vision/mision/' + id);
            $('#modal-delete').modal('show');
        });
        $('.btn-delete-misi').click(function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/delete/mision/mision/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
