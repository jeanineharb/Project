<html><body><p style="text-align:center"> </p>

<p><img alt="" src="http://cards.banqueaudi.com/audi2007/0115/AD1501.jpg" style="height:190px; margin-left:20px; margin-right:20px; width:900px"></p>

<p>     <img alt="" src="http://cards.banqueaudi.com/audi2007/erep/new_ch_stat_h.jpg" style="height:162px; margin-left:20px; margin-right:20px; width:900px"></p>

<p>      Dear {{$title}} {{$name}},</p>

<p>      Product : {{$product}}</p>

<p>      Currency : {{$currency}}</p>

<p>     </p>

<table align="center" border="1" cellpadding="1" cellspacing="1" id="transaction" style="width:900px"><tbody><tr><td colspan="1" style="background-color:rgb(204, 204, 204); text-align:center; width:400px">Transactio Date</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center; width:400px">Name</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center; width:400px">City</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center; width:400px">Debit</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center; width:400px">Credit</td>
		</tr>@foreach ($transaction as $row)<tr><td colspan="1" style="background-color:rgb(255, 255, 255); text-align:center">{{ $row['date'] }}</td>
			<td style="text-align:center">{{ $row['Name'] }}</td>
			<td style="text-align:center">{{ $row['City'] }}</td>
			<td style="text-align:center">{{ $row['Debit'] }}</td>
			<td style="text-align:center">{{ $row['Credit'] }}</td>
		</tr>@endforeach<tr><td colspan="4" style="background-color:rgb(204, 204, 204); text-align:center"> </td>
			<td style="background-color:rgb(204, 204, 204); text-align:center"> </td>
		</tr></tbody></table><p> </p>

<p> </p>

<table align="center" border="1" cellpadding="1" cellspacing="1" style="background-color:rgb(255, 255, 255); width:400px"><tbody><tr><td colspan="1" style="background-color:rgb(204, 204, 204); text-align:center; width:100px">Rewards Point Summary</td>
		</tr><tr><td style="text-align:center">Opening Balance</td>
			<td style="text-align:center; width:50px">{{$OB}}</td>
		</tr><tr><td style="text-align:center">New Points Gained</td>
			<td style="text-align:center">{{$NP}}</td>
		</tr><tr><td style="text-align:center">Redeemed Points</td>
			<td style="text-align:center">{{$RP}}</td>
		</tr><tr><td colspan="3" style="background-color:rgb(204, 204, 204); text-align:center"> </td>
		</tr></tbody></table><p> </p>

<p> </p>

<p><img alt="" src="http://cards.banqueaudi.com/audi2007/erep/new_ch_stat_f.jpg" style="height:51px; margin-left:20px; margin-right:20px; width:900px"></p>

<p> </p></body></html>

				<style>
						#container{
							width: 960px;
							margin: 30px auto 0;
						}
				
						#header{
							overflow: hidden;
							padding: 0 0 30px;
							border-bottom: 5px solid #05B2D2;
							position: relative;
						}
				
						#headerLeft, #headerRight{
							width: 49%;
							overflow: hidden;
						}
				
						#headerLeft{
							float: left;
							padding: 10px 1px 1px;
						}
				
						#headerLeft h2, #headerLeft h3{
							text-align: right;
							margin: 0;
							overflow: hidden;
							font-weight: normal;
						}
				
						#headerLeft h2{
							font-family: "Arial Black",arial-black;
							font-size: 4.6em;
							line-height: 1.1;
							text-transform: uppercase;
						}
				
						#headerLeft h3{
							font-size: 2.3em;
							line-height: 1.1;
							margin: .2em 0 0;
							color: #666;
						}
				
						#headerRight{
							float: right;
							padding: 1px;
						}
				
						#headerRight p{
							line-height: 1.8;
							text-align: justify;
							margin: 0;
						}
				
						#headerRight p + p{
							margin-top: 20px;
						}
				
						#headerRight > div{
							padding: 20px;
							margin: 0 0 0 30px;
							font-size: 1.4em;
							color: #666;
						}
				
						#columns{
							color: #333;
							overflow: hidden;
							padding: 20px 0;
						}
				
						#columns > div{
							float: left;
							width: 50%;
						}
				
						#columns #column1 > div{
							margin-left: 1px;
						}
				
						#columns #column2 > div{
							margin-right: 1px;
						}
				
						#columns > div > div{
							margin: 0px 10px;
							padding: 10px 20px;
						}
				
						#columns blockquote{
							margin-left: 15px;
						}
				
					</style>
				