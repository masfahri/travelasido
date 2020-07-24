@extends('admin.layouts.master')
​
@section('title')
    <title>Manajemen Produk</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<style>
    .act-btn{
            background:#007bff;
            display: block;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            color: white;
            font-size: 30px;
            font-weight: bold;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            text-decoration: none;
            transition: ease all 0.3s;
            position: fixed;
            right: 30px;
            bottom:30px;
        }
    .act-btn:hover{background: greenyellow; color: white;}
</style>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>Manajemen Produk</h1>
                    </div>
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manajemen Produk</li>
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
                    <div class="col-12">
                        @component('components.table.products', [
                            'data' => $products, 
                            'th' => ['Nama Produk', 'Kategori', 'Aksi']])
                            @slot('card_title')
                                Produk
                            @endslot
                            @slot('edit')
                                admin.products.edit
                            @endslot
                            @slot('delete')
                                admin.products.destroy
                            @endslot
                        @endcomponent
                    </div>
                </div>
            </div>
            <a href="{{route('admin.products.create')}}" class="act-btn">+</a>
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