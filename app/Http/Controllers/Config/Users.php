<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Users extends Controller
{
  private function add_form_sent()
  {
    if( isset($_POST["submit"]) && $_POST["submit"]=="add")
      return TRUE;
    else
      return FALSE;
  }

  private function modify_form_sent()
  {
    if( isset($_POST["submit"]) && $_POST["submit"]=="modify")
      return TRUE;
    else
      return FALSE;
  }

  private function delete_form_sent()
  {
    if( isset($_POST["submit"]) && $_POST["submit"]=="delete")
      return TRUE;
    else
      return FALSE;
  }

  private function add_user_to_db($name,$password )
  {
    $users_count = DB::table('users')
            ->select('*')
             ->where("name","$name")
             ->count();

    if( $users_count )
      return "El usuario ingresado ya existe";
    else{
      DB::table('users')->insert([
        'name' => $name,
        'password' => $password
      ]);
      return "Usuario agregado";
    }
  }

  private function modify_user_in_db($id,$name,$password)
  {
    $users_count = DB::table('users')
             ->where("id","$id")
             ->update(["name"=>"$name","password"=>"$password"]);

    return "Usuario modificado";
  }

  private function delete_user_from_db($id)
  {
    $users_count = DB::table('users')
             ->where("id","$id")
             ->delete();

    return "Usuario borrado";
  }

  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    if( $this->add_form_sent() ){
      $message = $this->add_user_to_db($_POST["name"],$_POST["password"] );
      return $this->show_page("home",true,"config",$message);
    }
    else if( $this->modify_form_sent() ){
      $message = $this->modify_user_in_db($_POST["id"],$_POST["name"],$_POST["password"] );
      return $this->show_page("home",true,"config",$message);
    }
    else if( $this->delete_form_sent() ){
      $message = $this->delete_user_from_db($_POST["id"]);
      return $this->show_page("home",true,"config",$message);
    }
    else
      return $this->show_page("config/users/form",true,"config","");
  }
}
