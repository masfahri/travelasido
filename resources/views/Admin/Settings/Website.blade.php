@extends('admin.layouts.master')
@section('title')
    <title>Website Setting</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>Website</h1>
                    </div>
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Website</li>
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
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Settings Website Info </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" id="quickFormx" method="POST" action="">
                              @csrf
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="Kategori">Site Name</label>
                                  {!! Form::text('name', $data['name'], ['class' => 'form-control', 'id' => 'name', 'readonly']) !!}
                                </div>
                                <div class="form-group">
                                  <label for="deskripsi">Email</label>
                                  {!! Form::text('email', $data['email'], ['class' => 'form-control', 'id' => 'email', 'readonly']) !!}
                                </div>
                                <div class="form-group">
                                  <label for="deskripsi">Telf</label>
                                  {!! Form::text('telf', $data['telf'], ['class' => 'form-control', 'id' => 'telf', 'readonly']) !!}
                                </div>
                                <div class="form-group">
                                  <label for="deskripsi">Fax</label>
                                  {!! Form::text('fax', $data['fax'], ['class' => 'form-control', 'id' => 'fax', 'readonly']) !!}
                                </div>
                                 @foreach (json_decode($data['meta_social']) as $key => $value)
                                    <div class="form-group">
                                       <label for="{{$key}}">{{$key}}</label>
                                       {!! Form::text('meta_social[]', $value, ['class' => 'form-control', 'id' => 'fax', 'readonly']) !!}
                                    </div>
                                 @endforeach
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                            </form>
                          </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
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
  </script>
@endsection