<?php
namespace App\Classes\Config\Menu\Level1;
use App\Classes\Config\Menu\Menu as Menu;
use DB;

//echo "Flag";      //Flag
class Level1 extends Menu
{
  public function get_menu_items()
  {
    return DB::table('menu_level1_items')->select('*')->orderBy('position', 'asc')->get();
  }

  public function get_menu_items_with_level2_presence()
  {
    return DB::table('menu_level2_items')
    ->join('menu_level1_items', 'menu_level1_items.id', '=', 'menu_level2_items.menu_level1_item_id')
    ->orderBy('menu_level1_items.position', 'asc')
    ->select('menu_level1_items.position as position')->distinct()->get();
  }

  public function get_menu_items_with_level2and3_presence()
  {
    return DB::table('menu_level3_items')
    ->join('menu_level1_items', 'menu_level1_items.id', '=', 'menu_level3_items.menu_level1_item_id')
    ->join('menu_level2_items', 'menu_level2_items.id', '=', 'menu_level3_items.menu_level2_item_id')
    ->orderBy('menu_level1_items.position', 'asc')
    ->select('menu_level1_items.position as position')->distinct()->get();
  }

  public function one_position_down($from_position,$to_position="")
  {
    if( !$to_position )
      DB::table('menu_level1_items')->where('position','>=',$from_position)->decrement('position');
    else
      DB::table('menu_level1_items')->where('position', '>=', $from_position)->where('position', '<=', $to_position)->decrement('position');
  }

  public function one_position_up($from_position,$to_position="")
  {
    if( !$to_position )
      DB::table('menu_level1_items')->where('position','>=',$from_position)->increment('position');
    else
      DB::table('menu_level1_items')->where('position', '>=', $from_position)->where('position', '<=', $to_position)->increment('position');
  }

  public function get_position_from_id($id)
  {
    $item = DB::table('menu_level1_items')->where('id','=', $id)->first();
    return $item->position;
  }

  public function get_item_data($id)
  {
    $item = DB::table('menu_level1_items')->where('id', $id)->first();
    return $item;
  }
}
?>
