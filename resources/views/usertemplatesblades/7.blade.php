<html><head><title></title></head><body>
<style type="text/css">*{
					font-family:lucida sans unicode,lucida grande,sans-serif;
				}
</style><div id="header"><img alt="" src="http://cards.banqueaudi.com/audi2007/0115/AD1501.jpg" style="height:200px; width:1050px"><img alt="" src="http://cards.banqueaudi.com/audi2007/erep/new_ch_stat_h.jpg" style="height:189px; width:1050px"></div>

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

<table border="1" cellpadding="1" cellspacing="1" style="width:1050px" id="transactions"><tbody><tr><th colspan="1" rowspan="2" style="width: 200px; text-align: center; background-color: rgb(204, 204, 204);">Transaction Date</th>
			<th colspan="2" rowspan="1" style="width: 150px; text-align: center; background-color: rgb(204, 204, 204);">Merchant</th>
			<th colspan="2" rowspan="1" style="text-align: center; background-color: rgb(204, 204, 204);">Amount</th>
		</tr><tr><th style="text-align: center; background-color: rgb(204, 204, 204);">Name</th>
			<th style="text-align: center; background-color: rgb(204, 204, 204);">City</th>
			<th style="text-align: center; background-color: rgb(204, 204, 204);">Debit</th>
			<th style="text-align: center; background-color: rgb(204, 204, 204);">Credit</th>
		</tr>@foreach ($transactions as $row)<tr><td>{{ $row['tdate'] }}</td>
			<td>{{ $row['tname'] }}</td>
			<td>{{ $row['tcity'] }}</td>
			<td style="text-align: right;">{{ $row['tdebit'] }}</td>
			<td style="text-align: right;">{{ $row['tcredit'] }}</td>
		</tr>@endforeach</tbody></table><p> </p>

<table align="left" border="1" cellpadding="1" cellspacing="1" style="margin-bottom:40px; width:500px"><tbody><tr><td style="background-color: rgb(204, 204, 204);"> Points Summary</td>
		</tr><tr><td style="background-color: rgb(204, 204, 204);"> Opening Balance</td>
			<td style="text-align: right;">{{$OB}}</td>
		</tr><tr><td style="background-color: rgb(204, 204, 204);"> New Points Earned This Statement</td>
			<td style="text-align: right;">{{$NP}}</td>
		</tr><tr><td style="background-color: rgb(204, 204, 204);"> Transferred/Adjusted Points</td>
			<td style="text-align: right;">{{$TAP}}</td>
		</tr><tr><td style="background-color: rgb(204, 204, 204);"> Redeemed Points</td>
			<td style="text-align: right;">{{$RP}}</td>
		</tr><tr><td style="background-color: rgb(204, 204, 204);"> Total Points</td>
			<td style="text-align: right;">{{$TP}}</td>
		</tr></tbody></table><div id="footer"><img alt="" src="http://cards.banqueaudi.com/audi2007/erep/new_ch_stat_f.jpg" style="height:60px; width:1050px"></div>
</body></html>
