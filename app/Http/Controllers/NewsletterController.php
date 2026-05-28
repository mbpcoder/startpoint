<?php

namespace App\Http\Controllers;

use App\Models\NewsletterMember;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $email = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ])['email'];

        NewsletterMember::firstOrCreate(
            ['email' => $email],
            ['code' => md5($email . time()), 'active' => false]
        );

        return redirect()->back()->with('newsletter_success', 'ایمیل شما با موفقیت ثبت شد.');
    }
}
