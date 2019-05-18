<?php

namespace App\Http\Controllers\Push;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkerController extends Controller
{
    public static function sendNotification($serverKey, $subscriberTokens, $message)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $request_body = [
            'notification' => [
                'title' => $message->title,
                'body' => $message->body,
                'icon' => $message->icon,
                'click_action' => $message->click_action,
            ],
            'registration_ids' => $subscriberTokens
        ];
        $fields = json_encode($request_body);
        $request_headers = [
            'Content-Type: application/json',
            'Authorization: key=' . $serverKey->server_key,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
