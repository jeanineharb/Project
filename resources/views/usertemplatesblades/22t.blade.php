@extends('app')@section('content')<html><body><hr><p style="text-align:center"><strong>Bank Audi</strong></p>

<p>Dear {{$title}}, {{$name}}.</p>

<p>Product : {{$product}}.</p>

<p>Currency : {{$currency}}</p>

<p>Account : {{$account}}</p>

<p> </p>

<table align="center" border="1" cellpadding="1" cellspacing="1" id="transaction" style="width:800px"><tbody><tr><td colspan="1" style="text-align: center; width: 200px; background-color: rgb(204, 204, 204);">Transaction Date</td>
			<td style="text-align: center; width: 300px; background-color: rgb(204, 204, 204);">Name</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center; width:150px">City</td>
			<td style="text-align: center; width: 100px; background-color: rgb(204, 204, 204);">Debit</td>
			<td style="text-align: center; width: 100px; background-color: rgb(204, 204, 204);">Credit</td>
		</tr>@foreach ($transaction as $row)<tr><td colspan="1" style="background-color:rgb(255, 255, 255); text-align:center">{{ $row['date'] }}</td>
			<td style="text-align:center">{{ $row['Name'] }}</td>
			<td style="text-align:center">{{ $row['City'] }}</td>
			<td style="text-align:center">{{ $row['Debit'] }}</td>
			<td style="text-align:center">{{ $row['Credit'] }}</td>
		</tr>@endforeach<tr><td colspan="5" style="background-color:rgb(204, 204, 204); text-align:center"> </td>
		</tr></tbody></table></body></html>

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
				@endsection