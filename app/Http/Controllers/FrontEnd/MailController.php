<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_mail()
    {
        $to_name = "Tu Keu";
        $to_mail = "phiminhtu287@gmail.com";
        $data = array("name"=>"Mail từ tài khoản khách hàng", "body"=>"Mail gửi về hàng hóa");
        Mail::send('frontEnd.home.send_mail', $data, function ($message) use ($to_name,$to_mail){
            $message->to($to_mail)->subject('Test thử mail google');
            $message->from($to_mail,$to_name);
        });
        return redirect('/')->with('message','');

    }
}
