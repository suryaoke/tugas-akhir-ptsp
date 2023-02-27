@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="intro-y flex items-center mt-8 mb-4">
        <h1 class="text-lg font-medium mr-auto">
            Add Guru
        </h1>
    </div>

    <form method="post" action="{{ route('guru.update') }}" enctype="multipart/form-data" id="myForm">
        @csrf
        
        <input type="hidden" name="id" value="{{ $guru->id }}">
        <input type="text" value="{{ $guru->kode_gr }}" class="intro-x login__input form-control py-3 px-4 block" placeholder="Kode Guru" name="kode_gr"
            id="kode_gr">
        <input type="text" value="{{ $guru->nama_gr }}" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Nama Guru" name="nama_gr"
            id="nama_gr">
        <input type="text" value="{{ $guru->mapel }}" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Mata Pelajaran" name="mapel"
            id="mapel">
        <input type="text" value="{{ $guru->kelas }}" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Kelas" name="kelas"
            id="kelas">





        <button class="btn btn-primary mt-3 py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" type="submit">Update</button>
    </form>

    
    <script type="text/javascript">
        jQuery(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    kode_gr: {
                        required: true,
                    },
                    nama_gr: {
                        required: true,
                    },
                    mapel: {
                        required: true,
                    },
                    kelas: {
                        required: true,
                    },

                },
                messages: {
                    kode_gr: {
                        required: 'Please Enter Your Kode ',
                    },
                    nama_gr: {
                        required: 'Please Enter Your Name',
                    },
                    mapel: {
                        required: 'Please Enter Your Name',
                    },
                    kelas: {
                        required: 'Please Enter Your Name',
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
