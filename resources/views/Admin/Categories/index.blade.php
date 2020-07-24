@extends('admin.layouts.master')
@section('title')
    <title>Manajemen Kategori</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
​
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>Manajemen Kategori</h1>
                    </div>
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manajemen Kategori</li>
                    </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            @if (session('success'))
                @component('components.alert')
                    @slot('type')
                        success
                    @endslot
                    @slot('message')
                        {!! session('success') !!}
                    @endslot
                @endcomponent
            @endif
            @if (session('error'))
                @component('components.alert')
                    @slot('type')
                        danger
                    @endslot
                    @slot('message')
                        {!! session('error') !!}
                    @endslot
                @endcomponent
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Tambah Kategori </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" id="quickFormx" method="POST" action="{{route('admin.categories.store')}}">
                                @csrf
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="Kategori">Kategori</label>
                                  <input type="text" name="kategori" class="form-control" id="kategori" placeholder="Nama Kategori" required>
                                </div>
                                <div class="form-group">
                                  <label for="deskripsi">Deskripsi</label>
                                  <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Deskripsi Kategori"></textarea>
                                </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                            </form>
                          </div>
                    </div>
                    <div class="col-7">
                        @component('components.table.categories', ['data' => $categories, 'th' => ['Kategori', 'Total Produk', 'Aksi']])
                            @slot('card_title')
                                Kategori
                            @endslot
                            @slot('edit')
                            admin.categories.edit
                            @endslot
                            @slot('delete')
                            admin.categories.destroy
                            @endslot
                        @endcomponent
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<!-- Validation -->
<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $.validator.setDefaults({
            submitHandler: function () {
                $.post("{{route('admin.categories.store')}}", $('#quickForm').serialize(),
                    function (data, textStatus, jqXHR) {
                        console.log(data)
                    },
                    "json"
                );
                alert( "Form successful submitted!" );
            }
        });
        $('#quickForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                description: {
                    required: true,
                    minlength: 5
                },
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                description: {
                    required: "Please provide a Description",
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
    $(function () {
      $("#example1").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "pageLength": 7
      });
    });
  </script>
@endsection