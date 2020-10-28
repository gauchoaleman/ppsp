<div class="container">
  <br>
  <div class="card" style="width: 70rem;">
    <div class="card-header">
      Agregar item en nivel 1
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
            @include('config.menu.level2.mod_item.form.level1_position_selector')
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
            @include('config.menu.level2.mod_item.form.level2_position_selector')
            @error('new_menu_level2_item_id')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

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
