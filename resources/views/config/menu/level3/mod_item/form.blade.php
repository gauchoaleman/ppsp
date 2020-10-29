<div class="container">
  <br>
  <div class="card" style="width: 70rem;">
    <div class="card-header">
      Modificar item en nivel 3
    </div>
    <div class="card-body">
      <form method="POST">
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
            <textarea id="text" name="text" rows="4" cols="50">
              {{$text}}
            </textarea>
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
            @include('config.menu.level3.mod_item.form.level1_position_selector')
            @error('menu_level1_item_id')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <label class="col-md-4 col-form-label text-md-right">
            {{ __('Posición en nivel 2:') }}
          </label>
          <div class="col-md-6">
            @include('config.menu.level3.mod_item.form.level2_position_selector')
            @error('menu_level2_item_id')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          @if( $menu_level1_item_id && $menu_level2_item_id )
            <label class="col-md-4 col-form-label text-md-right">
              {{ __('Posición en nivel 3:') }}
            </label>
            <div class="col-md-6">
              @include('config.menu.level3.mod_item.form.level3_position_selector')
              @error('position')
                <div class="alert alert-danger">
                  {{ $message }}
                </div>
              @enderror
            </div>
          @endif

          <div class="col-md-6">
            <button type="submit" class="btn btn-primary" name="button_pressed" value="1">
              {{ __('Entrar') }}
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
