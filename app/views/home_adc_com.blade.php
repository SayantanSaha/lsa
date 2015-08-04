

@extends('layout')
@section('style') 

@stop
@section('sidebar')   
	
@stop

@section('content')
<div class="row">
    	<div class="col s12 m6">
		  <div class="card green lighten-1">
			<div class="card-content">
			  <div class="collection with-header blue-text darken-4" >
				<li class="collection-header"><h4>Last 5 Committee Meetings</h4></li>
				@foreach($committees as $committee) 
					<li class="collection-item"><a href="/committee/{{{$committee->id}}}" class="green-text darken-4">{{{$committee->date}}}</a></li>
					 
				
				
								
				@endforeach
			  </div>
			</div>
		
		  </div>
	</div>
	<div class="col s12 m6">
		 <div class="card blue lighten-1">
			<div class="card-content">
			  <div class="waves-effect waves-light btn red white-text darken-4" >
				 
				<a href="new/committee"><i class="mdi-content-add white-text"></i> Form New Committee</a>
				
			  </div>
			</div>
		
		  </div>
	</div>
</div>
@stop
@section('script')

@stop
