
<div style="text-align:center;">Certificate Of NON ENCUMBRANCE<br>{{{Auth::user()->office}}}</div>
<div style="float:left">File No:{{{$app->fileNo}}}</div>
<div style="float:right">Date:{{{date('d/m/Y')}}}</div>
<div style="clear:both"></div>
<p>Applicant:{{{$app->sellers->get(0)->name}}}</p>
<p>After searching through the records of this office from year ..................... to year .................... it is certified that the below 
mentioned property is free from all encumbrance.</p>
<center>LAND SCHEDULE</centre>
<table>
<tr>
<td>Mouza</td><td>Village</td><td>Patta</td><td>Dag</td><td>Bigha</td><td>Katha</td><td>Lessa</td>
</tr>
<tr>
<td>{{{$app->mouza->name}}}</td><td>{{{$app->village->name}}}</td><td>{{{$app->landPatta}}}</td><td>{{{$app->landDag}}}</td><td>{{{$app->soldB}}}</td><td>{{{$app->soldK}}}</td><td>{{{$app->soldL}}}</td>
</tr>
</table>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<div style="float:left;text-align:center;">{{{Auth::user()->name}}}<br/>{{{Auth::user()->district->name}}}</div>
<div style="float:right;text-align:center;">Record Keeper<br/>{{{Auth::user()->office}}}<br/>{{{Auth::user()->district->name}}}</div>
<div style="clear:both"></div>
<div style="float:right">{{QrCode::size(100)->generate('Applicant:'.$app->sellers->get(0)->name.' District:'.$app->circle->subdivision->district->name.' Circle:'.$app->circle->name.' Mouza:'.$app->mouza->name.' Village:'.$app->village->name.' Patta No:'.$app->landPatta.' Daag No.:'.$app->landDag.' Area:'.$app->soldB.'B '.$app->soldK.'K '.$app->soldL.'L Signatory:'.Auth::user()->name)}}</div>

<div style="clear:both"></div>
