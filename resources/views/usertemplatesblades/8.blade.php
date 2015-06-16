<html><body><h2>My Template! {{$title}} {{$name}}</h2>

<table border="1" cellpadding="1" cellspacing="1" id="notes" style="width:500px"><tbody><tr><th> </th>
			<th> </th>
		</tr>@foreach ($notes as $row)<tr><td>{{ $row['Nom'] }}</td>
			<td>{{ $row['Note'] }}</td>
		</tr>@endforeach</tbody></table><p> </p></body></html>
