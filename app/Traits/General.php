<?php

namespace App\Traits;

use Illuminate\Support\Facades\Config;

trait General
{

    public $data = [];

    public function data($key, $value)
    {
        if (empty($key)) throw new Exception('Key not set in data');

        return $this->data[$key] = $value;
    }


    public function title($back, $seperator = "::", $front = null)
    {
        if (!isset($front)) {
            $front = Config::get('site.name');
        }
        return $front . $seperator . $back;
    }

}