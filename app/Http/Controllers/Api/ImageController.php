<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = [
            'status' => 'fail'
        ];
        $imageService = new ImageService();

        $imageUrl = $imageService->uploadImage($request);
        if (!empty($imageUrl)) {
            $response = [
                'status' => 'successful',
                'link' => $imageUrl
            ];
        }
        return response()->json($response);
    }
}
