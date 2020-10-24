<div class="container">
  <br>
  <div class="card" style="width: 50rem;">
    <div class="card-header">
      Agregar item nivel 1
    </div>
    <div class="card-body">
      <form method="POST">
        @csrf
        <div class="form-group row">
          <label class="col-md-4 col-form-label text-md-right">
            {{ __('Texto menú:') }}
          </label>
          <div class="col-md-6">
            <input type="text" name="menu_text" class="form-control">
            @error('menu_text')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
              {{ __('Texto:') }}
            </label>
            <div class="col-md-6">
              <textarea id="text" name="text" rows="4" cols="50">
              </textarea>
              @error('text')
                <div class="alert alert-danger">
                  {{ $message }}
                </div>
              @enderror
            </div>
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
