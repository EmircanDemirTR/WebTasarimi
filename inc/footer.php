			<footer class="page-footer"><img class="section--bg b0 r0" src="img/footer-bg.png" alt="bg"/>

				<div class="container">

					<div class="row">

						<div class="col-md-6 col-lg-4">

							<h6 class="page-footer__title title--white">Site Map</h6>

							<ul class="page-footer__menu list--reset">

								<?php print $getData->footerMenu("1093");?>

								<?php print $getData->footerMenu("1096");?>

								<?php print $getData->footerMenu("1097");?>



							</ul>

						</div>

						<div class="col-md-6 col-lg-5 col-xl-4 offset-xl-1 top-40 top-md-0">

							<h6 class="page-footer__title title--white"><?=$eksT6[systemLangg()];?></h6>

							<div class="page-footer__details">

								<p><strong>Adres:</strong> <span><?=$cDataa["x2"];?></span></p>

								<p><strong>Telefon:</strong> <a href="tel:<?=phoneNumber($cDataa["x3"]);?>"><?=$cDataa["x3"];?></a> <a href="tel:<?=phoneNumber($cDataa["x7"]);?>"><?=$cDataa["x7"];?></a></p>

								<p><strong>E-Posta:</strong> <a href="mailto:<?=$cDataa["x6"];?>"><?=$cDataa["x6"];?></a></p>

								<p><strong>Çalışma Saatleri:</strong> <span>9:00 - 18:00</span></p>

							</div>

						</div>

						<div class="col-lg-3 d-flex flex-column justify-content-between align-items-sm-center align-items-lg-end top-40 top-lg-0">

							<h6 class="page-footer__title title--white">Solo Teknoloji</h6>

							<ul class="socials list--reset">

								<li class="socials__item"><a class="socials__link" href="<?=$getData->siteConfig["youtube"]?>">

									<svg class="icon">

										<use xlink:href="#youtube"></use>

									</svg></a></li>

								<li class="socials__item"><a class="socials__link" href="<?=$getData->siteConfig["facebook"]?>">

									<svg class="icon">

										<use xlink:href="#facebook"></use>

									</svg></a></li>

								<li class="socials__item"><a class="socials__link" href="<?=$getData->siteConfig["twitter"]?>">

									<svg class="icon">

										<use xlink:href="#twitter"></use>

									</svg></a></li>

								<li class="socials__item"><a class="socials__link" href="<?=$getData->siteConfig["linkedin"]?>">

									<svg class="icon">

										<use xlink:href="#linkedin"></use>

									</svg></a></li>

								<li class="socials__item"><a class="socials__link" href="<?=$getData->siteConfig["instagram"]?>">

									<svg class="icon">

										<use xlink:href="#inst"></use>

									</svg></a></li>

							</ul>

						</div>

					</div>

					<div class="row top-50">

						<div class="col-lg-6 text-sm-center text-lg-left">

							<div class="page-footer__privacy">2024 &copy; SOLO TEKNOLOJİ TÜM HAKLARI SAKLIDIR.</div>

						</div>

						<div class="col-lg-6 text-sm-center text-lg-right">

							<div class="page-footer__copyright">WEB TASARIM &amp; <a href="http://www.kocaeli.edu.tr/" target="blank" style="text-decoration: none; color: red">EMİRCAN DEMİR</a></div>

						</div>

					</div>

				</div>

			</footer>



		</div>





		<script src="js/jquery.min.js"></script>

		<script src="js/libs.min.js"></script>

		<script src="js/common.min.js"></script>

	</body>



</html>