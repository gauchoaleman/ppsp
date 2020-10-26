<?php
namespace App\Classes\Config\Menu\Level2;
use App\Classes\Config\Menu\Menu as Menu;
use DB;

//echo "Flag";      //Flag
class Level2 extends Menu
{
  public function get_menu_items($menu_level1_item_id)
  {
    return DB::table('menu_level2_items')->select('*')->where('menu_level1_item_id','=',$menu_level1_item_id)->orderBy('position', 'asc')->get();
  }

  public function one_position_down($menu_level1_item_id,$from_position,$to_position="")
  {
    if( !$to_position )
      DB::table('menu_level2_items')->where('position','>=',$from_position)->where('menu_level1_item_id','=',$menu_level1_item_id)->decrement('position');
    else
      DB::table('menu_level2_items')->where('position', '>=', $from_position)->where('position', '<=', $to_position)->where('menu_level1_item_id','=',$menu_level1_item_id)->
      decrement('position');
  }

  public function one_position_up($menu_level1_item_id,$from_position,$to_position="")
  {
    if( !$to_position )
      DB::table('menu_level2_items')->where('position','>=',$from_position)->where('menu_level1_item_id','=',$menu_level1_item_id)->increment('position');
    else
      DB::table('menu_level2_items')->where('position', '>=', $from_position)->where('position', '<=', $to_position)->where('menu_level1_item_id','=',$menu_level1_item_id)->
      increment('position');
  }

  public function get_position_from_id($id)
  {
    $item = DB::table('menu_level2_items')->where('id','=', $id)->first();
    return $item->position;
  }

  public function get_item_data($id)
  {
    $item = DB::table('menu_level2_items')->where('id', $id)->first();
    return $item;
  }
}
?>
