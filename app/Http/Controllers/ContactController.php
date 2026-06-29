<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Subscribe email to newsletter.
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ], [
            'email.unique' => 'This email is already subscribed to our newsletter.',
        ]);

        NewsletterSubscriber::create([
            'email' => $request->email,
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for joining the inner circle! We will be in touch.'
            ]);
        }

        return back()->with('newsletter_success', 'Thank you for joining the inner circle!');
    }

    /**
     * Process contact form inquiries.
     */
    public function inquire(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent. We will get back to you shortly.'
            ]);
        }

        return back()->with('contact_success', 'Thank you! Your message has been received.');
    }
}
