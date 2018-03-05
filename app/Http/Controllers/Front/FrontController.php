<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    protected $appType="Front";
    protected $page;

    public function __construct()
    {
        $this->data('title',$this->title('Welcome'));

        $this->page=$this->appType.'.Page';
    }
}
