@extends('admin.layouts.app')

@section('title', 'Pesan Masuk')
@section('page-title', 'Pesan Masuk')

@section('content')

<div class="admin-page-header">

    <div>

        <span class="admin-page-label">
            KOMUNIKASI
        </span>

        <h2>
            Pesan <span>Masuk</span>
        </h2>

        <p>
            Pesan yang dikirim pengunjung melalui formulir
            kontak website Yayasan Pusaka.
        </p>

    </div>

</div>


{{-- SUCCESS MESSAGE --}}
@if (session('success'))

    <div class="admin-alert success">

        <i class="bi bi-check-circle-fill"></i>

        <span>
            {{ session('success') }}
        </span>

    </div>

@endif


{{-- STATISTIC --}}
<div class="admin-stats-grid">

    <div class="admin-stat-card">

        <div class="admin-stat-icon blue">
            <i class="bi bi-envelope"></i>
        </div>

        <div>

            <span>
                TOTAL PESAN
            </span>

            <strong>
                {{ $messages->total() }}
            </strong>

        </div>

    </div>


    <div class="admin-stat-card">

        <div class="admin-stat-icon orange">
            <i class="bi bi-envelope-exclamation"></i>
        </div>

        <div>

            <span>
                BELUM DIBACA
            </span>

            <strong>
                {{ \App\Models\ContactMessage::where(
                    'is_read',
                    false
                )->count() }}
            </strong>

        </div>

    </div>

</div>


{{-- MESSAGE LIST --}}
<div class="admin-panel">

    <div class="admin-panel-header">

        <div>

            <span>
                INBOX
            </span>

            <h3>
                Daftar Pesan
            </h3>

        </div>

    </div>


    @if ($messages->count())

        <div class="admin-table-wrapper">

            <table class="admin-table">

                <thead>

                    <tr>
                        <th>Pengirim</th>
                        <th>Keperluan</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach ($messages as $message)

                        <tr class="{{ ! $message->is_read ? 'unread-row' : '' }}">

                            {{-- PENGIRIM --}}
                            <td>

                                <div class="admin-table-title">

                                    <strong>
                                        {{ $message->name }}
                                    </strong>

                                    <span>
                                        {{ $message->email }}
                                    </span>

                                    @if ($message->phone)

                                        <span>
                                            {{ $message->phone }}
                                        </span>

                                    @endif

                                </div>

                            </td>


                            {{-- KEPERLUAN --}}
                            <td>

                                @switch($message->subject)

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

                            </td>


                            {{-- PESAN --}}
                            <td>

                                {{ \Illuminate\Support\Str::limit(
                                    $message->message,
                                    80
                                ) }}

                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                <div class="admin-table-title">

                                    <strong>
                                        {{ $message->created_at->format('d/m/Y') }}
                                    </strong>

                                    <span>
                                        {{ $message->created_at->format('H:i') }}
                                    </span>

                                </div>

                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if (! $message->is_read)

                                    <span class="admin-status draft">

                                        <i class="bi bi-envelope-fill"></i>

                                        Baru

                                    </span>

                                @else

                                    <span class="admin-status published">

                                        <i class="bi bi-envelope-open"></i>

                                        Dibaca

                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="admin-table-actions">

                                    {{-- BUKA --}}
                                    <a
                                        href="{{ route(
                                            'admin.messages.show',
                                            $message
                                        ) }}"
                                        class="admin-action-button"
                                        title="Baca Pesan"
                                    >

                                        <i class="bi bi-eye"></i>

                                    </a>


                                    {{-- TANDAI BELUM DIBACA --}}
                                    @if ($message->is_read)

                                        <form
                                            action="{{ route(
                                                'admin.messages.unread',
                                                $message
                                            ) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="admin-action-button"
                                                title="Tandai Belum Dibaca"
                                            >

                                                <i class="bi bi-envelope"></i>

                                            </button>

                                        </form>

                                    @endif


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route(
                                            'admin.messages.destroy',
                                            $message
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
                                            class="admin-action-button danger"
                                            title="Hapus Pesan"
                                        >

                                            <i class="bi bi-trash3"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if ($messages->hasPages())

            <div style="padding: 24px;">

                {{ $messages->links() }}

            </div>

        @endif


    @else

        <div class="admin-empty-state">

            <div class="admin-empty-icon">

                <i class="bi bi-inbox"></i>

            </div>

            <h4>
                Belum Ada Pesan
            </h4>

            <p>
                Pesan yang dikirim melalui formulir kontak
                website akan muncul di halaman ini.
            </p>

        </div>

    @endif

</div>

@endsection