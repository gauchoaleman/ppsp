<?php
$name = get_form_value("name");
$password = get_form_value("password");
?>
<div class="container">
  <br>
  <div class="card" style="width: 70rem;">
    <div class="card-header">
      Agregar usuario
    </div>
    <div class="card-body">
      <form method="POST" id="level1_add_form">
        @csrf
        <div class="form-group row">
          <label class="col-md-4 col-form-label text-md-right">
            {{ __('Nombre:') }}
          </label>
          <div class="col-md-6">
            <input type="text" name="name" value="{{$name}}" class="form-control" required>
            @error('name')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <label class="col-md-4 col-form-label text-md-right">
            {{ __('Clave:') }}
          </label>
          <div class="col-md-6">
            <input type="password" name="password" value="{{$password}}" class="form-control" required>
            @error('password')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6">
            <button type="submit" name="submit" value="add" class="btn btn-primary">
              {{ __('Entrar') }}
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
<br>
  <div class="card" style="width: 70rem;">
    <div class="card-header">
      Modificar usuario
    </div>
    <div class="card-body">
      <form method="POST" id="level1_add_form">
        @csrf
        <div class="form-group row">
          <label class="col-md-4 col-form-label text-md-right">
            {{ __('Nombre:') }}
          </label>
          <div class="col-md-6">

            <select name="id">
              <?php $users = DB::table('users')
                      ->select('*')
                      ->get(); ?>
              @foreach( $users as $user )
                <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
            </select>

            @error('name')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          <label class="col-md-4 col-form-label text-md-right">
            {{ __('Nuevo nombre:') }}
          </label>
          <div class="col-md-6">
            <input type="text" name="name" value="{{$name}}" class="form-control" required>
            @error('name')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          <label class="col-md-4 col-form-label text-md-right">
            {{ __('Clave:') }}
          </label>
          <div class="col-md-6">
            <input type="password" name="password" value="{{$password}}" class="form-control" required>
            @error('password')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6">
            <button type="submit" name="submit" value="modify" class="btn btn-primary">
              {{ __('Entrar') }}
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <br>
  <div class="card" style="width: 70rem;">
    <div class="card-header">
      Borrar usuario
    </div>
    <div class="card-body">
      <form method="POST" id="level1_add_form">
        @csrf
        <div class="form-group row">
          <label class="col-md-4 col-form-label text-md-right">
            {{ __('Nombre:') }}
          </label>
          <div class="col-md-6">

            <select name="id">
              <?php $users = DB::table('users')
                      ->select('*')
                      ->get(); ?>
              @foreach( $users as $user )
                <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
            </select>

            @error('name')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6">
            <button type="submit" name="submit" value="delete" class="btn btn-primary">
              {{ __('Entrar') }}
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
