<?php
	require("config/config.php");
	require("lib/db.php");
	$conn=db_init($config["host"], $config["dbuser"], $config["dbpwd"], $config["dbname"]);
	$result=mysqli_query($conn, "SELECT * FROM momo");
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags(Bootstrap) -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="/bootstrap-4.0.0-beta/favicon.ico">

	<title>MOMO's Home</title>
	<link rel="stylesheet" type="text/css" href="/style.css?ver1">
	<!-- Bootstrap core CSS -->
	<link href="/bootstrap-4.0.0-beta/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom styles for album template -->
 	<link href="/bootstrap-4.0.0-beta/docs/4.0/examples/album/album.css" rel="stylesheet">
	<!-- Custom styles for carousel template -->
	<link href="/bootstrap-4.0.0-beta/docs/4.0/examples/carousel/carousel.css" rel="stylesheet">
</head>
<body id="target">
	<nav>
		<div class="collapse" style="background-color: gray;" id="navbarHeader">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 py-4">
						<h4 class="text-white">About Mo</h4>
						<p class="text-white">More you get to know about her, more you like her.</p>
					</div>
					<div class="col-sm-4 py-4">
						<h4 class="text-white">Menu</h4>
						<ul class="list-unstyled">
							<?php
								while($row=mysqli_fetch_assoc($result)){
									echo '<li><a class="text-white" href="/momo.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
								}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar navbar-light" style="background-color: #F8F8FF;">
			<div class="container d-flex justify-content-between">
				<a href="/momo.php" class="navbar-brand"><img src="/Entypo+/Entypo+/home.svg" width="30" height="30" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
		</div>
	</nav>

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		 <ol class="carousel-indicators">
			 <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			 <li data-target="#myCarousel" data-slide-to="1"></li>
			 <li data-target="#myCarousel" data-slide-to="2"></li>
		 </ol>
		 <div class="carousel-inner">
			 <div class="carousel-item active">
				 <img class="first-slide" src="img/shutterstock_411641347.jpg" alt="First slide">
				 <div class="container">
					 <div class="carousel-caption d-none d-md-block text-left">
						 <h1>Who is MOMO?</h1>
						 <br/>						 
						 <p><a class="btn btn-lg btn-light" href="momo.php?id=1" role="button">Find out now</a></p>
					 </div>
				 </div>
			 </div>
			 <div class="carousel-item">
				 <img class="second-slide" src="img/shutterstock_361685600.jpg" alt="Second slide">
				 <div class="container">
					 <div class="carousel-caption d-none d-md-block">
						 <h1>MOMO's Career</h1>			
						 <br/>			 
						 <p><a class="btn btn-lg btn-light" href="momo.php?id=2" role="button">Learn more</a></p>
					 </div>
				 </div>
			 </div>
			 <div class="carousel-item">
				 <img class="third-slide" src="img/shutterstock_247962964.jpg" alt="Third slide">
				 <div class="container">
					 <div class="carousel-caption d-none d-md-block text-right">
						 <h1>MOMO's Personal Life</h1>		
						 <br/>				 
						 <p><a class="btn btn-lg btn-light" href="momo.php?id=3" role="button">Browse gallery</a></p>
					 </div>
				 </div>
			 </div>
		 </div>
		 <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
			 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			 <span class="sr-only">Previous</span>
		 </a>
		 <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
			 <span class="carousel-control-next-icon" aria-hidden="true"></span>
			 <span class="sr-only">Next</span>
		 </a>
	 </div>

	 			<div class="container marketing">
					<article>
						
						<?php
						
							if(empty($_GET['id']) === false){
								$sql='SELECT * FROM momo WHERE id='.$_GET['id'];
								$result=mysqli_query($conn, $sql);
								$row=mysqli_fetch_assoc($result);
								echo '<h2>'.htmlspecialchars($row['title']).'</h2>';

								//작성자와 본문 추가 가능
								//htmlspecialchars 로 모든 태그 무력화 - 코드를 그대로 화면에 출력
								//strip_tags 로 html 및 php 태그만 허용 - 뒤에 허용 원하는 태그 포함 가능
								//echo '<p>'.htmlspecialchars($row['author']).'</p>';
								//echo strip_tags($row['description'].'<a><h1><h2><h3><h4><h5><ul><ol><li>');
							}
							
							if(empty($_GET['id']) === false){
								echo file_get_contents($_GET['id'].".txt");
							}
							
						?>
						
						<hr class="featurette-divider">

						 <div class="row featurette">
							 <div class="col-md-7">
								 <h2 class="featurette-heading">Adventurer - <span class="text-muted">Always seeking for new adventures.</span></h2>
								 <p class="lead">“Life is either a daring adventure or nothing at all.” </p>
							 </div>
							 <div class="col-md-5">
								 <img class="featurette-image img-fluid mx-auto" src ="img/kyoto.png" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
							 </div>
						 </div>

						 <hr class="featurette-divider">

						 <div class="row featurette">
							 <div class="col-md-7 order-md-2">
								 <h2 class="featurette-heading">Learner - <span class="text-muted">Always learning for myself.</span></h2>
								 <p class="lead">“The more I read, the more I acquire, the more certain I am that I know nothing.”</p>
							 </div>
							 <div class="col-md-5 order-md-1">
								 <img class="featurette-image img-fluid mx-auto" src ="img/piano.jpg" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
							 </div>
						 </div>

						 <hr class="featurette-divider">

						 <div class="row featurette">
							 <div class="col-md-7">
								 <h2 class="featurette-heading">Challenger - <span class="text-muted">Always challenging for a better life.</span></h2>
								 <p class="lead">“I've got the key to my castle in the air, but whether I can unlock the door remains to be seen.”</p>
							 </div>
							 <div class="col-md-5">
								 <img class="featurette-image img-fluid mx-auto" src ="img/dolphin.jpg" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
							 </div>
						 </div>

						 <hr class="featurette-divider">

						 <!-- /END THE FEATURETTES -->


						 <!-- FOOTER -->
						 <footer>
							 <p class="float-right"><a href="#">Back to top</a></p>
							 <p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
						 </footer>

							<script>
							// chat //
							var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
								(function(){
							var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
							s1.async=true;
							s1.src='https://embed.tawk.to/598c63de1b1bed47ceb03f35/default';
							s1.charset='UTF-8';
							s1.setAttribute('crossorigin','*');
							s0.parentNode.insertBefore(s1,s0);
							})();
							// chat //
							</script>

					 </article>
				 </div>

			 <!-- Bootstrap core JavaScript
	     ================================================== -->
	     <!-- Placed at the end of the document so the pages load faster -->
	     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	     <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
	     <script src="/bootstrap-4.0.0-beta/assets/js/vendor/popper.min.js"></script>
	     <script src="/bootstrap-4.0.0-beta/dist/js/bootstrap.min.js"></script>
	     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	     <script src="/bootstrap-4.0.0-beta/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
