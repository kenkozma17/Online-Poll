<html>
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	    <link rel="stylesheet" href="css/style.css" />
	    <style>
	    	body {
	    		margin: 0 auto;
	    		width: 80%;
	    		height: 100%;
				background: repeating-linear-gradient(to top, #ffffff, #87cefa);
				}

			.container {
				width: 50%;
				margin-top: 100px;
			}

			ul {
				text-align: center;
			}

			h1 {
				text-align: center;
			}

			li:hover {
				background: #87cefa;
				cursor: pointer;
			}

			a {
				text-decoration: none;
			}
	    </style>
	</head>
	<body>

		<nav class="nav">
		  <a class="nav-link disabled" href="#">Survey Central</a>
		</nav>

		<div class="container">	
			<h1>Quizzes</h1>
			<ul class="list-group">
			  <li class="list-group-item"><a href="http://surveyislandph.cf/survey.php?id=0">Can we guess your celebrity crush?</a></li>
			  <li class="list-group-item"><a href="http://surveyislandph.cf/survey.php?id=1">What date will you find your true love?</a></li>
			  <li class="list-group-item"><a href="http://surveyislandph.cf/survey.php?id=2">How many more days until you die?</a></li>
			  <li class="list-group-item"><a href="http://surveyislandph.cf/survey.php?id=3">Where will you live in 2 years?</a></li>
			  <li class="list-group-item"><a href="hhttp://surveyislandph.cf/survey.php?id=4">How many kids will you have?</a></li>
			  <li class="list-group-item"><a href="http://surveyislandph.cf/survey.php?id=5">What will your cause of death be?</a></li>
			</ul>
		</div>

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