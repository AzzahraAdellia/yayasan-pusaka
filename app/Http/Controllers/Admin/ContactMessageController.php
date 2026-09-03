<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    /**
     * Daftar pesan masuk.
     */
    public function index()
    {
        $messages = ContactMessage::latest()
            ->paginate(15);

        return view(
            'admin.contact-messages.index',
            compact('messages')
        );
    }


    /**
     * Detail pesan.
     */
    public function show(ContactMessage $contactMessage)
    {
        // Otomatis tandai sudah dibaca
        if (! $contactMessage->is_read) {

            $contactMessage->update([
                'is_read' => true,
                'read_at' => now(),
            ]);
        }

        return view(
            'admin.contact-messages.show',
            compact('contactMessage')
        );
    }


    /**
     * Tandai belum dibaca.
     */
    public function markUnread(ContactMessage $contactMessage)
    {
        $contactMessage->update([
            'is_read' => false,
            'read_at' => null,
        ]);

        return redirect()
            ->route('admin.messages.index')
            ->with(
                'success',
                'Pesan berhasil ditandai sebagai belum dibaca.'
            );
    }


    /**
     * Hapus pesan.
     */
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()
            ->route('admin.messages.index')
            ->with(
                'success',
                'Pesan berhasil dihapus.'
            );
    }
}