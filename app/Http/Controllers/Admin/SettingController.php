<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Halaman pengaturan.
     */
    public function index()
    {
        $settings = Setting::pluck('value', 'key');

        return view(
            'admin.settings.index',
            compact('settings')
        );
    }


    /**
     * Simpan pengaturan.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'address' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:100',
            ],

            'operational_hours' => [
                'nullable',
                'string',
                'max:255',
            ],

            'instagram_url' => [
                'nullable',
                'url',
                'max:500',
            ],

            'gallery_url' => [
                'nullable',
                'url',
                'max:500',
            ],

            'maps_url' => [
                'nullable',
                'url',
                'max:1000',
            ],

            'maps_embed' => [
                'nullable',
                'string',
            ],
        ]);


        $groups = [
            'address' => 'contact',
            'email' => 'contact',
            'phone' => 'contact',
            'operational_hours' => 'contact',
            'instagram_url' => 'social',
            'gallery_url' => 'external',
            'maps_url' => 'contact',
            'maps_embed' => 'contact',
        ];


        foreach ($validated as $key => $value) {

            Setting::updateOrCreate(
                [
                    'key' => $key,
                ],
                [
                    'value' => $value,
                    'group' => $groups[$key] ?? 'general',
                ]
            );
        }


        return redirect()
            ->route('admin.settings.index')
            ->with(
                'success',
                'Pengaturan website berhasil diperbarui.'
            );
    }
}