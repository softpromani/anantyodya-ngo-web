<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    /**
     * Show the contact page.
     */
    public function create(): Response
    {
        return Inertia::render('Contact');
    }

    /**
     * Store a newly created contact message in database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
            'topic' => 'nullable|string|max:100',
            'message' => 'required|string|max:5000',
        ]);

        $contact = Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'topic' => $validated['topic'] ?? 'Volunteering',
            'message' => $validated['message'],
            'status' => 'new',
            'ip_address' => $request->ip(),
        ]);

        Log::info('New contact inquiry stored in database', [
            'id' => $contact->id,
            'name' => $contact->name,
            'email' => $contact->email,
            'topic' => $contact->topic,
        ]);

        return back()->with('success', 'Thank you! Your message has been received. Our team will get back to you shortly.');
    }
}
