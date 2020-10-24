<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Logout extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    $_SESSION["logged_in"] = false;
    return $this->show_page("/config/login_form",false,"config",$message = "Se deslogueó del sistema.");
  }
}
