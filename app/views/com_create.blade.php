@extends('layout')
@section('style') 

@stop


@section('content')
<form action="/api/v1/committee" method="post">
<div class="row">
    <div class="col s12">
        <div class="card-panel blue lighten-3">
			<div class="collection blue-text darken-4" >
				<li class="collection-item">
				  <div class="input-field ">
					<!--<label for="fileDate">{{{Lang::get('lable.date')}}}</label>	-->			
					Committee Meeting Date:<input type="date" class="datepicker" id="comDate" name="comDate"></input>
				  </div>
				</li><!--
				<li class="collection-item">
				  <div class="input-field ">
							
					Cases From:<input type="date" class="datepicker" id="comFDate" name="comFDate"></input>
				  </div>
				</li>
				<li class="collection-item">
				  <div class="input-field ">
							
					Cases To:<input type="date" class="datepicker" id="comTDate" name="comTDate"></input>
				  </div>
				</li>-->
			</div>
        </div>
	</div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card-panel green lighten-3">
			<div class="collection with-header green-text darken-4" >
				<li class="collection-header"><h4>Members Present</h4></li>
				@foreach ($users as $user)
    

				<li class="collection-item black-text">
					<input type="checkbox" class="filled-in" id="{{ 'user'.$user->id }}" name="{{ 'user'.$user->id }}"/>
					<label for="{{ 'user'.$user->id }}" class="black-text">{{ $user->name }}</label>
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
<div class="row">
    <div class="col s7 offset-s5">
        
			
			 <button class="btn waves-effect waves-light" type="submit" name="action" style=" margin-left: auto;margin-right: auto;width: 30%;">Submit
				<i class="mdi-content-send right"></i>
			  </button>
        
	</div>
</div>
</form>
@stop
@section('script')
<script>
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
	format: 'yyyy-mm-dd'
  });
</script>
@stop
