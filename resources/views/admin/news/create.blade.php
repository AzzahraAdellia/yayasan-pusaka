@extends('admin.layouts.app')

@section('title', 'Tambah Berita')

@section('page-title', 'Tambah Berita')

@section('content')

<div class="admin-page-header">

    <div>

        <span class="admin-page-label">
            BERITA
        </span>

        <h2>
            Tambah <span>Berita Baru</span>
        </h2>

        <p>
            Buat berita baru untuk dipublikasikan
            pada website Yayasan Pusaka.
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
    action="{{ route('admin.news.store') }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf

    @include('admin.news._form')

</form>

@endsection