@extends('admin.layouts.app')

@section('header-style')
    <style>
        #datatable .table th {
            background: #36405E;
            color: white;
        }

        #datatable .table tr:nth-of-type(odd) td {
            background: #F0F0F0 !important;
        }

        #datatable .table tr:nth-of-type(even) td {
            background: #FFF !important;
        }

        #datatable .table tr:nth-of-type(even) .sorting_1 {
            background: #FAFAFA !important;
        }

        #datatable .table tr:nth-of-type(odd) .sorting_1 {
            background: #F0F0F0 !important;
        }

        .dark-only #datatable .table tr:nth-of-type(odd) .sorting_1,
        .dark-only #datatable .table tr:nth-of-type(odd) td {
            background: none !important;
            color: white !important;
        }

        .dark-only #datatable tr td {
            border-color: rgba(var(--bs-white-rgb), .25) !important;
        }

        .dark-only #datatable .table tr:nth-of-type(even) td {
            color: white !important;
            background: rgba(var(--bs-white-rgb), .125) !important;
        }

        .dark-only #datatable .table tr:nth-of-type(odd) .sorting_1,
        .dark-only #datatable .table tr:nth-of-type(even) .sorting_1 {
            background: rgba(var(--bs-white-rgb), .15) !important;
        }

        .dark-only #datatable .dataTables_paginate {
            border-color: rgba(var(--bs-white-rgb), .15);
        }

        .dark-only #datatable .paginate_button,
        .dark-only #datatable .dataTables_info {
            color: rgba(var(--bs-white-rgb), 1) !important;
        }
    </style>
@endsection

@section('subcontent')
    <div class=" p-1">
        <div class="card border-0 shadow p-3 mt-3">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h4 class="m-2">Kategori Berita</h4>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-lg-end justify-content-start">
                        <div class="d-flex align-items-center gap-2">
                            <p class="m-0 me-2">Cari:</p>
                            <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                        </div>

                        <button class="btn btn-primary m-0" type="button" data-bs-toggle="modal"
                            data-bs-target="#tambah">Tambah</button>

                        <!-- Add Modal -->
                        <div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-semibold" id="exampleModalLabel">Tambah Kategori Mitra
                                        </h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form class="form-bookmark needs-validation" action="#" method="POST"
                                        id="bookmark-form" novalidate="" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row g-2">
                                                <div class="mb-3 mt-0 col-md-12">
                                                    <label for="bm-title">Kategori Mitra</label>
                                                    <input class="form-control" type="text" required=""
                                                        autocomplete="name" placeholder="Masukkan Nama Kategori">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button class="btn btn-primary" type="submit">Tambah</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="table-responsive custom-scrollbar" id="datatable">
        <table class="table table-striped display">
            <thead>
                <tr>
                    <th class="w-25">No</th>
                    <th class="w-75">Nama</th>
                    <th class="text-end w-25">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#edit" type="button">Edit</button>
                            <button class="btn btn-danger btn-edit" type="button">Tolak</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ipsum</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#edit" type="button">Edit</button>
                            <button class="btn btn-danger btn-edit" type="button">Tolak</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Dolor</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#edit" type="button">Edit</button>
                            <button class="btn btn-danger btn-edit" type="button">Tolak</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Sit</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#edit" type="button">Edit</button>
                            <button class="btn btn-danger btn-edit" type="button">Tolak</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Amet</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#edit" type="button">Edit</button>
                            <button class="btn btn-danger btn-edit" type="button">Tolak</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Constecteur</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#edit" type="button">Edit</button>
                            <button class="btn btn-danger btn-edit" type="button">Tolak</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <!-- Edit Modal -->
    <div class="modal fade modal-bookmark" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori Mitra</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" action="#" method="POST" id="bookmark-form" novalidate=""
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Kategori Mitra</label>
                                <input class="form-control" type="text" required="" autocomplete="name"
                                    placeholder="Masukkan Nama Kategori">
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

    <script>
        $('#datatable table').DataTable({
            searching: false,
            columnDefs: [{
                targets: 2,
                sortable: false
            }]
        });
    </script>
@endsection
