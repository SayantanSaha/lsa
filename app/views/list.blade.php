

@extends('layout')
@section('style') 

@stop


@section('content')
<div class="row">
    <div class="col s12">
        <div class="card-panel green lighten-3">
			<div class="collection with-header green-text darken-4" >
				<li class="collection-header"><h4>Pending Applications</h4></li>
				@foreach ($applications as $application)
    

				<li class="collection-item">
					<a href="/view/{{{$application->id}}}">{{{$application->fileNo}}}<br/>File Date:{{{$application->fileDate}}}<br/>Circle:{{{$application->circle->name}}}</a>
				</li>
				@endforeach
				<!--<li class="collection-item">
				  <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
				  <label for="filled-in-box">Filled in</label>
				</li>-->
				
			</div>
        </div>
	</div>
</div>    
@stop
@section('script')

@stop