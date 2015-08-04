

@extends('index')
@section('style') 
<!-- File Input -->
	<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
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
	<li><a href="">View Status</a></li>
	<li><a href="/logout" class="btn btn-danger">Log Out</a></li>
@stop

@section('content')
    <div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">ADC's Dashboard</h1>
		</div>
		<!-- /.col-lg-12 -->		
	</div>
	<div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="inclpt">0</div>
                                    <div>Applications Incomplete </div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="incomplete">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="pending">0</div>
                                    <div>Applications Pending </div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="adc">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="returned">0</div>
                                    <div>Applications Returned for Review</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="adcReturn">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
	</div>
@stop
@section('script')
<script>
	$.getJSON( "api/v1/application/"+{{{ $circle }}}+"/incomplete/count", function( data ) {
			
			$("#inclpt").html(data.count);
		});
	$.getJSON( "api/v1/application/"+{{{ $circle }}}+"/adc/count", function( data ) {
			
			$("#pending").html(data.count);
		});
	$.getJSON( "api/v1/application/"+{{{ $circle }}}+"/adcReturn/count", function( data ) {
			
			$("#returned").html(data.count);
		});
</script>
@stop
