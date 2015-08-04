<html>
	<head>
		<title>Acknowledgement</title>
	</head>
	<body>
		<center>Revenue Circle Office::{{{$app->circle->name}}}<br/>Acknowledgement</center>
	<p> An application for permission for sale of land measuring 
		{{{$app->soldB}}} Bigha {{{$app->soldK}}} Katha and {{{$app->soldL}}} Lecha in {{{$app->village->name}}} Village 
		of {{{$app->mouza->name}}} Mouza of {{{$app->circle->name}}} Circle of {{{$app->circle->subDivision->district->name}}} District  has been received from {{{$app->sellers->get(0)->name}}}
		on {{{$app->fileDate}}}. File no. for this application is <u>{{{$app->fileNo}}}</u>.</p>
	<div style="float:right;"><center>Recieved By<br/><br/><br/><br/><br/>{{{$app->user->name}}}<br/>{{{$app->user->designation}}}<br/>{{{$app->user->office}}}</center><br/>
	{{QrCode::size(100)->generate('Applicant:'.$app->sellers->get(0)->name.' District:'.$app->circle->subdivision->district->name.' Circle:'.$app->circle->name.' Mouza:'.$app->mouza->name.' Village:'.$app->village->name.' Patta No:'.$app->landPatta.' Daag No.:'.$app->landDag.' Area:'.$app->soldB.'B '.$app->soldK.'K '.$app->soldL.'L')}}	
	</div>
	<div style="clear:both;"></div>
	<hr/>
	<center>Revenue Circle Office::{{{$app->circle->name}}}<br/>Acknowledgement</center>
	<p> An application for permission for sale of land measuring 
		{{{$app->soldB}}} Bigha {{{$app->soldK}}} Katha and {{{$app->soldL}}} Lecha in {{{$app->village->name}}} Village 
		of {{{$app->mouza->name}}} Mouza of {{{$app->circle->name}}} Circle of {{{$app->circle->subDivision->district->name}}} District  has been received from {{{$app->sellers->get(0)->name}}}
		on {{{$app->fileDate}}}. File no. for this application is <u>{{{$app->fileNo}}}</u>.</p>
	<div style="float:right;"><center>Recieved By<br/><br/><br/><br/><br/>{{{$app->user->name}}}<br/>{{{$app->user->designation}}}<br/>{{{$app->user->office}}}</center><br/>
	{{QrCode::size(100)->generate('Applicant:'.$app->sellers->get(0)->name.' District:'.$app->circle->subdivision->district->name.' Circle:'.$app->circle->name.' Mouza:'.$app->mouza->name.' Village:'.$app->village->name.' Patta No:'.$app->landPatta.' Daag No.:'.$app->landDag.' Area:'.$app->soldB.'B '.$app->soldK.'K '.$app->soldL.'L')}}	
	</div>
	<div style="clear:both;"></div>
	</body>
</html>
