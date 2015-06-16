<html><body><h2>My Template!</h2>

<p>Hi {{$name}},{{$asdd}} {{$er}} {{$aer}}</p>

<p> </p>

<table border="1" cellpadding="1" cellspacing="1" id="notes" style="width:500px"><tbody><tr><th style="text-align:center">Nom</th>
			<th style="text-align:center">Notes</th>
		</tr>@foreach ($notes as $row)<tr><td style="text-align:center">{{ $row['nom'] }}</td>
			<td style="text-align:center">{{ $row['note'] }}</td>
		</tr>@endforeach<tr><td style="text-align:center"> </td>
			<td style="text-align:center"> </td>
		</tr></tbody></table><p> </p></body></html>
