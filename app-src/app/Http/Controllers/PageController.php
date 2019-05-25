<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('Welcome', [
            'tasks' => ['from controller call the view'],
            'foo' => 'variable foo not important',
            'bar' => request('bar'),
            'script' => '<script>console.log(\'called from the controller\');</script>'
        ]);
    }
}
