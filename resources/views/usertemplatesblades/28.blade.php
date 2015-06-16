<html><body><h2>HI Mr {{$name}}, {{$tes}}</h2>

<p> </p>

<table border="1" cellpadding="1" cellspacing="1" id="notes" style="width:500px"><tbody><tr><th>Nom</th>
			<th>Note</th>
		</tr>@foreach ($notes as $row)<tr><td>{{ $row['note'] }}</td>
			<td> </td>
		</tr>@endforeach</tbody></table><p> </p></body></html>
