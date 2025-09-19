<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
  public function store(Request $request)
{
    $validated = $request->validate([
        'name'         => 'required|string|max:255',
        'email'        => 'required|email',
        'message'      => 'required|string',
        'book_through' => 'required|in:whatsapp,email',
    ]);

    $contact = Contact::create($validated);

    if ($validated['book_through'] === 'whatsapp') {
        $whatsappNumber = "237682090879"; 
        $message = urlencode("Hello, my name is {$validated['name']}. {$validated['message']}");
        return redirect()->away("https://wa.me/{$whatsappNumber}?text={$message}");
    }

    if ($validated['book_through'] === 'email') {
        $admin = User::where('role', 'admin')->first();
        // dd($admin);
        if ($admin) {
            Mail::to($admin->email)->send(new ContactMail($contact));
            // Log::info("Contact email sent to admin: {$admin->email}");
            return back()->with('success', 'Your message has been sent via Email!');
        } else {
            return back()->with('error', 'No admin found to receive the email.');
        }
    }
}

}
