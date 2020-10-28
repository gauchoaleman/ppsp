<?php
namespace App\Http\Controllers\Config\Menu\Level3;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListItems extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    return $this->show_page("config/menu/level3/list_items",true,"config");
  }
}
?>
