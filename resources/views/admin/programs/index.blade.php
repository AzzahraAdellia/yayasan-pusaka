@extends('admin.layouts.app')

@section('title', 'Kelola Program')
@section('page-title', 'Program')

@section('content')

<div class="admin-page-header">

    <div>
        <span class="admin-page-label">
            KONTEN
        </span>

        <h2>
            Kelola <span>Program</span>
        </h2>

        <p>
            Kelola empat program utama Yayasan Pusaka
            yang ditampilkan pada website publik.
        </p>
    </div>

</div>


@if (session('success'))

    <div class="admin-alert success">

        <i class="bi bi-check-circle-fill"></i>

        <span>
            {{ session('success') }}
        </span>

    </div>

@endif


<div class="admin-panel">

    <div class="admin-panel-header">

        <div>

            <span>
                PROGRAM UTAMA
            </span>

            <h3>
                Daftar Program
            </h3>

        </div>

        <div class="admin-panel-count">
            {{ $programs->count() }} program
        </div>

    </div>


    @if ($programs->count())

        <div class="admin-program-grid">

            @foreach ($programs as $program)

                <div class="admin-program-card">

                    <div class="admin-program-card-top">

                        <div class="admin-program-icon">

                            @if ($program->icon)

                                <i class="bi {{ $program->icon }}"></i>

                            @else

                                <i class="bi bi-grid"></i>

                            @endif

                        </div>


                        @if ($program->is_active)

                            <span class="admin-status published">
                                <i class="bi bi-check-circle-fill"></i>
                                Aktif
                            </span>

                        @else

                            <span class="admin-status draft">
                                <i class="bi bi-eye-slash-fill"></i>
                                Nonaktif
                            </span>

                        @endif

                    </div>


                    <span class="admin-program-order">
                        URUTAN {{ $program->sort_order }}
                    </span>


                    <h3>
                        {{ $program->name }}
                    </h3>


                    <p>
                        {{ $program->short_description
                            ?: 'Belum ada deskripsi singkat.'
                        }}
                    </p>


                    <div class="admin-program-footer">

                        <span>
                            {{ $program->slug }}
                        </span>

                        <a
                            href="{{ route('admin.programs.edit', $program) }}"
                            class="admin-primary-button"
                        >
                            <i class="bi bi-pencil-square"></i>
                            Edit Program
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="admin-empty-state">

            <div class="admin-empty-icon">
                <i class="bi bi-grid"></i>
            </div>

            <h4>
                Data Program Belum Ada
            </h4>

            <p>
                Jalankan ProgramSeeder untuk membuat
                empat program utama Yayasan Pusaka.
            </p>

        </div>

    @endif

</div>

@endsection