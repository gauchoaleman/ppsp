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

  public function get_level1_item_data($id)
  {
    $item = DB::table('menu_level1_items')->where('id','=', $id)->first();
    return $item;
  }
}
?>
