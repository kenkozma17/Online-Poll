<?php 
include 'database/dbh.php';
include 'database/dbh2.php';

$sql		= "SELECT * FROM users INNER JOIN answered_survey ON users.user_id = answered_survey.user_id";	
$result 	= $db->query($sql);

$questions	=	mysqli_query($conn, "SELECT * FROM questions");


?>

<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	    <meta name="description" content="" />
	    <meta name="author" content="" />
	    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	    <link rel="stylesheet" href="css/style.css" />
	</head>
		<body>
		<h1>POLL RESULTS</h1>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Submission Time</th>
		      <th scope="col">User IP</th>
		      <th scope="col">Full Name</th>
		      <th scope="col">Age</th>
		      <th scope="col">Gender</th>
		      <th scope="col">Location</th>
		      <?php while($row1 = $questions->fetch_assoc()):  ?>
		      <th scope="col"><?php echo $row1['question'] ?></th>
		  	  <?php endwhile; ?>
		    </tr>
		  </thead>
		  <tbody>
		 	<?php while($row = $result->fetch_assoc()): ?>
		    <tr>
		      <th scope="row"><?php echo $row['time'] ?></th>
		      <td><?php echo $row['user_ip'] ?></td>
		      <td><?php echo $row['name'] ?></td>
		      <td><?php echo $row['age'] ?></td>
		      <td><?php echo $row['gender'] ?></td>
		      <td><?php echo $row['location'] ?></td>
		      <?php for($x = 1; $x < 31; $x++): ?>
		      <td><?php echo $row['q'."$x"] ?></td>
		      <?php endfor; ?>
		    </tr>
			<?php endwhile; ?>
		  </tbody>
		</table>
	</body>
</html>