

@extends('layout')
@section('style') 

@stop


@section('content')

<div class="row">
		
			<div class="col s12 m12">
			  <div class="card red accent-1">
				<div class="card-content">
				  <div class="collection with-header red-text darken-4" >
					<li class="collection-header"><h4>Applications Passed by ADC Pending Approval</h4></li>
					@foreach($app as $application) 
						<li class="collection-item black-text"><input type="checkbox" class="filled-in" name="appln" id="{{{$application->id}}}" value="{{{$application->id}}}"  /><label for="{{{$application->id}}}"><a href="/view/{{{$application->id}}}" class="red-text darken-4">{{{$application->fileNo}}}</a><span class="black-text"><br/>Zonal Value: {{{$application->zonal_value}}}<br/>Value Set by LM: {{{$application->value_per_bigha}}}<br/>Value Set by CO: {{{$application->net_value_co}}}<br/>Value Set by ADC: {{{$application->net_value_adc}}}</span></label></li>
					@endforeach
					<li class="collection-item">
						<div class="btn waves-effect waves-light" name="approve" style="width:100%;height:100%;" id="approve">Approve
							<i class="mdi-action-done right"></i>
					  	</div>
					</li>
				  </div>
				</div>
				
			  </div>
			</div>
			
			
			
		
		
	</div>	
	
@stop
@section('script')
<script>
$("#approve").click(function(){
	//alert ("Approved");
	var list = new Array();
	var count=0;
	
	@foreach($app as $application)
		 
		if($("#{{{$application->id}}}").is(":checked"))
		{
			//alert ("{{{$application->id}}} Approved");
			list[count]={{{$application->id}}};
			count = count+1;	
		}
	@endforeach
	//alert(list);
	$.post("application/updatemultiplestatus",{list:list},function(data){
		if(data.error==false)
		{
			alert(count+" applications passed.")
			location.reload(); 
		}
	},"json")
})
</script>
@stop
