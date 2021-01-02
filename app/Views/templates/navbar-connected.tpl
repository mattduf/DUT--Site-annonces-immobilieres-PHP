<head>
	<link rel="stylesheet" href="../../../css/navbar.css">
</head>

	<div class="topnav" id="myTopnav">
		<a href="/" id="logo-navbar"><img src="../../../images/logo.png"></a>
		<a href="/Annonces"><i class="fas fa-search"></i> Rechercher <span class="toHide">une annonce</span></a>
		<a href="/Ajouter-une-annonce" id="lien-ajouter"><i class="far fa-plus-square"></i> Ajouter <span class="toHide">une annonce</span></a>
		<div class="topnav-right">
			<a href="/Mon-compte"><i class="fas fa-user"></i> Mon&nbspcompte</a>
			<a href="/Deconnexion"><i class="fas fa-sign-out-alt"></i> Se&nbspdéconnecter</a>
		</div>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>

	<script>
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