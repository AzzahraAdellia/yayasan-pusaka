@php
    $isEdit = isset($news);
@endphp

<div class="admin-form-grid">

    <div class="admin-form-main">

        <div class="admin-panel">

            <div class="admin-panel-header">

                <div>
                    <span>ISI BERITA</span>
                    <h3>
                        {{ $isEdit ? 'Edit Berita' : 'Berita Baru' }}
                    </h3>
                </div>

            </div>


            <div class="admin-form-body">

                {{-- TITLE --}}
                <div class="admin-form-group">

                    <label for="title">
                        Judul Berita
                        <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="admin-form-control"
                        value="{{ old('title', $news->title ?? '') }}"
                        placeholder="Masukkan judul berita"
                        required
                    >

                    @error('title')
                        <small class="admin-form-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- CATEGORY --}}
                <div class="admin-form-group">

                    <label for="category">
                        Kategori
                    </label>

                    <select
                        id="category"
                        name="category"
                        class="admin-form-control"
                    >

                        <option value="">
                            Pilih kategori
                        </option>

                        <option value="Program"
                            @selected(old('category', $news->category ?? '') === 'Program')>
                            Program
                        </option>

                        <option value="Kolaborasi"
                            @selected(old('category', $news->category ?? '') === 'Kolaborasi')>
                            Kolaborasi
                        </option>

                        <option value="Sosial"
                            @selected(old('category', $news->category ?? '') === 'Sosial')>
                            Sosial
                        </option>

                        <option value="Pendidikan"
                            @selected(old('category', $news->category ?? '') === 'Pendidikan')>
                            Pendidikan
                        </option>

                        <option value="Pemberdayaan"
                            @selected(old('category', $news->category ?? '') === 'Pemberdayaan')>
                            Pemberdayaan
                        </option>

                        <option value="Pelatihan"
                            @selected(old('category', $news->category ?? '') === 'Pelatihan')>
                            Pelatihan
                        </option>

                    </select>

                    @error('category')
                        <small class="admin-form-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- EXCERPT --}}
                <div class="admin-form-group">

                    <label for="excerpt">
                        Ringkasan
                    </label>

                    <textarea
                        id="excerpt"
                        name="excerpt"
                        class="admin-form-control admin-form-textarea small"
                        placeholder="Ringkasan singkat berita..."
                    >{{ old('excerpt', $news->excerpt ?? '') }}</textarea>

                    <small class="admin-form-help">
                        Maksimal 500 karakter.
                    </small>

                    @error('excerpt')
                        <small class="admin-form-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- CONTENT --}}
                <div class="admin-form-group">

                    <label for="content">
                        Isi Berita
                        <span>*</span>
                    </label>

                    <textarea
                        id="content"
                        name="content"
                        class="admin-form-control admin-form-textarea large"
                        placeholder="Tuliskan isi berita..."
                        required
                    >{{ old('content', $news->content ?? '') }}</textarea>

                    @error('content')
                        <small class="admin-form-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

            </div>

        </div>

    </div>


    <div class="admin-form-side">

        {{-- STATUS --}}
        <div class="admin-panel">

            <div class="admin-panel-header">

                <div>
                    <span>PUBLIKASI</span>
                    <h3>Status Berita</h3>
                </div>

            </div>


            <div class="admin-form-body">

                <div class="admin-form-group">

                    <label for="status">
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="admin-form-control"
                        required
                    >

                        <option value="draft"
                            @selected(old('status', $news->status ?? 'draft') === 'draft')>
                            Draft
                        </option>

                        <option value="published"
                            @selected(old('status', $news->status ?? '') === 'published')>
                            Terbitkan
                        </option>

                    </select>

                    @error('status')
                        <small class="admin-form-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <div class="admin-form-info">

                    <i class="bi bi-info-circle-fill"></i>

                    <span>
                        Draft belum akan tampil di website publik.
                        Berita berstatus Terbitkan akan tersedia untuk publik.
                    </span>

                </div>

            </div>

        </div>


        {{-- THUMBNAIL --}}
        <div class="admin-panel mt-4">

            <div class="admin-panel-header">

                <div>
                    <span>GAMBAR</span>
                    <h3>Thumbnail</h3>
                </div>

            </div>


            <div class="admin-form-body">

                @if ($isEdit && $news->thumbnail)

                    <div class="admin-current-thumbnail">

                        <img
                            src="{{ asset('storage/' . $news->thumbnail) }}"
                            alt="{{ $news->title }}"
                        >

                    </div>

                @endif


                <div class="admin-upload-box">

                    <input
                        type="file"
                        id="thumbnail"
                        name="thumbnail"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <label for="thumbnail">

                        <i class="bi bi-cloud-arrow-up"></i>

                        <strong>
                            Pilih Gambar
                        </strong>

                        <span>
                            JPG, PNG atau WEBP
                        </span>

                        <small>
                            Maksimal 2 MB
                        </small>

                    </label>

                </div>

                @error('thumbnail')
                    <small class="admin-form-error">
                        {{ $message }}
                    </small>
                @enderror

            </div>

        </div>


        {{-- BUTTON --}}
        <div class="admin-form-actions">

            <a
                href="{{ route('admin.news.index') }}"
                class="admin-secondary-button"
            >
                Batal
            </a>

            <button
                type="submit"
                class="admin-primary-button"
            >

                <i class="bi bi-save"></i>

                {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Berita' }}

            </button>

        </div>

    </div>

</div>