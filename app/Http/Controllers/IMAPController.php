<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpImap\Mailbox as ImapMailbox;


class IMAPController extends Controller
{
    public function ımap(){

        $hostname = '{imap.gmail.com:993/imap/ssl}';
        $username = 'mail';
        $password = 'password';


        $mailbox = new ImapMailbox($hostname, $username, $password);

        $mailsIds = $mailbox->searchMailbox('ALL');

        $emails = [];

        foreach ($mailsIds as $mailId) {
            $mail = $mailbox->getMail($mailId);
            $from = $mail->fromAddress;
            $subject = $mail->subject;
            $content = $mail->textHtml;

            $email = [
                'from' => $from,
                'subject' => $subject,
                'content' => trim(strip_tags($content))
            ];

            array_push($emails, $email);
        }

        $mailbox->disconnect();

       response()->json($emails);
    }

}
