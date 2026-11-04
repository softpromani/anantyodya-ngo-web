<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Display a listing of contact submissions.
     */
    public function index(Request $request): JsonResponse
    {
        $status = $request->query('status');
        $query = Contact::query()->latest();

        if ($status) {
            $query->where('status', $status);
        }

        $contacts = $query->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $contacts,
        ]);
    }

    /**
     * Store a newly created contact message in storage.
     */
    public function store(Request $request): JsonResponse
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

        Log::info('New contact form submission received', [
            'id' => $contact->id,
            'name' => $contact->name,
            'email' => $contact->email,
            'topic' => $contact->topic,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thank you! Your message has been received. Our team will get back to you shortly.',
            'data' => $contact,
        ], 201);
    }

    /**
     * Display the specified contact submission.
     */
    public function show(int $id): JsonResponse
    {
        $contact = Contact::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $contact,
        ]);
    }

    /**
     * Update the status of a submission (e.g., mark as read/responded).
     */
    public function updateStatus(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'status' => 'required|string|in:new,in_progress,resolved,archived',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update(['status' => $validated['status']]);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully.',
            'data' => $contact,
        ]);
    }
}

