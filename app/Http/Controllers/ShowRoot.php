<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowRoot extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    get_form_value("hola");
    return $this->show_page("home",true,"front");
  }
}
?>
