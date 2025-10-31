<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\VerifikasiEmailUntukRegistrasiPengaduanClient;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class EmailController extends Controller
{
    public function sendVerification()
    {
        $id_client = Auth::guard('client')->user()->id_client;
        $email = Auth::guard('client')->user()->email;
        $nama = Auth::guard('client')->user()->nama;
        $link = URL::temporarySignedRoute('pekat.verify', now()->addMinutes(30), ['id_client' => $id_client]);
        Mail::to($email)->send(new VerifikasiEmailUntukRegistrasiPengaduanClient($nama, $link));

        return redirect()->back();
    }

    public function verify($id_client, Request $request)
    {
        $masyarakat = Client::where('id_client', $id_client)->first();

        if ($masyarakat->email_verified_at == null) {
            if ($request->hasValidSignature()) {

                date_default_timezone_set('Asia/Bangkok');

                $masyarakat->update(['email_verified_at' => date('Y-m-d h:i:s')]);

                return view('User.Mail.success');
            } else {
                return view('User.Mail.failed');
            }
        } else {
            return view('User.Mail.failed');
        }
    }
}
