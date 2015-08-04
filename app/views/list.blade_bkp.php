

@extends('layout')
@section('style') 

@stop


@section('content')
    <div class="row">
		<div class="col s12">
			<h1 class="page-header">List of Aplications</h1>
		</div>
		<!-- /.col-lg-12 -->		
	</div>
	<div class="row">
		<div class="col s12">
			
				
					<div class="collection with-header" id="tbdy">
						<a href="#!" class="collection-item">Alvin</a>
						<a href="#!" class="collection-item active">Alvin</a>
						<a href="#!" class="collection-item">Alvin</a>
						<a href="#!" class="collection-item">Alvin</a>
					</div>
					
					
			
		</div>
		<!-- /.col-lg-12 -->		
	</div>
@stop
@section('script')
<script>
$(document).ready(function(){
	if({{{ $mode }}}=="user")
	{
		var appStatusCode 	= {{{ $statusCode }}};
		var userRole 		= {{{$role}}};
		var heading;
		if(appStatusCode == 1)
		{
			heading = "Incomplete Applications";
		}
		if(appStatusCode == 2)
		{
			heading="Submitted to Circle Officer";
		}
		if(appStatusCode == 3)
		{
			heading="Returned from Circle Officer";
		}
		if(appStatusCode == 4)
		{
			heading="Submitted to Addl. Deputy Commissioner(Revenue)";
		}
		if(appStatusCode == 5)
		{
			heading="Returned from Addl. Deputy Commissioner(Revenue)";
		}
		if(appStatusCode == 6)
		{
			heading="Approved by Addl. Deputy Commissioner(Revenue)";
		}
		$.getJSON( "api/v1/application/{{{ $circle }}}/{{{ $appStatus }}}/list", function( data ) 
		{			
			var html="<li class=\"collection-header\"><h4>"+heading+"</h4></li>";
			for(var i=0;i<data.applications.length;i++)
			{
				//var date = data.applications[i].fileDate.split("-");
				var date = new Date(data.applications[i].fileDate);
				//var newDate = date[2]+"/"+date[1]+"/"+date[0];
				var newDate = date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear();
				var url;
				//alert(data.applications[i].id);
				if(userRole == 5 )
				{
					if(appStatusCode == 1 || appStatusCode == 3)
						
						url = "/edit/"+data.applications[i].id;
					else
						url = "/view/"+data.applications[i].id;
				}
				else
				{
					url = "/view/"+data.applications[i].id ;
					
				}
				html = html+"<a href=\""+url+"\" class=\"collection-item\"><span class=\"title\">"+data.applications[i].fileNo+"</span><p>Application Date:"+newDate+"<br/>Applicant Name:"+data.applications[i].sellerName+"</p></a>";
				
			}
			$("#tbdy").html(html);
		});
	}
	else
	{
		
	}
	
});
</script>
@stop