<?php

namespace App\Http\Controllers;

use \Exception;
use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Send the contact message.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contact(Request $request)
    {
        try {
            $this->validateContactForm($request);
            $this->saveContactMessage($request);
            session()->put('messages', ['success' => [trans('global.send_contact_success')] ]);
        } catch (Exception $e) {
            session()->put('messages', ['error' => [trans('global.send_contact_error')] ]);
        }

        return back();
    }

    /**
     * Validate the request.
     *
     * @param Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateContactForm(Request $request)
    {
        $this->validate(
            $request,
            [
                'contact_name' => 'required',
                'contact_phone' => 'required',
            ]
        );
    }

    /**
     * Save the message.
     *
     * @param Request $request
     *
     * @return Contact
     */
    public function saveContactMessage(Request $request)
    {
        return Contact::create($request->all());
    }
}
