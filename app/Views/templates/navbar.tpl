<head>
	<link rel="stylesheet" href="../../../css/navbar.css">
</head>

	<div class="topnav" id="myTopnav">
		<a href="/" id="logo-navbar"><img src="../../../images/logo.png"></a>
		<a href="/Annonces"><i class="fas fa-search"></i> Rechercher une annonce</a>
		<div class="topnav-right">
			<a href="/Connexion"><i class="fas fa-sign-in-alt"></i> Se&nbspconnecter</a>
		</div>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>

	<script>
		//JS pour rendre la navbar responsive
		//Source : https://www.w3schools.com/howto/howto_css_topnav_right.asp
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
				x.className += " responsive";
			} else {
				x.className = "topnav";
			}
		}
	</script>

<body>