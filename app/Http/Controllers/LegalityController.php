<?php

namespace App\Http\Controllers;

use App\Models\Legality;

class LegalityController extends Controller
{
    public function index()
    {
        $legalities = Legality::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return view(
            'tentang.legalitas',
            compact('legalities')
        );
    }
}