<?php

namespace App\Controllers;

class ErrorController extends BaseController
{
  public function not_found()
  {
    return view('errors/404');
  }
}