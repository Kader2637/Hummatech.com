@extends('admin.layouts.app')

@section('subcontent')
    <div class=" p-1">
        <div class="card border-0 shadow p-3 mt-3">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h4 class="m-2">Penjualan</h4>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-lg-end justify-content-start">
                        <div class="d-flex align-items-center gap-2">
                            <p class="m-0 me-2">Cari:</p>
                            <input class="form-control me-2" type="text" placeholder="Cari sesuatu&hellip;"
                                aria-label="Cari sesuatu&hellip;" />
                        </div>
                        <button class="btn btn-primary m-0" type="button" data-bs-toggle="modal"
                            data-bs-target="#tambah">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        @forelse ($sales as $sale)
            <div class="col-xxl-3 col-md-4 col-sm-6">
                <div class="card border-0 shadow rounded">
                    <img src="{{ asset('storage/'.$sale->image) }}" alt="{{ $sale->name }}" class="rounded-top card-img-thumbnail" />
                    <div class="card-header text-center h4 border-bottom"
                        style="margin-top: -1rem; border-radius: var(--bs-border-radius) var(--bs-border-radius) 0 0 !important;">
                        {{ $sale->name }}</div>
                    <div class="card-body">
                        <p>{{ Str::limit($sale->description, 80) }}</p>

                        <div class="gap-2 d-flex">
                            <div class="d-grid flex-grow-1">
                                <a href="{{ route('sale.show', $sale->id) }}" class="btn btn-primary">Lihat Detail</a>
                            </div>
                            <div class="d-flex flex-shrink-0 gap-2">
                                <button class="btn px-3 btn-warning btn-edit" data-bs-toggle="modal" type="button" data-id="{{ $sale->id }}" data-image="{{ $sale->image }}" data-name="{{ $sale->name }}" data-description="{{ $sale->description }}" data-proposal="{{ $sale->proposal }}"><i class="fas fa-edit"></i></button>
                                <button class="btn px-3 btn-danger btn-delete" type="button" data-id="{{ $sale->id }}"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
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

    <nav class="mt-5" aria-label="Page navigation example">
        <ul class="pagination justify-content-center pagin-border-primary pagination-primary">
            <li class="page-item"><a class="page-link" href="javascript:void(0)">Previous</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">Next</a></li>
        </ul>
    </nav>

    <div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Tambah Penjualan</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" action="{{ route('sale.store') }}" method="POST" id="bookmark-form" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="image">Foto</label>
                                <input class="form-control" name="image" id="image" type="file">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="name">Nama Penjualan</label>
                                <input class="form-control" id="name" type="text" name="name" autocomplete="name" placeholder="Masukan Nama Penjualan">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" rows="3" id="description" name="description" autocomplete="" placeholder="Masukan Deskripsi Penjualan" ></textarea>
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="proposal">Proposal</label>
                                <input type="file" class="form-control" name="proposal" id="proposal" placeholder="Masukan Proposal">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade modal-bookmark" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Penjualan</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" method="POST" id="form-update" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="image">Foto</label><br>
                                <img id="image-show" height="200px" class="mb-2">
                                <input class="form-control" id="image" name="image" type="file">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="name-edit">Nama Penjualan</label>
                                <input class="form-control" type="text" id="name-edit" autocomplete="name" name="name" placeholder="Masukan Nama Penjualan">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="description-edit">Deskripsi</label>
                                <textarea class="form-control" rows="3" name="description" autocomplete="" id="description-edit" placeholder="Masukan Deskripsi Penjualan"></textarea>
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="proposal-edit">Proposal </label>
                                <input type="file" class="form-control" name="proposal" id="proposal-edit" placeholder="Masukan Proposal">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Perbarui</button>
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
    $('.btn-edit').on('click', function() {
        var id = $(this).data('id');
        var image = $(this).data('image');
        var name = $(this).data('name');
        var description = $(this).data('description');
        var proposal = $(this).data('proposal');
        $('#form-update').attr('action', '/sale/' + id);
        $('#name-edit').val(name);
        $('#proposal-edit').val(proposal);
        $('#description-edit').val(description);
        $('#image-show').attr('src', 'storage/' + image);
        $('#edit').modal('show');
    });

    $('.btn-delete').on('click', function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/sale/' + id);
        $('#modal-delete').modal('show');
    });
</script>
@endsection