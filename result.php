<?php 
include 'database/dbh.php';
include 'database/dbh2.php';

if(isset($_POST['submit'])){	
	
	/*
	*INSERT VALUES INTO DATABASE
	*/
	
	$name 			= $_POST['name'];
	$age 			= $_POST['age'];
	$location		= $_POST['location'];
	$gender			= $_POST['gender'];
	$surveytitle	= $_POST['surveytitle'];

	for($x = 0; $x < 5; $x++){
		 $questions[$x] = $_POST['q'."$x"];
		 $answers[$x] = $_POST['options'."$x"];
	}


	
	$query 	= $db->query("INSERT INTO answered (name, age, gender, location, q1, a1, q2, a2, q3, a3, q4, a4, q5, a5) VALUES ('$name', '$age', '$gender', '$location', '$questions[0]', '$answers[0]', '$questions[1]', '$answers[1]', '$questions[2]', '$answers[2]', '$questions[3]', '$answers[3]', '$questions[4]', '$answers[4]')");

	
	/*
	*END INSERT VALUES INTO DATABSE
	*/	

	if($surveytitle == "Can we guess your celebrity crush?"){
		$number = rand(0, 4);

		$results = array (
		array("anne-curits.png", "kim.png", "manny-pacquiao-mommy-d.jpg", "MarianRivera.jpg", "Palaboy.jpg")
		);

		$textResults = array (
		array("Your celebrity crush is Anne Curtis!", "Your celebrity crush is Kuya Kim!", "Your celebrity is Mommy D!", "Your celebrity crush is Marian Rivera!", "Your celebrity crush is Moy Moy Palaboy!")
		);

		$final = '<div id="result">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title"><div class="fb-share-button" data-href="http://surveyislandph.cf/index.php" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsurveyislandph.cf%2Findex.php&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div></h5> 
		      </div>
		      <div class="modal-body">
		        <p>'.$textResults[0][$number].'</p>
		        <img id="image" src=images/celebs/'.$results[0][$number].' /> 
		      </div>
		    </div>
		  </div>
		</div>';

		echo $final;
	}

	elseif($surveytitle == "What date will you find your true love?"){
		$random 	= rand(0, 11);
		$year 		= rand(2019, 2025);
		$month 		= array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$day 		= rand(1, 30);

		$final = '<div id="result">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title"><div class="fb-share-button" data-href="http://surveyislandph.cf/index.php" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsurveyislandph.cf%2Findex.php&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div></h5> 
		      </div>
		      <div class="modal-body" style="text-align: center">
		        <h2>You will find your true love on...<br><span>'.$month[$random].' '.$day.', '.$year.'</span></h2>
		      </div>
		    </div>
		  </div>
		</div>';

		echo $final;

	}

	elseif($surveytitle == "How many more days until you die?"){
		$random 	= rand(5, 365);

		$final = '<div id="result">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title"><div class="fb-share-button" data-href="http://surveyislandph.cf/index.php" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsurveyislandph.cf%2Findex.php&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div></h5> 
		      </div>
		      <div class="modal-body" style="text-align: center">
		        <h2>You have exactly <br> '.$random.' days to live!</h2>
		      </div>
		    </div>
		  </div>
		</div>';

		echo $final;
	}

	elseif($surveytitle == "Where will you live in 2 years?"){
		$random 		= rand(0, 13);
		$locations		= array("with your parents", "ith your girlfriend", "with your boyfriend", "alone in your mansion", "outside of 7-11", "in your own apartment", "in Miami", "in Makati", "in the same place you live now", "in Manila", "in Singapore", "in Cavite", "in the USA", "anywhere you want");

		$final = '<div id="result">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title"><div class="fb-share-button" data-href="http://surveyislandph.cf/index.php" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsurveyislandph.cf%2Findex.php&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div></h5> 
		      </div>
		      <div class="modal-body" style="text-align: center">
		        <h2>In 2 years, you will live '.$locations[$random].'! </h2>
		      </div>
		    </div>
		  </div>
		</div>';

		echo $final;
	}

	elseif($surveytitle == "How many kids will you have?"){
		$random		= rand(0, 8);

		$final = '
		<div id="result">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title"><div class="fb-share-button" data-href="http://surveyislandph.cf/index.php" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsurveyislandph.cf%2Findex.php&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div></h5> 
		      </div>
		      <div class="modal-body" style="text-align: center">
		        <h2>You will have <b>'.$random.' kid(s)</b> in your life!</h2>
		      </div>
		    </div>
		  </div>
		</div>';

		echo $final;
	}

	elseif($surveytitle == "What will your cause of death be?"){
		$causes		= array("Accidentally shot yourself", "Throwing yourself against the floor", "Old age", "Monkey attack", "Using your phone while walking across the street", "Killed by a robot", "Cutting your jugular while shaving", "Falling off a building", "Trip over your beard", "Died of laughter", "Drinking too much carrot juice", "Drowning", "Hit by a bus", "Bit by a rabbit");
		
		$random 	= rand(0, sizeof($causes) - 1);
		$results    = $causes[$random];

		$final = '
		<meta property="og:title"         content="Survey Island" />
        <meta property="og:description"   content="one" />
		<div id="result">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title"><div class="fb-share-button" data-href="http://surveyislandph.cf/index.php" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsurveyislandph.cf%2Findex.php&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div></h5> 
		      </div>
		      <div class="modal-body" style="text-align: center">
		        <h2>Your cause of death will be: <br> '.$results.'</h2>
		      </div>
		    </div>
		  </div>
		</div>';

		echo $final;
	}


}



?>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
