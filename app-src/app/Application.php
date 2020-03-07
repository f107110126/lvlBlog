<?php

namespace App;

use Illuminate\Foundation\Application as OriginalApplication;

class Application extends OriginalApplication
{
    public function publicPath()
    {
        return realpath($this->basePath . DIRECTORY_SEPARATOR . '..');
    }
}
