<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

$defaultTimeZone='America/Argentina/Buenos_Aires';
if(date_default_timezone_get()!=$defaultTimeZone)
  date_default_timezone_set($defaultTimeZone);

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function show_page($uri,$with_menubars,$site_section,$message = "",$data=array()) {
    $ret = "";
    if( $site_section == "front" )
      $title = "Prevención suicidio";
    else
      $title = "Configuración Prevención suicidio";
    $ret .= view('includes/head',['title' => $title]);
    if( $with_menubars )
      $ret .= view("includes/$site_section/top_bar");
    if( $message )
      $ret .= $message."<br>";
    $ret .= view($uri,$data);
    if( $with_menubars )
      $ret .= view("includes/$site_section/bottom_bar");
    $ret .= view('includes/bottom');
    return $ret;
  }

  public function one_level1_position_down_from($position)
  {
    DB::table('menu_level1_items')->where('position','>=',$position)->decrement('position');
  }

  public function one_level1_position_up_from($position)
  {
    DB::table('menu_level1_items')->where('position','>=',$position)->increment('position');
  }

  public function get_level1_position_from_id($id)
  {
    $item = DB::table('menu_level1_items')->where('id','=', $id)->first();
    return $item->position;
  }
}
?>
