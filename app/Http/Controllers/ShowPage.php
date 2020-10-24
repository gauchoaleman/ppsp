<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Functions\Page;

class ShowPage extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request,$id = "")
  {
    $request_path_parts = explode("/",$request->path());
    $first_path_part = $request_path_parts[0];
    if( $first_path_part == "config" )
      $site_section = "config";
    else
      $site_section = "front";
    return $this->show_page($request->path(),true,$site_section);
  }
}
