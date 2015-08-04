<div style="text-align:center;"><u>GOVT. OF ASSAM</u><br>OFFICE OF THE DEPUTY COMMISSIONER::NAGAON<br/>(REVENUE BRANCH)<br/><br/><b><u>PERMISSION FOR LAND SALE</u></b></div>
<p> Seen the report forwarded and recommended by the Circle Officer,{{{$app->circle->name}}} Revenue Circle vide No. {{{$app->fileNo}}} dated {{{$app->fileDate}}}
regarding transfer of following Agriculture/Bari/Homestaed class of land as mentioned in the schedule below by sale/donation etc. between :-</p>
Seller:<br/>
{{{$app->sellers->get(0)->name}}}<br/>
S/o {{{$app->sellers->get(0)->fname}}}<br/>
Village {{{$app->sellers->get(0)->village->name}}}<br/>
Mouza {{{$app->sellers->get(0)->mouza->name}}}<br/>
<br/>
<br/>
Purchaser:<br/>
{{{$app->buyers->get(0)->name}}}<br/>
S/o {{{$app->buyers->get(0)->fname}}}<br/>
Village {{{$app->buyers->get(0)->village}}}<br/>
Mouza {{{$app->buyers->get(0)->mouza}}}<br/>

<p>Hence NOC for sale/donation of land is hereby accorded subject to possession of land by the seller. If anybody has objection regarding this land, they can file objection.
</p>

<div style="float:left; width:50%;">
<b><u>Schedule of Land</b></u><br/>
Vill : {{{$app->village->name}}}<br/>
Mouza: {{{$app->mouza->name}}}<br/>
P.P. No. {{{$app->landPatta}}}<br/>
Dag No. {{{$app->landDag}}}<br/>
Area : {{{$app->soldB}}} Bigha {{{$app->soldK}}} Katha {{{$app->soldL}}} Lecha<br/>
</div>
<div style="float:right; width:50%;">
<b><u>Value of Land</b></u><br/>
Rs. {{{$app->net_value_adc}}}
</div>
<div style="clear:both;"></div>
<p>The validity of this NOC is 3 months from the date of issue and the land can be used for agriculture/bari/homestead only.</p>
<div style="float:right; text-align:center;">
Sd/-<br/>
Addl. Deputy Commissioner, <br/>
Nagaon<br/>
</div>
<div style="clear:both;"></div>
<div style="float:right">{{QrCode::size(100)->generate('Applicant:'.$app->sellers->get(0)->name.' District:'.$app->circle->subdivision->district->name.' Circle:'.$app->circle->name.' Mouza:'.$app->mouza->name.' Village:'.$app->village->name.' Patta No:'.$app->landPatta.' Daag No.:'.$app->landDag.' Area:'.$app->soldB.'B '.$app->soldK.'K '.$app->soldL.'L'.' value:'.$app->net_value_adc)}}</div>

<div style="clear:both"></div>
