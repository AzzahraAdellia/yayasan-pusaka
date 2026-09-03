@extends('admin.layouts.app')

@section('title', 'Berita')
@section('page-title', 'Berita')

@section('content')

<div class="admin-page-header">

    <div>
        <span class="admin-page-label">
            KONTEN
        </span>

        <h2>
            Kelola <span>Berita</span>
        </h2>

        <p>
            Tambahkan, edit, terbitkan, dan kelola berita Yayasan Pusaka.
        </p>
    </div>

    <a href="{{ route('admin.news.create') }}"
       class="admin-primary-button">

        <i class="bi bi-plus-lg"></i>
        Tambah Berita

    </a>

</div>


@if (session('success'))

    <div class="admin-alert-success">

        <i class="bi bi-check-circle-fill"></i>

        <span>
            {{ session('success') }}
        </span>

    </div>

@endif


<div class="admin-panel">

    <div class="admin-panel-header">

        <div>
            <span>DAFTAR BERITA</span>
            <h3>Semua Berita</h3>
        </div>

        <div class="admin-table-count">
            {{ $news->total() }} berita
        </div>

    </div>


    @if ($news->count())

        <div class="admin-table-responsive">

            <table class="admin-table">

                <thead>
                    <tr>
                        <th>Berita</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($news as $item)

                        <tr>

                            <td>

                                <div class="admin-news-cell">

                                    <div class="admin-news-thumbnail">

                                        @if ($item->thumbnail)

                                            <img
                                                src="{{ asset('storage/' . $item->thumbnail) }}"
                                                alt="{{ $item->title }}"
                                            >

                                        @else

                                            <i class="bi bi-image"></i>

                                        @endif

                                    </div>

                                    <div>

                                        <strong>
                                            {{ $item->title }}
                                        </strong>

                                        <span>
                                            {{ \Illuminate\Support\Str::limit($item->excerpt, 60) }}
                                        </span>

                                    </div>

                                </div>

                            </td>


                            <td>

                                <span class="admin-category-badge">
                                    {{ $item->category ?: 'Umum' }}
                                </span>

                            </td>


                            <td>

                                @if ($item->status === 'published')

                                    <span class="admin-status published">

                                        <i class="bi bi-check-circle-fill"></i>
                                        Terbit

                                    </span>

                                @else

                                    <span class="admin-status draft">

                                        <i class="bi bi-clock-fill"></i>
                                        Draft

                                    </span>

                                @endif

                            </td>


                            <td>

                                <span class="admin-table-date">
                                    {{ $item->created_at->format('d/m/Y') }}
                                </span>

                            </td>


                            <td>

                                <div class="admin-table-actions">

                                    <a
                                        href="{{ route('admin.news.edit', $item) }}"
                                        class="admin-action-button edit"
                                        title="Edit"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </a>


                                    <form
                                        action="{{ route('admin.news.destroy', $item) }}"
                                        method="POST"
                                        onsubmit="return confirm('Hapus berita ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="admin-action-button delete"
                                            title="Hapus"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="admin-pagination">
            {{ $news->links() }}
        </div>

    @else

        <div class="admin-empty-state">

            <div class="admin-empty-icon">
                <i class="bi bi-newspaper"></i>
            </div>

            <h4>
                Belum Ada Berita
            </h4>

            <p>
                Berita yang ditambahkan melalui CMS akan muncul di sini.
            </p>

            <a
                href="{{ route('admin.news.create') }}"
                class="admin-primary-button"
            >
                <i class="bi bi-plus-lg"></i>
                Tambah Berita Pertama
            </a>

        </div>

    @endif

</div>

@endsection