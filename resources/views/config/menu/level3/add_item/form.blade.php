<?php
use App\Classes\Config\Menu\Level2\Level2;

$menu_text = get_form_value("menu_text");
$text = get_form_value("text");
$menu_level1_item_id = get_form_value("menu_level1_item_id");
$menu_level2_item_id = get_form_value("menu_level2_item_id");

$level2 = new Level2;
if( !$level2->not_in_level1($menu_level2_item_id,$menu_level1_item_id) )
  $menu_level2_item_id = "";

$position = get_form_value("position");
?>
<div class="container">
  <br>
  <div class="card" style="width: 50rem;">
    <div class="card-header">
      Agregar item en nivel 3
    </div>
    <div class="card-body">
      <form method="POST" id="level1_add_form">
        @csrf
        <div class="form-group row">
          <label class="col-md-4 col-form-label text-md-right">
            {{ __('Texto menú:') }}
          </label>
          <div class="col-md-6">
            <input type="text" name="menu_text" value="{{$menu_text}}" class="form-control">
            @error('menu_text')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <label class="col-md-4 col-form-label text-md-right">
            {{ __('Texto:') }}
          </label>
          <div class="col-md-6">
            <textarea id="text" name="text" rows="4" cols="50">{{$text}}</textarea>
            @error('text')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <label class="col-md-4 col-form-label text-md-right">
            {{ __('Posición en nivel 1:') }}
          </label>
          <div class="col-md-6">
            @include('config.menu.level3.add_item.form.level1_position_selector')
            @error('menu_level1_item_id')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          @if( $menu_level1_item_id )
            <label class="col-md-4 col-form-label text-md-right">
              {{ __('Posición en nivel 2:') }}
            </label>
            <div class="col-md-6">
              @include('config.menu.level3.add_item.form.level2_position_selector')
              @error('menu_level2_item_id')
                <div class="alert alert-danger">
                  {{ $message }}
                </div>
              @enderror
            </div>
          @endif

          @if( $menu_level1_item_id && $menu_level2_item_id )
            <label class="col-md-4 col-form-label text-md-right">
              {{ __('Posición en nivel 3:') }}
            </label>
            <div class="col-md-6">
              @include('config.menu.level3.add_item.form.level3_position_selector')
              @error('position')
                <div class="alert alert-danger">
                  {{ $message }}
                </div>
              @enderror
            </div>
          @endif

          <div class="col-md-6">
            <button type="submit" class="btn btn-primary">
              {{ __('Entrar') }}
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
