<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function download(Request $request)
    {

        $svgContent = $request->qrcode;
        return response($svgContent)->header('Content-Type', 'image/svg+xml');
    }
}
