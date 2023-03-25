<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//harus ada
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\User;

class ApiSendEmailController extends Controller
{
    public function sendEmail(Request $request, $id)
    {
        $user = User::find($id);
        // dd($request->message);

        Mail::to($user)->send(
            new SendMail($user, $request->message)
        );

        return response()->json([
            'message' => 'Email sent successfully'
        ]);
    }
}
