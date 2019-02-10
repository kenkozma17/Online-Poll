<?php 
include '404.php';
include 'database/dbh.php';
include 'database/dbh2.php';

$id = $_GET['id'];

if($id == 0){
	$range1 = 1;
	$range2 = 5;
} elseif($id == 1){
	$range1 = 6;
	$range2 = 10;
} elseif($id == 2){
	$range1 = 11;
	$range2 = 15;
} elseif($id == 3){
	$range1 = 16;
	$range2 = 20;
} elseif($id == 4){
	$range1 = 21;
	$range2 = 25;
} elseif($id == 5){
	$range1 = 26;
	$range2 = 30;
}

$sql = "SELECT * FROM quiz WHERE id BETWEEN $range1 AND $range2";
$result = $db->query($sql);

$towns = array("Virac", "San Andres", "Bato", "Baras", "Bagamanoc", "Caramoran", "Gigmoto", "Pandan", "Panganiban", "San Miguel", "Viga");

$surveys = array
	(
	array("Can we guess your celebrity crush?"),
	array("What date will you find your true love?"),
	array("How many more days until you die?"),
	array("Where will you live in 2 years?"),
	array("How many kids will you have?"),
	array("What will your cause of death be?")
	);




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
			<!-- WEB PAGE CONTAINER -->
		<div class="container-fluid"><br/><br/><br/>
		<p><a href='http://surveyislandph.cf'>Back</a></p>

			<!-- POLL TITLE -->
			<div class="row-fluid qTitle">
				<p class="h1"><?php echo $surveys[$id][0] ?></p>
			</div><br/>
			<!-- END POLL TITLE -->

			<form class="creds" action="result.php?id=<?php echo $id ?>&range1=<?php echo $range1 ?>&range2=<?php echo $range2 ?>" method="POST">
				<div class="container values">
				  <div class="form-row">
				    <div class="form-group col-md-5">
				      <label for="name">Full Name</label>
				      <input type="text" class="form-control"  id="name" name="name" required>
				    </div>
				    <div class="form-group col-md-2">
				      <label for="age">Age</label>
				      <input type="number" class="form-control" id="age" name="age" min="18" max="100">
				    </div>
				    <div class="form-group col-md-2">
				      <label for="gender">Gender</label>
				      <select id="gender" class="form-control" name="gender">
				      	<option>Male</option>
				      	<option>Female</option>
				      </select>
				    </div>
				    <div class="form-group col-md-3">
				      <label for="location">Location</label>
				      <select id="location" class="form-control" name="location">
				      <?php for($y = 0; $y < sizeof($towns); $y++): ?>
				        <option><?php echo $towns[$y] ?></option>
				      <?php endfor; ?>
				      </select>
				    </div>
				  </div>
				 </div>
			

			<?php $x = 0; while($row = $result->fetch_array()): ?>
				<!-- INDIVIDUAL QUESTION ROW -->
				<div class="container">
					<div class="row question">
					  	<div class="card">
						  <div class="card-body">
						    <h5 class="card-title"><?php echo $row["question"] ?></h5>
						    <input type="hidden" value="<?php echo $row['question'] ?>" name="q<?php echo $x ?>" />
						    <input type="hidden" name="surveytitle" value="<?php echo $surveys[$id][0] ?>" />
						    <p class="card-text"></p>
						    <div class="btn-group btn-group-toggle" data-toggle="buttons">
							  <label class="btn btn-secondary">
							    <input type="radio" name="options<?php echo $x ?>" id="option" autocomplete="off" value='<?php echo $row['op1']; ?>' required /> <?php echo $row['op1'] ?>
							  </label>
							  <label class="btn btn-secondary">
							    <input type="radio" name="options<?php echo $x ?>" id="option" autocomplete="off" value='<?php echo $row['op2']; ?>' required /> <?php echo $row['op2'] ?>
							  </label>
							  <label class="btn btn-secondary">
							    <input type="radio" name="options<?php echo $x ?>" id="option" autocomplete="off" value='<?php echo $row['op3']; ?>' required /> <?php echo $row['op3'] ?>
							  </label>
							  <label class="btn btn-secondary">
							    <input type="radio" name="options<?php echo $x ?>" id="option" autocomplete="off" value='<?php echo $row['op4']; ?>' required /> <?php echo $row['op4'] ?>
							  </label>
							</div>
						  </div>
					  </div>
					</div>
				</div><br/>
				<!-- END INDIVIDUAL QUESTION ROW -->
			<?php $x++; endwhile;  ?>
			<div class="container btncon">
				<input class="btn btn-primary submit" type="submit" value="Submit" name="submit"><br/><br/>
			</div>
			</form>
		</div>
		<!-- END WEB PAGE CONTAINER -->

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script>
			$( "#name" ).keypress(function(e) {
                    var key = e.keyCode;
                    if (key >= 48 && key <= 57) {
                        e.preventDefault();
                    }
                });
		</script>
	</body>
</html>