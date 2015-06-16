<html><body><h2>My Template!</h2>

<p>Hi {{$title}} {{$name}}</p>

<p> </p>

<table align="center" border="1" cellpadding="1" cellspacing="1" id="notes" style="width:500px"><tbody><tr><th style="text-align: center;"><u><strong>Nom</strong></u></th>
			<th style="text-align: center;"><u><strong>Note</strong></u></th>
		</tr>@foreach ($notes as $row)<tr><td>{{ $row['nom'] }}</td>
			<td>{{ $row['note'] }}</td>
		</tr>@endforeach</tbody></table><p> </p></body></html>
