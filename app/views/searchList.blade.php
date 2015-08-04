

@extends('layout')
@section('style') 

@stop


@section('content')
<div class="row">
    <div class="col s12">
        <table>
        <thead>
          <tr>
              <th data-field="id">File No.</th>
              <th data-field="name">Current Status</th>
              <th data-field="price">NOC</th>
          </tr>
        </thead>

        <tbody>
	@foreach($app as $application) 
          <tr>
            <td>{{{$application->fileNo}}}</td>
            <td>{{{$application->status->get(0)->name}}}</td>
            <td>
		@if ($application->status->get(0)->id==9)
		<a href="/application/{{{$application->id}}}/noc">NOC</a>
		@else
		NOC not yet available.
		@endif
	    </td>
          </tr>
        @endforeach
        </tbody>
      </table>
	</div>
</div>    
@stop
@section('script')

@stop
