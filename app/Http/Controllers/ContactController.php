<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\EmailService;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function contact(ContactRequest $request, EmailService $emailService): RedirectResponse
    {
        $emailService->send($request->validated());

        return redirect()->back()->with('email.success', true);
    }
}
