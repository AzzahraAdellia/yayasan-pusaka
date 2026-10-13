
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Kunjungan Website Yayasan Pusaka</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 35px 38px 45px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 9px;
            line-height: 1.5;
            color: #263445;
        }

        .header {
            border-bottom: 3px solid #F28C28;
            padding-bottom: 14px;
            margin-bottom: 20px;
        }

        .organization {
            color: #123A63;
            font-size: 19px;
            font-weight: bold;
        }

        .subtitle {
            color: #64748b;
            font-size: 9px;
        }

        .report-title {
            color: #123A63;
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            margin: 22px 0 5px;
        }

        .report-period {
            text-align: center;
            color: #64748b;
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 11px;
            font-weight: bold;
            color: #123A63;
            border-bottom: 1px solid #dbe5ef;
            padding-bottom: 7px;
            margin: 22px 0 12px;
        }

        .summary-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 7px 0;
            margin-bottom: 16px;
        }

        .summary-card {
            background: #eef4fa;
            border: 1px solid #dbe5ef;
            text-align: center;
            padding: 12px 6px;
        }

        .summary-label {
            color: #64748b;
            font-size: 8px;
        }

        .summary-value {
            color: #123A63;
            font-size: 20px;
            font-weight: bold;
            margin-top: 5px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .data-table th {
            background: #123A63;
            color: #ffffff;
            padding: 9px;
            text-align: left;
        }

        .data-table td {
            padding: 8px 9px;
            border-bottom: 1px solid #e2e8f0;
            word-break: break-word;
        }

        .data-table tbody tr:nth-child(even) {
            background: #f4f7fb;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .muted {
            color: #64748b;
        }

        .note {
            margin-top: 20px;
            padding: 12px;
            background: #f8fafc;
            border-left: 3px solid #F28C28;
            color: #475569;
        }

        .page-break {
            page-break-before: always;
        }

        .footer {
            border-top: 1px solid #cbd5e1;
            padding-top: 10px;
            margin-top: 25px;
            font-size: 8px;
            color: #64748b;
            text-align: center;
        }

        thead {
            display: table-header-group;
        }

        tr {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <div class="header">
        <div class="organization">
            YAYASAN PUSAKA
        </div>
        <div class="subtitle">
            Laporan Monitoring dan Evaluasi Kinerja Website
        </div>
    </div>

    {{-- JUDUL --}}
    <div class="report-title">
        LAPORAN ANALITIK KUNJUNGAN WEBSITE
    </div>

    <div class="report-period">
        Periode: {{ $periodLabel }}
        <br>
        Tanggal Cetak: {{ now()->format('d/m/Y H:i') }}
    </div>

    {{-- RINGKASAN --}}
    <div class="section-title">
        01. RINGKASAN KUNJUNGAN
    </div>

    <table class="summary-table">
        <tr>
            <td width="33%">
                <div class="summary-card">
                    <div class="summary-label">PENGUNJUNG UNIK</div>
                    <div class="summary-value">
                        {{ number_format($uniqueVisitors, 0, ',', '.') }}
                    </div>
                </div>
            </td>

            <td width="33%">
                <div class="summary-card">
                    <div class="summary-label">TAYANGAN HALAMAN</div>
                    <div class="summary-value">
                        {{ number_format($totalPageViews, 0, ',', '.') }}
                    </div>
                </div>
            </td>

            <td width="33%">
                <div class="summary-card">
                    <div class="summary-label">NEGARA TERDETEKSI</div>
                    <div class="summary-value">
                        {{ number_format($countriesDetected, 0, ',', '.') }}
                    </div>
                </div>
            </td>
        </tr>
    </table>

    {{-- PERANGKAT --}}
    <div class="section-title">
        02. DISTRIBUSI PERANGKAT
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Jenis Perangkat</th>
                <th class="text-right">Tayangan</th>
                <th class="text-right">Persentase</th>
            </tr>
        </thead>
        <tbody>
            @forelse($devices as $device)
                <tr>
                    <td>{{ ucfirst($device->device_type ?? 'Tidak diketahui') }}</td>
                    <td class="text-right">
                        {{ number_format($device->total, 0, ',', '.') }}
                    </td>
                    <td class="text-right">
                        {{ number_format(
                            $totalPageViews > 0
                                ? ($device->total / $totalPageViews) * 100
                                : 0,
                            1, ',', '.'
                        ) }}%
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center muted">
                        Belum ada data perangkat.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- NEGARA --}}
    <div class="section-title">
        03. ASAL NEGARA PENGUNJUNG
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Negara</th>
                <th>Kode</th>
                <th class="text-right">Tayangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($countries as $country)
                <tr>
                    <td>{{ $country->country_name ?: 'Tidak diketahui' }}</td>
                    <td>{{ $country->country_code }}</td>
                    <td class="text-right">
                        {{ number_format($country->total, 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center muted">
                        Data negara belum tersedia.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- HALAMAN POPULER --}}
    <div class="section-title">
        04. HALAMAN PALING BANYAK DIKUNJUNGI
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th width="10%">No.</th>
                <th>Halaman</th>
                <th class="text-right">Tayangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($popularPages as $index => $page)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $page->path }}</td>
                    <td class="text-right">
                        {{ number_format($page->total, 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center muted">
                        Belum ada data halaman.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- REKAP HARIAN --}}
    <div class="page-break"></div>

    <div class="section-title">
        05. REKAPITULASI KUNJUNGAN HARIAN
    </div>

    <p class="muted">
        Rincian tayangan halaman website berdasarkan tanggal
        pada periode {{ $periodLabel }}.
    </p>

    <table class="data-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th class="text-right">Tayangan Halaman</th>
            </tr>
        </thead>
        <tbody>
            @forelse($visitChart as $index => $visit)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $visit['date'] }}</td>
                    <td class="text-right">
                        {{ number_format($visit['total'], 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center muted">
                        Belum ada data kunjungan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- CATATAN --}}
    <div class="note">
        <strong>Catatan:</strong>
        Laporan ini disusun secara otomatis berdasarkan data
        kunjungan website Yayasan Pusaka yang tercatat dalam sistem.

        Jumlah pengunjung unik dihitung berdasarkan identitas
        pengunjung yang tercatat dan merupakan estimasi.

        Data asal negara bergantung pada keberhasilan sistem
        mendeteksi lokasi kunjungan.
    </div>

    {{-- FOOTER --}}
    <div class="footer">
        Yayasan Pusaka &bull; Laporan Analitik Website
        &bull; Dokumen Internal
    </div>

</body>
</html>
