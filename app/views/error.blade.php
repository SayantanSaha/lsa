@extends('layout')
@section('style') 

@stop
@section('sidebar')   
	
@stop

@section('content')
<div class="row">
			<div class="col s12">
			  <div class="card green lighten-4">
				<div class="card-content red-text center-align valign">
				  <h1>ERROR {{{$error_code}}} !!!!</h1><br/> <h4>{{{$error_message}}}</h4>
				</div>
				
			  </div>
		</div>		

</div>
@stop
@section('script')
@stop