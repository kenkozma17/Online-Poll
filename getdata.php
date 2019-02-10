<?php 
include 'database/dbh.php';
include 'database/dbh2.php';

if(isset($_POST['submit'])){

	$name 		= $_POST['name'];
	$age 		= $_POST['age'];
	$location	= $_POST['location'];
	$gender		= $_POST['gender'];

	for($x = 0; $x < 30; $x++){
		$answers[$x] = $_POST['options'."$x"];
	}

	
	$externalContent = file_get_contents('http://checkip.dyndns.com/');
	preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
	$externalIp = $m[1];

	$query0 	= $db->query("INSERT INTO users (name, age, location, gender, user_ip) VALUES ('$name', '$age', '$location', '$gender', '$externalIp')");

	$sql1 		= "SELECT * FROM users ORDER BY user_id DESC LIMIT 1";
	$result1 	= $db->query($sql1);
	$row1 		= $result1->fetch_assoc();

	$user_id 	= $row1['user_id'];

	$query2 	= $db->query("INSERT INTO answered_survey (user_id, age, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15, q16, q17, q18, q19, q20, q21, q22, q23, q24, q25, q26, q27, q28, q29, q30, user_ip) VALUES ('$user_id', '$age', '$answers[0]', '$answers[1]', '$answers[2]', '$answers[3]', '$answers[4]', '$answers[5]', '$answers[6]', '$answers[7]','$answers[8]','$answers[9]','$answers[10]','$answers[11]','$answers[12]','$answers[13]','$answers[14]','$answers[15]','$answers[16]','$answers[17]','$answers[18]','$answers[19]','$answers[20]','$answers[21]','$answers[22]','$answers[23]','$answers[24]','$answers[25]','$answers[26]','$answers[27]','$answers[28]','$answers[29]', '$externalIp')");

	


} ?>

<head>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />


<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thank You!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Message for taking survey</p>
            </div>
            <div class="modal-footer">
                <a href="http://www.google.com">Close</a>
            </div>
        </div>
    </div>
</div>

