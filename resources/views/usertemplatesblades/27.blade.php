<html><body><p><img alt="" src="http://cards.banqueaudi.com/audi2007/0115/AD1501.jpg" style="height:152px; margin-left:70px; margin-right:70px; width:1000px"></p>

<p><img alt="" src="http://cards.banqueaudi.com/audi2007/erep/new_ch_stat_h.jpg" style="height:180px; margin-left:70px; margin-right:70px; width:1000px"></p>

<p><span style="color:#696969">                     {{$title}} {{$name}}</span></p>

<p><span style="color:#696969">                     Product: {{$product}}</span></p>

<p><span style="color:#696969">                     Currency: {{$currency}}</span></p>

<table align="center" border="1" cellpadding="1" cellspacing="1" id="transaction" style="width:1000px"><tbody><tr><th colspan="1" rowspan="2" style="text-align: center; width: 100px; vertical-align: middle; background-color: rgb(204, 204, 204);">
			<p>Transaction Date</p>
			</th>
			<th colspan="2" rowspan="1" style="text-align: center; vertical-align: middle; background-color: rgb(204, 204, 204);">Merchant</th>
			<th colspan="2" style="background-color:rgb(204, 204, 204); text-align:center">Transaction</th>
			<th colspan="2" style="background-color:rgb(204, 204, 204); text-align:center">Amount</th>
		</tr><tr><th style="background-color:rgb(204, 204, 204); text-align:center">Name</th>
			<th style="background-color:rgb(204, 204, 204); text-align:center">City</th>
			<th style="background-color:rgb(204, 204, 204); text-align:center; width:50px">Cur.</th>
			<th style="background-color:rgb(204, 204, 204); text-align:center">Amount</th>
			<th style="background-color:rgb(204, 204, 204); text-align:center">Debit</th>
			<th style="background-color:rgb(204, 204, 204); text-align:center">Credit</th>
		</tr>@foreach ($transaction as $row)<tr><td style="border-color:rgb(204, 204, 204); height:30px; text-align:center; vertical-align:middle">{{ $row['date'] }}</td>
			<td style="border-color:rgb(204, 204, 204); height:30px; text-align:center; vertical-align:middle">{{ $row['Name'] }}</td>
			<td style="border-color:rgb(204, 204, 204); height:30px; text-align:center; vertical-align:middle">{{ $row['City'] }}</td>
			<td style="border-color:rgb(204, 204, 204); height:30px; text-align:center; vertical-align:middle">{{ $row['transcur'] }}</td>
			<td style="border-color:rgb(204, 204, 204); height:30px; text-align:center; vertical-align:middle">{{ $row['transamo'] }}</td>
			<td style="border-color:rgb(204, 204, 204); height:30px; text-align:center; vertical-align:middle">{{ $row['Debit'] }}</td>
			<td style="border-color:rgb(204, 204, 204); height:30px; text-align:center; vertical-align:middle">{{ $row['Credit'] }}</td>
		</tr>@endforeach</tbody></table><p> </p>

<p><img alt="" src="http://cards.banqueaudi.com/audi2007/erep/new_ch_stat_f.jpg" style="height:57px; margin-left:70px; margin-right:70px; width:1000px"></p>

<p> </p></body></html>
