
@extends('layouts.base')
@section('title', "Log In")


@section('content')

    <h1>Log In</h1>

   <form method="POST">

       @csrf

        <div class="form-group">
            <label for="username">Username: </label>
            <input type="text" class="form-control" id="loginUsernameControl" name="username" placeholder="Enter your username here">
        </div>

       <div class="form-group">
           <label for="password">Password: </label>
           <input type="password" class="form-control" id="loginPasswordControl" name="password" placeholder="Enter your username here">
       </div>

       <div class="form-group">
           <input type="submit" class="btn btn-success" value="Log In">
       </div>

   </form>
@endsection

