

@extends('layout')
@section('style') 

@stop


@section('content')

<div class="row">
		
			<div class="col s12">
			  <div class="card red accent-1">
				<div class="card-content">
				  <div class="collection with-header red-text darken-4" >
					<li class="collection-header"><h4>Applications Pending </h4></li>
					@foreach($app as $application) 
						<li class="collection-item"><a href="/view/{{{$application->id}}}" class="red-text darken-4">{{{$application->fileNo}}}</a></li>
					@endforeach
				  </div>
				</div>
				
			  </div>
			</div>
			
			
		
			
		
		
	</div>	
	
@stop
@section('script')

@stop
