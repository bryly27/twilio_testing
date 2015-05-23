<html>
<head>
	<title>Twilio Test</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
</head>
<body>	
	<div class='container'>
		
		<h1>Users</h1>

		<table class='table table-striped'>
			<thead>
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Pin #</th>
				</tr>
			</thead>
			<tbody>
<?php  
				foreach($users as $user)
				{ ?>
					<tr>
						<td><?= $user['id'] ?></td>
						<td><?= $user['first_name'] ?></td>
						<td><?= $user['last_name'] ?></td>
						<td><?= $user['email'] ?></td>
						<td><?= $user['pin'] ?></td>
					</tr>	
<?php		} ?>
			</tbody>

		</table>

		<h1>Surveys</h1>
		<table class='table table-striped'>
			<thead>
				<tr>
					<th>Survey ID</th>
					<th>Rating</th>
					<th>User ID</th>
				</tr>
			</thead>
			<tbody>
<?php  
				foreach($surveys as $survey)
				{ ?>
					<tr>
						<td><?= $survey['id'] ?></td>
						<td><?= $survey['rating'] ?></td>
						<td><?= $survey['user_id'] ?></td>
					</tr>
<?php		} ?>
			</tbody>



		</table>




	</div>



</body>
</html>