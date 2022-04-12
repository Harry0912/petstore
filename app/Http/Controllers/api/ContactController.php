<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IndexModel;
use App\Models\ContactModel;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(ContactRequest $request)
    {
        $info = IndexModel::find(1)->first();

        $name = $request->name;
        $tel = $request->tel;
        $email = $request->email;
        $notes = $request->notes;

        $mail_data = [
            'recipient' => $info->email,
            'subject' => 'ＯＯＯ貓狗寵物水族館---您的網站有一封聯絡我們信件',
            'name' => $name,
            'tel' =>$tel,
            'email' => $email,
            'notes' => $notes
        ];

        Mail::send('front/contact/email_template', $mail_data, function($message) use($mail_data) {
            $message->to($mail_data['recipient'])
                    ->from($mail_data['email'], $mail_data['name'])
                    ->subject($mail_data['subject']);
        });

        $data = ContactModel::create([
            'name' => $name,
            'tel' => $tel,
            'email' => $email,
            'notes' => $notes
        ]);

        return response()->json($data, 201);
    }

    public function reply()
    {
        $content = $_POST['content'];
        $recipient = $_POST['email'];
        $info = IndexModel::find(1)->first();

        $mail_data = [
            'recipient' => $recipient,
            'subject' => 'ＯＯＯ貓狗寵物水族館---回覆訊息',
            'name' => $info->name,
            'email' => $info->email
        ];

        Mail::send('front/contact/reply_template', $mail_data, function($message) use($mail_data) {
            $message->to($mail_data['recipient'])
                    ->from($mail_data['email'], $mail_data['name'])
                    ->subject($mail_data['subject']);
        });
    }

    public function destroy($id)
    {
        $data = ContactModel::destroy($id);

        return response()->json(null, 204);
    }
}
