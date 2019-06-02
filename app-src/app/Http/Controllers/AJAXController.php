<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AJAXController extends Controller
{
    public function index()
    {
        $msg = '這是一條簡單的訊息.';
        return response()->json(['msg' => $msg]);
    }

    public function setCookie(Request $request)
    {
        return response()->json(['status' => 'success'])->cookie($request->cName, $request->cValue, $request->cTime);
    }

    public function getCookie(Request $request)
    {
        $content = [$request->cName => $request->cookie($request->cName)];
        return response()->json(['status' => 'success', 'content' => $content]);
    }
}
