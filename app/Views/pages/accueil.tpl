	<article>
		<section id="cartes-section">
			
			{foreach $annonce as $a}
			<div class="carte grow">
				<div class="annonce-image">
					<img src="../../../images/annonces/1.png" class="img-responsive">
					
				</div>
				<div class="annonce-description">
					<span>{$a.A_titre}</span>
					<span>{$a.A_cout_loyer}</span>
					<span>{$a.A_superficie}</span>
				</div>
			</div>
			{/foreach}
			
			<!--
			<div class="carte grow">
				<div class="annonce-image">
					<img src="../../../images/annonces/1.png" class="img-responsive">
				</div>
				<div class="annonce-description">
					
				</div>
			</div>

			<div class="carte grow">
				<div class="annonce-image">
					<img src="../../../images/annonces/2.jpg" class="img-responsive">
				</div>
				<div class="annonce-description">
					
				</div>
			</div>

			<div class="carte grow">
				<div class="annonce-image">
					<img src="../../../images/annonces/3.png" class="img-responsive">
				</div>
				<div class="annonce-description">
					
				</div>
			</div>

			<div class="carte grow">
				<div class="annonce-image">
					<img src="../../../images/annonces/4.jpg" class="img-responsive">
				</div>
				<div class="annonce-description">
					
				</div>
			</div>

			<div class="carte grow">
				<div class="annonce-image">
					<img src="../../../images/annonces/5.jpg" class="img-responsive">
				</div>
				<div class="annonce-description">
					
				</div>
			</div>

			<div class="carte grow">
				<div class="annonce-image">
					<img src="../../../images/annonces/6.jpg" class="img-responsive">
				</div>
				<div class="annonce-description">
					
				</div>
			</div>
			-->

			<a href="/Annonces"><div id="carte-deux" class="decrease">
				Parcourir toutes les annonces <i class="far fa-eye"></i>
			</div></a>
		</section>
	</article>