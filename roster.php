<!DOCTYPE HTML>
<html lang="en">
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
		<link rel="stylesheet" href="css/magic-bootstrap-min.css" />
		<link rel="stylesheet" href="css/main.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<title>Louisiana Tech Hockey | Roster</title>
	</head>
	
	<body class="techBlue">
		<div class="container">
			<div class="row techBlue" >
				<div class="col-sm-6">
					<a href="index.html"><img class="img-responsive" src="img/HeaderImage.png" height="300px"/></a>
				</div>
				<!--Display social media buttons on desktop. Hide on mobile-->
				<div class="col-sm-4 col-sm-offset-2 socialMediaButtons hidden-xs" align="right">
						<a href="#"><img class="img-responsive" src="img/youtube.png"></a>
						<a href="#"><img class="img-responsive" src="img/instagram.png"></a>
						<a href="https://twitter.com/LATECHHOCKEY"><img class="img-responsive" src="img/twitter.png" ></a>
						<a href="https://www.facebook.com/pages/Louisiana-Tech-Hockey/343026243856"><img class="img-responsive" src="img/facebook.png"></a>
				</div>
			</div>
			<div class="row techWhite">
				 
				<header class="navbar navbar-default" role="banner">
					<div class="navbar-header">
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<nav class="collapse navbar-collapse nav-tabs" role="navigation">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">The Team<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li class="menu-item"><a href="roster.php">Roster</a></li>
									<li class="menu-item"><a href="#">Player Bios</a></li>
									<li class="menu-item"><a href="#">Alumni</a></li>
								</ul>
							</li>
							<li>
								<a href="#">News</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Schedule<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li class="menu-item"><a href="#">Team Schedule</a></li>
									<li class="menu-item"><a href="#">Upcoming Events</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Standings</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Statistics<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li class="menu-item"><a href="#">Team Statistics</a></li>
									<li class="menu-item"><a href="#">Player Statistics</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Media</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">About<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li class="menu-item"><a href="#">Administrative Staff</a></li>
									<li class="menu-item"><a href="#">Team History</a></li>
									<li class="menu-item"><a href="#">Sponsors</a></li>
						</ul>
					</nav>
				</header>
			</div>
			<!-- Content --> 
			<div class="row techWhite">
				<div class="col-md-12 roster">
					<h1 font-family="sans">Team Roster</h1>
					<p></p>
					
					<div class="dropdown yearSelector">
						<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
							Select a year
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li role="presentation"><a role="menu-item" tabindex="-1" href="#">2014-2015</a></li>
							<li role="presentation"><a role="menu-item" tabindex="-1" href="#">2013-2014</a></li>
							<li role="presentation"><a role="menu-item" tabindex="-1" href="#">2012-2013</a></li>
							<li role="presentation"><a role="menu-item" tabindex="-1" href="#">2011-2012</a></li>
							<li role="presentation"><a role="menu-item" tabindex="-1" href="#">2010-2011</a></li>
						</ul>
					</div>
					<table class="table roster">
						<thead>
							<tr>
								<th>#</th><th>NAME</th><th>POS</th><th>SHOOTS</th><th>HEIGHT</th><th>WEIGHT</th><th>CLASS</th><th>MAJOR</th><th>HOMETOWN</th>
							</tr>
						</thead>
						<tbody>
							<tr id="loading">
								<td colspan="9">
									<h2 style="text-align: center;">Loading Data...</h2>
									<div class="progress">
										<div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
											<span class="sr-only">Loading Data</span>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Footer -->
			<!--Display the Bulldogs Hockey Logo on desktop-->
			<div class="row techBlue footer hidden-xs">  
				<img src="img/BulldogsHockeyLogo.png" class="center-block" height="100px"/>
			</div>
			<!--Display the social media buttons on the bottom on mobile-->
			<div class="row">
				<div class="techBlue hidden-lg hidden-md hidden-sm col-xs-12">
					<div class="socialMediaButtonsBottom center-block">
						<a href="https://www.facebook.com/pages/Louisiana-Tech-Hockey/343026243856"><img src="img/facebook.png"/></a>
						<a href="https://twitter.com/LATECHHOCKEY"><img src="img/twitter.png" /></a>
						<a href="#"><img src="img/instagram.png"/></a>
						<a href="#"><img src="img/youtube.png"/></a>
					</div>
				</div>
			</div>
		</div>
		<script>
		
			$.ajax({
				url: "lib/GetStats.php",
				type: "GET",
				success: function(data, textStatus, jqXHR)
				{
					$("#loading").remove();
					
					$.each(data, function(index){
						
						$("table.roster").append
						(
							"<tr><td>" + data[index].number + "</td>"+
							"<td>"+ data[index].lname + ", " + data[index].fname + "</td>" +
							"<td>" + data[index].position + "</td>" + 
							"<td>" + data[index].shoots + "</td>" +
							"<td>" + data[index].height + "</td>" +
							"<td>" + data[index].weight + "</td>" +
							"<td>" + data[index].year + "</td>" +
							"<td>" + data[index].major + "</td>" +
							"<td>" + data[index].hometown + "</td>"
						);
						
					});
				}
			});
			
		</script>
	</body>
</html>