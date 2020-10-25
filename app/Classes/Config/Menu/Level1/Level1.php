<?php
namespace App\Classes\Config\Menu\Level1;
use App\Classes\Config\Menu\Menu as Menu;
use DB;

//echo "Flag";      //Flag
class Level1 extends Menu
{
  public function get_level1_menu_items()
  {
    return DB::table('menu_level1_items')->select('*')->orderBy('position', 'asc')->get();
  }

  public function one_level1_position_down_from($from_position,$to_position="")
  {
    if( !$to_position )
      DB::table('menu_level1_items')->where('position','>=',$from_position)->decrement('position');
    else
      DB::table('menu_level1_items')->where('position', '>=', $from_position)->where('position', '<=', $to_position)->decrement('position');
  }

  public function one_level1_position_up_from($from_position,$to_position="")
  {
    if( !$to_position )
      DB::table('menu_level1_items')->where('position','>=',$from_position)->increment('position');
    else
      DB::table('menu_level1_items')->where('position', '>=', $from_position)->where('position', '<=', $to_position)->increment('position');
  }

  public function get_level1_position_from_id($id)
  {
    $item = DB::table('menu_level1_items')->where('id','=', $id)->first();
    return $item->position;
  }

  public function get_level1_item_data($id)
  {
    $item = (array) DB::table('menu_level1_items')->where('id', $id)->first();
    return $item;
  }
}
?>
