<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Login extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    global $pass_user,$password;
    //phpinfo();
    if( isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]== true )
      return $this->show_page("config/home",true,"config","Ya estás logueado.");
    elseif( isset($_POST["_token"])){
      if( $_POST["user"] == "p" && $_POST["password"] == "p" ){
        $_SESSION["logged_in"] = true;
        return $this->show_page("config/home",true,"config","Login exitoso.");
      }
      else
        return $this->show_page("config/login_form",false,"config","Login erróneo.");
    }
    else
      return $this->show_page("config/login_form",false,"config");
  }
}
