<html><body><h2>Hi <span>{{$title}} <span>{{$name}}</span></span></h2>

<table border="1" cellpadding="1" cellspacing="1" id="notes" style="width:500px"><tbody><tr><th>Nom</th>
			<th>Notes</th>
		</tr>@foreach ($notes as $row)<tr><td>{{ $row['Nom'] }}</td>
			<td>{{ $row['Note'] }}</td>
		</tr>@endforeach</tbody></table><p> </p></body></html>
