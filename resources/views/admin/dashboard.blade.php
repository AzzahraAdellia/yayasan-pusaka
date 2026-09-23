
@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="yp-dashboard">

    <div class="yp-dashboard-heading">
        <div>
            <h1>Dashboard</h1>
            <p>Ringkasan pengelolaan konten dan kunjungan website Yayasan Pusaka.</p>
        </div>
    </div>

    {{-- STATISTIK CMS DAN ANALITIK --}}
    <div class="yp-dashboard-summary">

        {{-- STATISTIK CMS --}}
        <section class="yp-dashboard-panel">
            <div class="yp-panel-heading">
                <div>
                    <span class="yp-panel-eyebrow">PENGELOLAAN WEBSITE</span>
                    <h2>Statistik CMS</h2>
                </div>
            </div>

            <div class="yp-summary-cards">
                <div class="yp-summary-card">
                    <span>Total Berita</span>
                    <strong>{{ number_format($newsCount) }}</strong>
                </div>

                <div class="yp-summary-card">
                    <span>Berita Terbit</span>
                    <strong>{{ number_format($publishedNewsCount) }}</strong>
                </div>

                <div class="yp-summary-card">
                    <span>Draft Berita</span>
                    <strong>{{ number_format($draftNewsCount) }}</strong>
                </div>

                <div class="yp-summary-card">
                    @if(auth()->user()?->role === 'admin')
                        <span>Total User</span>
                        <strong>{{ number_format($userCount) }}</strong>
                    @else
                        <span>Total Staff</span>
                        <strong>{{ number_format($staffCount) }}</strong>
                    @endif
                </div>
            </div>
        </section>

        {{-- ANALITIK WEBSITE --}}
        <section class="yp-dashboard-panel">
            <div class="yp-panel-heading">
                <div>
                    <span class="yp-panel-eyebrow">KUNJUNGAN WEBSITE</span>
                    <h2>Analitik Website</h2>
                </div>
            </div>

            <form method="GET"
                  action="{{ route('admin.dashboard') }}"
                  class="yp-analytics-filter">

                <label for="analytics-period">Periode</label>

                <div class="yp-filter-controls">
                    <select name="period"
                            id="analytics-period"
                            onchange="this.form.submit()">
                        <option value="7" {{ $period === '7' ? 'selected' : '' }}>
                            7 hari terakhir
                        </option>
                        <option value="30" {{ $period === '30' ? 'selected' : '' }}>
                            30 hari terakhir
                        </option>
                        <option value="90" {{ $period === '90' ? 'selected' : '' }}>
                            90 hari terakhir
                        </option>
                        <option value="all" {{ $period === 'all' ? 'selected' : '' }}>
                            Semua data
                        </option>
                        <option value="custom" {{ $period === 'custom' ? 'selected' : '' }}>
                            Rentang tanggal
                        </option>
                    </select>

                    <button type="submit">Terapkan</button>
                </div>

                @if($period === 'custom')
                    <div class="yp-custom-dates">
                        <div>
                            <label for="start_date">Dari tanggal</label>
                            <input type="date"
                                   id="start_date"
                                   name="start_date"
                                   value="{{ request('start_date', $startDate?->format('Y-m-d')) }}"
                                   required>
                        </div>

                        <div>
                            <label for="end_date">Sampai tanggal</label>
                            <input type="date"
                                   id="end_date"
                                   name="end_date"
                                   value="{{ request('end_date', $endDate?->format('Y-m-d')) }}"
                                   required>
                        </div>

                        <button type="submit">Tampilkan</button>
                    </div>
                @endif
            </form>

            @if($errors->any())
                <p class="yp-filter-error">{{ $errors->first() }}</p>
            @endif

            <div class="yp-summary-cards">
                <div class="yp-summary-card">
                    <span>Pengunjung Unik</span>
                    <strong>{{ number_format($uniqueVisitors) }}</strong>
                </div>

                <div class="yp-summary-card">
                    <span>Tayangan Halaman</span>
                    <strong>{{ number_format($totalPageViews) }}</strong>
                </div>

                <div class="yp-summary-card">
                    <span>Negara Terdeteksi</span>
                    <strong>{{ number_format($countriesDetected) }}</strong>
                </div>

                <div class="yp-summary-card">
                    <span>Jenis Perangkat</span>
                    <strong>{{ number_format($devices->count()) }}</strong>
                </div>
            </div>
        </section>

    </div>

    {{-- GRAFIK KUNJUNGAN --}}
    <section class="yp-dashboard-panel yp-dashboard-chart-panel">
        <div class="yp-panel-heading">
            <div>
                <span class="yp-panel-eyebrow">RIWAYAT KUNJUNGAN</span>
                <h2>Grafik Kunjungan Website</h2>
                <p>
                    {{ $startDate?->format('d M Y') ?? 'Sejak pencatatan dimulai' }}
                    –
                    {{ $endDate->format('d M Y') }}
                </p>
            </div>
        </div>

        <div class="yp-chart-container">
            <canvas id="ypVisitChart"></canvas>
        </div>

        <p class="yp-chart-note">
            Grafik menunjukkan jumlah tayangan halaman per hari.
            Pencatatan dimulai sejak fitur analitik website diaktifkan.
        </p>
    </section>

    {{-- RINCIAN ANALITIK --}}
    <div class="yp-dashboard-details">

        <section class="yp-dashboard-panel">
            <div class="yp-panel-heading">
                <h2>Asal Negara Pengunjung</h2>
            </div>

            <div class="yp-table-scroll">
                <table class="yp-analytics-table">
                    <thead>
                        <tr>
                            <th>Negara</th>
                            <th class="yp-number-column">Tayangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($countries as $country)
                            <tr>
                                <td>
                                    {{ $country->country_name ?: $country->country_code }}
                                </td>
                                <td class="yp-number-column">
                                    {{ number_format($country->total) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="yp-empty-state">
                                    Data negara belum tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <section class="yp-dashboard-panel">
            <div class="yp-panel-heading">
                <h2>Jenis Perangkat</h2>
            </div>

            <div class="yp-table-scroll">
                <table class="yp-analytics-table">
                    <thead>
                        <tr>
                            <th>Perangkat</th>
                            <th class="yp-number-column">Tayangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($devices as $device)
                            <tr>
                                <td>
                                    {{ ucfirst($device->device_type ?: 'Tidak diketahui') }}
                                </td>
                                <td class="yp-number-column">
                                    {{ number_format($device->total) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="yp-empty-state">
                                    Belum ada data perangkat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

    </div>

    <section class="yp-dashboard-panel">
        <div class="yp-panel-heading">
            <h2>Halaman yang Paling Banyak Dikunjungi</h2>
        </div>

        <div class="yp-table-scroll">
            <table class="yp-analytics-table">
                <thead>
                    <tr>
                        <th>Halaman</th>
                        <th class="yp-number-column">Tayangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($popularPages as $page)
                        <tr>
                            <td>{{ $page->path }}</td>
                            <td class="yp-number-column">
                                {{ number_format($page->total) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="yp-empty-state">
                                Belum ada data kunjungan halaman.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const chartElement = document.getElementById('ypVisitChart');

    if (!chartElement || typeof Chart === 'undefined') {
        return;
    }

    const visitData = @json($visitChart);

    new Chart(chartElement, {
        type: 'line',
        data: {
            labels: visitData.map(item => item.date),
            datasets: [{
                label: 'Tayangan Halaman',
                data: visitData.map(item => item.total),
                borderColor: '#0A4D8C',
                backgroundColor: 'rgba(10, 77, 140, 0.10)',
                borderWidth: 2,
                pointRadius: visitData.length > 60 ? 0 : 3,
                pointHoverRadius: 5,
                tension: 0.25,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false
            },
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                },
                x: {
                    ticks: {
                        maxTicksLimit: 10
                    }
                }
            }
        }
    });
});
</script>
@endpush