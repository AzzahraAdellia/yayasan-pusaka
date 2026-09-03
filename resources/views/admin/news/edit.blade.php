@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('page-title', 'Edit Berita')

@section('content')

<div class="admin-page-header">

    <div>

        <span class="admin-page-label">
            BERITA
        </span>

        <h2>
            Edit <span>Berita</span>
        </h2>

        <p>
            Perbarui informasi dan isi berita
            Yayasan Pusaka.
        </p>

    </div>

</div>


@if ($errors->any())

    <div class="admin-alert-error">

        <i class="bi bi-exclamation-circle-fill"></i>

        <div>

            <strong>
                Data belum dapat disimpan.
            </strong>

            <span>
                Periksa kembali kolom yang ditandai.
            </span>

        </div>

    </div>

@endif


<form
    action="{{ route('admin.news.update', $news) }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf
    @method('PUT')

    @include('admin.news._form')

</form>

@endsection