<html><body><div id="header"><img alt="" src="http://cards.banqueaudi.com/audi2007/0115/AD1501.jpg" style="height:200px; width:1050px"><img alt="" src="http://cards.banqueaudi.com/audi2007/erep/new_ch_stat_h.jpg" style="height:189px; width:1050px"></div>

<div id="container" style="display: block; width: 1050px;">
<div id="left" style="float: left; width: 80%;">
<p>{{$title}} {{$name}}</p>

<p>Product: {{$product}}</p>

<p>Currency: {{$currency}}</p>
</div>

<div id="right" style="float: right; width: 19%;">
<p>Date: {{$date}}</p>

<p>Account: {{$account}}</p>

<p>Invoice no: {{$invoice}}</p>
</div>
</div>

<table border="1" cellpadding="1" cellspacing="1" id="transactions" style="width:1050px"><tbody><tr><th colspan="1" rowspan="2" style="background-color:rgb(204, 204, 204); text-align:center; width:200px">Transaction Date</th>
			<th colspan="2" rowspan="1" style="background-color:rgb(204, 204, 204); text-align:center; width:150px">Merchant</th>
			<th colspan="2" rowspan="1" style="background-color:rgb(204, 204, 204); text-align:center">Amount</th>
		</tr><tr><th style="background-color:rgb(204, 204, 204); text-align:center">Name</th>
			<th style="background-color:rgb(204, 204, 204); text-align:center">City</th>
			<th style="background-color:rgb(204, 204, 204); text-align:center">Debit</th>
			<th style="background-color:rgb(204, 204, 204); text-align:center">Credit</th>
		</tr>@foreach ($transactions as $row)<tr><td>{{ $row['tdate'] }}</td>
			<td>{{ $row['tname'] }}</td>
			<td>{{ $row['tcity'] }}</td>
			<td style="text-align:right">{{ $row['tdebit'] }}</td>
			<td style="text-align:right">{{ $row['tcredit'] }}</td>
		</tr>@endforeach</tbody></table><p> </p>

<table align="left" border="1" cellpadding="1" cellspacing="1" style="margin-bottom:40px; width:500px"><tbody><tr><td style="background-color:rgb(204, 204, 204)"> Points Summary</td>
		</tr><tr><td style="background-color:rgb(204, 204, 204)"> Opening Balance</td>
			<td style="text-align:right">{{$OB}}</td>
		</tr><tr><td style="background-color:rgb(204, 204, 204)"> New Points Earned This Statement</td>
			<td style="text-align:right">{{$NP}}</td>
		</tr><tr><td style="background-color:rgb(204, 204, 204)"> Transferred/Adjusted Points</td>
			<td style="text-align:right">{{$TAP}}</td>
		</tr><tr><td style="background-color:rgb(204, 204, 204)"> Redeemed Points</td>
			<td style="text-align:right">{{$RP}}</td>
		</tr><tr><td style="background-color:rgb(204, 204, 204)"> Total Points</td>
			<td style="text-align:right">{{$TP}}</td>
		</tr></tbody></table><div id="footer"><img alt="" src="http://cards.banqueaudi.com/audi2007/erep/new_ch_stat_f.jpg" style="height:60px; width:1050px"></div></body></html>
