@extends('layout')
@section('content')
    <div class="row">
		<div class="col s12">
			<h1 class="page-header">Circle Officer's Dashboard</h1>
		</div>
		<!-- /.col-lg-12 -->		
	</div>
	<div class="row">
	
			<div class="col s12 m4">
			  <div class="card red lighten-2">
				<div class="card-content white-text">
				  <div class="collection with-header red-text darken-4" id="incomplete" >
					
					
						<li class="collection-header">Applications Incomplete</li>
						
					
				  </div>
				</div>
				
			  </div>
			</div>	
			<div class="col s12 m4">
			  <div class="card blue lighten-2">
				<div class="card-content white-text">
				  <div class="collection with-header blue-text darken-4" id="pending">
					
					
						
						<li class="collection-header">Applications Pending</li>
						
					
				  </div>
				</div>
				
			  </div>
			</div>	
			<div class="col s12 m4">
			  <div class="card yellow lighten-2">
				<div class="card-content white-text">
				  <div class="collection with-header orange-text darken-4" id="returned">
					
					
						
						<li class="collection-header">Applications Returned</li>
					
				  </div>
				</div>
				
			  </div>
			</div>	
                
	</div>
@stop
@section('script')
<script>
	$.getJSON( "api/v1/application/"+{{{ $circle }}}+"/incomplete/list", function( data ) {
			var html = "<li class=\"collection-header red-text darken-3\">Applications Incomplete</li>";
			for(var i=0;i<data.applications.length;i++)
			{
				html = html+"<li class=\"collection-item\"><a class=\"red-text darken-3\" href=\"/view/"+data.applications[i].id+"\">"+data.applications[i].fileNo+"</a></li>"
			}
			//alert(html);
			$("#incomplete").html(html);
		});
	$.getJSON( "api/v1/application/"+{{{ $circle }}}+"/co/list", function( data ) {
			
			var html = "<li class=\"collection-header blue-text darken-3\">Applications Pending</li>";
			for(var i=0;i<data.applications.length;i++)
			{
				html = html+"<li class=\"collection-item\"><a class=\"blue-text darken-3\" href=\"/view/"+data.applications[i].id+"\">"+data.applications[i].fileNo+"</a></li>"
			}
			//alert(html);
			$("#pending").html(html);
		});
	$.getJSON( "api/v1/application/"+{{{ $circle }}}+"/adcReturn/list", function( data ) {
			
			var html = "<li class=\"collection-header orange-text darken-3\">Applications Returned</li>";
			for(var i=0;i<data.applications.length;i++)
			{
				html = html+"<li class=\"collection-item\"><a class=\"orange-text darken-3\" href=\"/view/"+data.applications[i].id+"\">"+data.applications[i].fileNo+"</a></li>"
			}
			//alert(html);
			$("#returned").html(html);
		});
</script>
@stop
