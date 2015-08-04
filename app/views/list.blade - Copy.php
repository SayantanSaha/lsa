

@extends('index')
@section('style') 

@stop
@section('sidebar')   
	<li class="sidebar-search">
		<div class="input-group custom-search-form">
			<input type="text" class="form-control" placeholder="Search Application">
			<span class="input-group-btn">
			<button class="btn btn-default" type="button">
				<i class="fa fa-search"></i>
			</button>
		</span>
		</div>
		<!-- /input-group -->
	</li>
    <li><a href="">{{{ $name }}}</a></li>
	<li><a href="">{{{ $desig }}}</a></li>
	<li><a href="">{{{ $office }}}</a></li>
	<li><a href="incomplete">Incomplete Applications <span id="inclpt" style="background-color:red;" class="badge"></span></a></li>
	<li><a href="">New Application</a></li>
	<li><a href="">View Status</a></li>
	<li><a href="/logout" class="btn btn-danger">Log Out</a></li>
@stop

@section('content')
    <div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">List of Aplications</h1>
		</div>
		<!-- /.col-lg-12 -->		
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading" id="heading">Panel heading</div>

					<!-- Table -->
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr><th>File No.</th><th>File Date</th><th>Actions</th></tr>
						</thead>
						<tbody id="tbdy">
						</tbody>
					</table>
			</div>
		</div>
		<!-- /.col-lg-12 -->		
	</div>
@stop
@section('script')
<script>
$(document).ready(function(){
	var appStatusCode 	= {{{ $statusCode }}};
	var userRole 		= {{{$role}}};
	$.getJSON( "api/v1/application/"+{{{ $circle }}}+"/incomplete/count", function( data ) {			
		$("#inclpt").html(data.count);
	});
	$.getJSON( "api/v1/application/{{{ $circle }}}/{{{ $appStatus }}}/list", function( data ) 
	{			
		var html="";
		for(var i=0;i<data.applications.length;i++)
		{
			var date = data.applications[i].fileDate.split("-");
			var newDate = date[2]+"/"+date[1]+"/"+date[0]
			html = html+"<tr><td>"+data.applications[i].fileNo+"</td><td>"+newDate+"</td>";
			if(userRole == 5 )
			{
				if(appStatusCode == 1 || appStatusCode == 3)
					html = html + "<td><a href='/view/"+data.applications[i].id+"' class='btn btn-default'><span class='glyphicon glyphicon-folder-open'></span> OPEN</a> <a href='/edit/"+data.applications[i].id+"' class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span>EDIT</a></td></tr>";
				else
					html = html + "<td></td></tr>";
			}
			else
			{
				html = html + "<td><a href='/view/"+data.applications[i].id+"' class='btn btn-default'><span class='glyphicon glyphicon-folder-open'></span> OPEN</a> </td></tr>";
			}
		}
		$("#tbdy").html(html);
	});
	
	if(appStatusCode == 1)
	{
		$("#heading").html("Incomplete Applications");
	}
	if(appStatusCode == 2)
	{
		$("#heading").html("Submitted to Circle Officer");
	}
	if(appStatusCode == 3)
	{
		$("#heading").html("Returned from Circle Officer");
	}
	if(appStatusCode == 4)
	{
		$("#heading").html("Submitted to Addl. Deputy Commissioner(Revenue)");
	}
	if(appStatusCode == 5)
	{
		$("#heading").html("Returned from Addl. Deputy Commissioner(Revenue)");
	}
	if(appStatusCode == 6)
	{
		$("#heading").html("Approved by Addl. Deputy Commissioner(Revenue)");
	}
});
</script>
@stop