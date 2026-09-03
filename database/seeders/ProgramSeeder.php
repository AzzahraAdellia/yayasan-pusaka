<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'name' => 'Pendidikan',
                'slug' => 'pendidikan',
                'title' => 'Program Pendidikan',
                'short_description' => 'Dukungan pendidikan bagi penerima manfaat Yayasan Pusaka.',
                'description' => 'Program pendidikan Yayasan Pusaka bertujuan mendukung akses dan keberlanjutan pendidikan bagi para penerima manfaat.',
                'icon' => 'bi-mortarboard-fill',
                'sort_order' => 1,
                'is_active' => true,
            ],

            [
                'name' => 'Sosial & Kemanusiaan',
                'slug' => 'sosial-kemanusiaan',
                'title' => 'Program Sosial & Kemanusiaan',
                'short_description' => 'Program sosial dan kemanusiaan bagi penerima manfaat.',
                'description' => 'Program sosial dan kemanusiaan dilaksanakan sebagai bentuk kepedulian Yayasan Pusaka kepada penerima manfaat yang membutuhkan dukungan.',
                'icon' => 'bi-heart-fill',
                'sort_order' => 2,
                'is_active' => true,
            ],

            [
                'name' => 'Pemberdayaan',
                'slug' => 'pemberdayaan',
                'title' => 'Program Pemberdayaan',
                'short_description' => 'Mendorong pengembangan potensi dan kemandirian penerima manfaat.',
                'description' => 'Program pemberdayaan diarahkan untuk meningkatkan keterampilan, potensi, dan kemandirian para penerima manfaat Yayasan Pusaka.',
                'icon' => 'bi-people-fill',
                'sort_order' => 3,
                'is_active' => true,
            ],

            [
                'name' => 'Pelatihan & Pengembangan',
                'slug' => 'pelatihan-pengembangan',
                'title' => 'Pelatihan & Pengembangan',
                'short_description' => 'Pengembangan keterampilan dan kompetensi melalui berbagai kegiatan pelatihan.',
                'description' => 'Program pelatihan dan pengembangan memberikan kesempatan kepada penerima manfaat untuk meningkatkan keterampilan dan kompetensi melalui berbagai kegiatan.',
                'icon' => 'bi-lightbulb-fill',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::updateOrCreate(
                [
                    'slug' => $program['slug'],
                ],
                $program
            );
        }
    }
}