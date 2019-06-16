<?php 
session_start();
?>
<div class="headerIN">
	<img src="../resources/logos/citm_logo.png" class="citm_logo">
	<div class='ini_ses'>
	<?php
		if ($_SESSION["id"]>0) {
			echo "<div class='log_ses' onclick='logout()'><span class='text-out'>SORTIR</span><img src='../resources/logos/logOut_logo.png' class='logOut_logo'></div>";
		}else{
			echo "<div class='log_ini' onclick='openCloseSign()'><span class='fa-stack'><i class='fa fa-user fa-stack-1x ini'></i></span>Campus<span class='fa-stack'><i class='fa fa-caret-down fa-stack-1x ini'></i></span></div>";
		}
	?>
	</div>
	<div class="redes">
		<ul>
			<li>
				<a href="https://twitter.com/CITM_UPC" target="_blank">
					<span class="fa-stack">
					  <i class="fa fa-circle fa-stack-2x"></i>
					  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
					</span>
				</a>
			</li>
			<li>
				<a href="https://www.facebook.com/CITM.UPC/" target="_blank">
					<span class="fa-stack">
					  <i class="fa fa-circle fa-stack-2x"></i>
					  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
					</span>
				</a>
			</li>
			<li>
				<a href="https://www.instagram.com/citm_upc/" target="_blank">
					<span class="fa-stack">
					  <i class="fa fa-circle fa-stack-2x"></i>
					  <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
					</span>
				</a>
			</li>
			<li>
				<a href="https://vimeo.com/citm" target="_blank">
					<span class="fa-stack">
					  <i class="fa fa-circle fa-stack-2x"></i>
					  <i class="fa fa-vimeo fa-stack-1x fa-inverse"></i>
					</span>
				</a>
			</li>
			<li>
				<a href="https://www.youtube.com/user/09CANALCITM" target="_blank">
					<span class="fa-stack">
					  <i class="fa fa-circle fa-stack-2x"></i>
					  <i class="fa fa-youtube-play fa-stack-1x fa-inverse"></i>
					</span>
				</a>
			</li>
			<li>
				<a href="https://www.linkedin.com/school/centre-de-la-imatge-i-la-tecnologia-multim-dia-upc-/" target="_blank">
					<span class="fa-stack">
					  <i class="fa fa-circle fa-stack-2x"></i>
					  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
					</span>
				</a>
			</li>
			<li>
				<a href="https://www.flickr.com/photos/citmupc/" target="_blank">
					<span class="fa-stack">
					  <i class="fa fa-circle fa-stack-2x"></i>
					  <i class="fa fa-flickr fa-stack-1x fa-inverse"></i>
					</span>
				</a>
			</li>
		</ul>
	</div>
	<div id="form-ini" class="formulario" style="display: none;">
		<form class="formulario_ini" method="post" action="../php/revacceso.php">
			<input id="username" type="text" name="username" placeholder="Usuari" autocapitalize="off" autocorrect="off">
			<input id="password" type="password" name="password" placeholder="Contrasenya" autocapitalize="off" autocorrect="off">
			<input type="submit" name="submit" value="Entrar" id="submit">
		</form>
	</div>
</div>
