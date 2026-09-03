@extends('admin.layouts.app')

@section('title', 'Detail Pesan')
@section('page-title', 'Detail Pesan')

@section('content')

<div class="admin-page-header">

    <div>

        <span class="admin-page-label">
            PESAN MASUK
        </span>

        <h2>
            Detail <span>Pesan</span>
        </h2>

        <p>
            Pesan yang dikirim melalui formulir kontak
            website Yayasan Pusaka.
        </p>

    </div>


    <a
        href="{{ route('admin.messages.index') }}"
        class="admin-secondary-button"
    >

        <i class="bi bi-arrow-left"></i>

        Kembali

    </a>

</div>


<div class="admin-form-layout">

    {{-- ==========================================
        ISI PESAN
    =========================================== --}}
    <div class="admin-form-main">

        <div class="admin-panel">

            <div class="admin-panel-header">

                <div>

                    <span>
                        PESAN
                    </span>

                    <h3>
                        Isi Pesan
                    </h3>

                </div>

            </div>


            <div class="admin-form-body">

                <div style="
                    font-size: 15px;
                    line-height: 1.9;
                    white-space: pre-line;
                ">{{ $contactMessage->message }}</div>

            </div>

        </div>

    </div>


    {{-- ==========================================
        INFORMASI PENGIRIM
    =========================================== --}}
    <div class="admin-form-sidebar">

        <div class="admin-panel">

            <div class="admin-panel-header">

                <div>

                    <span>
                        PENGIRIM
                    </span>

                    <h3>
                        Informasi Pengirim
                    </h3>

                </div>

            </div>


            <div class="admin-form-body">

                <div class="admin-form-group">

                    <label>
                        Nama
                    </label>

                    <strong>
                        {{ $contactMessage->name }}
                    </strong>

                </div>


                <div class="admin-form-group">

                    <label>
                        Email
                    </label>

                    <a href="mailto:{{ $contactMessage->email }}">
                        {{ $contactMessage->email }}
                    </a>

                </div>


                @if ($contactMessage->phone)

                    <div class="admin-form-group">

                        <label>
                            Nomor Telepon
                        </label>

                        <span>
                            {{ $contactMessage->phone }}
                        </span>

                    </div>

                @endif


                <div class="admin-form-group">

                    <label>
                        Keperluan
                    </label>

                    <strong>

                        @switch($contactMessage->subject)

                            @case('program')
                                Informasi Program
                                @break

                            @case('partnership')
                                Kerja Sama
                                @break

                            @case('donation')
                                Donasi
                                @break

                            @default
                                Lainnya

                        @endswitch

                    </strong>

                </div>


                <div class="admin-form-group">

                    <label>
                        Dikirim
                    </label>

                    <span>
                        {{ $contactMessage->created_at
                            ->format('d/m/Y H:i') }}
                    </span>

                </div>

            </div>

        </div>


        {{-- ACTION --}}
        <div class="admin-form-actions">

            <a
                href="mailto:{{ $contactMessage->email }}"
                class="admin-primary-button"
            >

                <i class="bi bi-reply-fill"></i>

                Balas via Email

            </a>


            <form
                action="{{ route(
                    'admin.messages.unread',
                    $contactMessage
                ) }}"
                method="POST"
            >

                @csrf
                @method('PATCH')

                <button
                    type="submit"
                    class="admin-secondary-button"
                    style="width: 100%;"
                >

                    <i class="bi bi-envelope"></i>

                    Tandai Belum Dibaca

                </button>

            </form>


            <form
                action="{{ route(
                    'admin.messages.destroy',
                    $contactMessage
                ) }}"
                method="POST"
                onsubmit="return confirm(
                    'Yakin ingin menghapus pesan ini?'
                )"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="admin-secondary-button"
                    style="width: 100%;"
                >

                    <i class="bi bi-trash3"></i>

                    Hapus Pesan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection