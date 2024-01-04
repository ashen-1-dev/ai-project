<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImageToVideoController extends Controller
{
    public function showGenerateVideoIdForm()
    {
        return view('image-to-video.index');
    }

    public function generateVideoId(Request $request)
    {
        $key = $request->get('token');
        $image = $request->file('image');


        $result = Http::withToken($key)
            ->withoutVerifying()
            ->asMultipart()
            ->attach('image', $image->getContent(), 'test.jpg')
            ->post('https://api.stability.ai/v2alpha/generation/image-to-video', ['cfg_scale' => 7])
            ->json();

        return back()->with(['id' => $result['id']]);
    }

    public function showGetVideoByIdForm()
    {
        return view('image-to-video.get-video');
    }

    public function getVideoById(Request $request)
    {
        $id = $request->get('id');
        $token = $request->get('token');

        $response = Http::withToken($token)
            ->withHeaders(['accept' => 'application/json'])
            ->withoutVerifying()
            ->get("https://api.stability.ai/v2alpha/generation/image-to-video/result/$id")
            ->json();

        $headers = [
            'Content-type' => 'video/mp4',
            'Content-Disposition' => 'attachment; filename="video.mp4"',
        ];

        return \response()->make(base64_decode($response['video'], true), 200, $headers);
    }
}
