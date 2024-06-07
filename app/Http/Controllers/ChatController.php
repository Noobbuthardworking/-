<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $message = $request->input('message');

        $client = new Client();
        $response = $client->post('https://api.openai.com/v1/engines/davinci-codex/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'prompt' => $message,
                'max_tokens' => 50,
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        return response()->json([
            'reply' => $data['choices'][0]['text']
        ]);
    }
}

