<html><body><h2>Hola {{$title}} {{$name}}!</h2>

<p>Lorem ipsum dolor sit amet dolor duis blandit vestibulum faucibus a, tortor.</p>

<table border="1" cellpadding="1" cellspacing="1" id="notes" style="width:500px"><tbody><tr><th>Nom</th>
			<th>Notes</th>
		</tr>@foreach ($notes as $row)<tr><td>{{ $row['Nom'] }}</td>
			<td>{{ $row['Note'] }}</td>
		</tr>@endforeach</tbody></table><p> </p></body></html>
