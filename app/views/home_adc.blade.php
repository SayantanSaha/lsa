@extends('layout')
@section('content')
    <div class="row">
		<div class="col s12">
			<h1 class="page-header">ADC's Dashboard</h1>
		</div>
		<!-- /.col-lg-12 -->		
	</div>
	<div class="row">
	
			<div class="col s12 m6">
			  <div class="card red lighten-2">
				<div class="card-content white-text">
				  <div class="collection with-header red-text darken-4" id="copending" >
					
					
						<li class="collection-header">Applications Pending with CO</li>
						
					
				  </div>
				</div>
				
			  </div>
			</div>	
			<div class="col s12 m6">
			  <div class="card blue lighten-2">
				<div class="card-content white-text">
				  <div class="collection with-header blue-text darken-4" id="pending">
					
					
						
						<li class="collection-header">Applications Pending</li>
						@foreach ($app as $application)
    

						<li class="collection-item">
							<a href="/view/{{{$application->id}}}" class="blue-text">{{{$application->fileNo}}}<br/>File Date:{{{$application->fileDate}}}<br/>Circle:{{{$application->circle->name}}}</a>
						</li>
						@endforeach
					
				  </div>
				</div>
				
			  </div>
			</div>	
			
                
	</div>
@stop
@section('script')
<script>
	$.getJSON("api/v1/district/1/circles",function(data){
		var html1 = "<li class='collection-header'>Applications Pending with CO</li>"
		for(i=1;i<data.circles.length;i++)
		{
			var circle = data.circles[i];
			$.getJSON("api/v1/application/"+data.circles[i].id+"/coOverdue/count",function(data1){
				//if(data1.count>0)
				
					$("#copending").append("<li class='collection-item'>"+data.circles[i].name+"("+data1.count+")"+"</li>");
							
			});
		}
		//alert(html1);
		
	});
	
</script>
@stop
