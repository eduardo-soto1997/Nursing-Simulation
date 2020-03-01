@extends('layout')

@section('content')
  <div id="wrapper">
    <div id="page" class="container">
      <h1>New User</h1>

      <form method="post" action="/users">
        @csrf
          <div class="field">
            <label class="label" for="name">Name</label>

            <div class="control">
                <input class="input" type="text" name="name" id="name">
            </div>
          </div>

          <div class="field">
            <label class="label" for="email">Email</label>

            <div class="control">
                <input class="input" type="email" name="email" id="email">
            </div>
          </div>

          <div class="field">
            <label class="label" for="is_Admin">Admin Rights</label>

            <div class="control">
                <input class="input" type="checkbox" name="is_Admin" id="is_Admin">
            </div>
          </div>
          <button class="btn btn-success" type="submit">Create User</button>
        </form>
  </div>

@endsection
