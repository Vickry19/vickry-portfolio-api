<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display all contact messages.
     */
    public function index()
    {
        $messages = ContactMessage::latest()
            ->paginate(10);

        return view('admin.contact-messages.index', compact('messages'));
    }

    /**
     * Display a specific contact message.
     */
    public function show(ContactMessage $contactMessage)
    {
        if (!$contactMessage->is_read) {
            $contactMessage->update([
                'is_read' => true,
            ]);
        }

        return view(
            'admin.contact-messages.show',
            compact('contactMessage')
        );
    }

    /**
     * Update contact message.
     */
    public function update(
        Request $request,
        ContactMessage $contactMessage
    ) {
        $validated = $request->validate([
            'is_read' => [
                'required',
                'boolean',
            ],
        ]);

        $contactMessage->update([
            'is_read' => $validated['is_read'],
        ]);

        return redirect()
            ->route('admin.contact-messages.index')
            ->with('success', 'Message status updated successfully.');
    }

    /**
     * Delete contact message.
     */
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()
            ->route('admin.contact-messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}