@extends('layout')
@section('content')
   <div class="row">
        <div class="col s12 m8 offset-m2">
          <div class="card white">
		   <form action="login" method="POST">
            <div class="card-content blue-text">
              <span class="card-title red-text">Login</span>
             
			  <div class="row">
				  <div class="input-field col s12">
					<input id="username" type="text" class="validate" name="username">
					<label for="username">Username</label>
				  </div>
				</div>
				<div class="row">
				  <div class="input-field col s12">
					<input id="password" type="password" class="validate" name="password">
					<label for="password">Password</label>
				  </div>
				</div>
    
			  
            </div>
            <div class="card-action">
              <button class="btn waves-effect waves-light" type="submit" >Login
				<i class="mdi-content-send right"></i>
			  </button>
              
            </div>
			</form>
          </div>
        </div>
		
      </div>
@stop
