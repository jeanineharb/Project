<html>
	<head>
		<title>Xpedit</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  		<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #909090;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 130px;
				margin-bottom: 1px;
			}

			.quote {
				font-size: 24px;
				margin-bottom: 30px;
				letter-spacing: 2px;
			}

			.version{
				position: absolute;
    			bottom: 10px;
    			left: 40%;
    			right: 40%;
    			text-align: center;
    		}
		</style>
	</head>
	<body>
	
		<div class="container">
			<div class="content">
				<div class="title">Xpedit</div>
				<div class="quote">Where mail expeditions begin</div>
				<p> <a class="btn btn-default btn-block" href="{{ url('/about') }}" style="font-size: 18px; font-weight: 900;"> Learn more </a> </p>
				<p> <a class="btn btn-primary" href="{{ url('/auth/register') }}" style="font-size: 18px; width: 48.5%; margin-right: 7px;"> Register </a> 
					<a class="btn btn-default" href="{{ url('/auth/login') }}" style="font-size: 18px; width: 48.5%;"> Login </a> </p>
				<div class="version">version   1.0.0</div>
		</div>
	</body>
</html>
