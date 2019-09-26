<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Notification</title>
</head>
<body>
    
	<h1>Today's Birthdays and Anniversaries.</h1>
	@if($birthdays !== 'no_bday_data')
		<hr>
		<table border="1" cellpadding="15" cellspacing="15" rules="all">
			<thead>
				<tr>
					<th>Birthdays</th>
				</tr>
			</thead>
			<tbody>
				@foreach($birthdays as $b => $birthday)
				<tr>
					<th>Name: {{$birthday->fname}} {{$birthday->lname}}</th>
				</tr>
				@endforeach
			</tbody>
		</table>
	@endif

	@if($anniverseries !== 'no_anni_data')
		<hr>
		<table border="1" cellpadding="15" cellspacing="15" rules="all">
			<thead>
				<tr>
					<th>Anniversaries</th>
				</tr>
			</thead>
			<tbody>
				@foreach($anniverseries as $a => $anniversery)
				<tr>
					<th>Name: {{$anniversery->fname}} {{$anniversery->lname}}</th>
				</tr>
				@endforeach
			</tbody>
		</table>
	@endif

	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>