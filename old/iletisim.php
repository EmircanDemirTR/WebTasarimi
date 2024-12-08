<?php include 'header.php' ?>

			<main class="main">
				<section class="hero-block">
					<picture>
						<source srcset="img/service-details.jpg" media="(min-width: 992px)"/><img class="img--bg" src="img/service-details.jpg" alt="img"/>
					</picture>
					<div class="hero-block__layout"></div>
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="align-container">
									<div class="align-container__item"><span class="hero-block__overlay">Solo</span>
										<h1 class="hero-block__title">İletişim</h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>


				<section class="section contacts pb-0"><img class="contacts__bg" src="img/contacts-map.png" alt="map"/>
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<h5 class="contacts__title">Bize Ulaşın</h5>
								<div class="contacts-item">
									<div class="contacts-item__img">
										<svg class="icon">
											<use xlink:href="#phone"></use>
										</svg>
									</div>
									<div class="contacts-item__details"><a class="contacts-item__link" href="tel:+22628908002">+90 536 501 46 00</a><a class="contacts-item__link" href="tel:+22628908002">+90 216 501 46 00</a></div>
								</div>
								<div class="contacts-item">
									<div class="contacts-item__img">
										<svg class="icon">
											<use xlink:href="#mail"></use>
										</svg>
									</div>
									<div class="contacts-item__details"><a class="contacts-item__link" href="mailto:transporteriumus@gmail.com">info@soloteknoloji.com</a></div>
								</div>
								<div class="contacts-item">
									<div class="contacts-item__img">
										<svg class="icon">
											<use xlink:href="#pin"></use>
										</svg>
									</div>
									<div class="contacts-item__details"><span>Hasanpaşa, Uzunçayır Cd. No:2/42, 34722 Kadıköy/İstanbul</span></div>
								</div>
								<div class="contacts-item">
									<div class="contacts-item__img">
										<svg class="icon">
											<use xlink:href="#share"></use>
										</svg>
									</div>
									<div class="contacts-item__details">
										<ul class="socials socials--dark list--reset">
											<li class="socials__item"><a class="socials__link" href="#">
												<svg class="icon">
													<use xlink:href="#facebook"></use>
												</svg></a>
											</li>
											<li class="socials__item"><a class="socials__link" href="#">
												<svg class="icon">
													<use xlink:href="#twitter"></use>
												</svg></a>
											</li>
											<li class="socials__item"><a class="socials__link" href="#">
												<svg class="icon">
													<use xlink:href="#linkedin"></use>
												</svg></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<form class="form contact-form" id="ajax-form" action="javascript:void(0);" method="post" autocomplete="off">
									<div class="row">
										<div class="col-12">
											<h5 class="contact-form__subtitle">Bize Yazın</h5>
										</div>
										<div class="col-md-6">
											<input class="form__field" type="text" name="name" placeholder="Ad Soyad"/>
										</div>
										<div class="col-md-6">
											<input class="form__field" type="email" name="email" placeholder="E-Posta"/>
										</div>
										<div class="col-md-6">
											<input class="form__field" type="tel" name="phone" placeholder="Telefon"/>
										</div>
										<div class="col-md-6">
											<input class="form__field" type="text" name="subject" placeholder="Konu"/>
										</div>
										<div class="col-12">
											<textarea class="form__field form__message message--large" name="message" placeholder="Mesaj"></textarea>
										</div>
										<div class="col-12">
											<button class="button button--green" type="submit"><span>Gönder</span> 
												<svg class="icon">
													<use xlink:href="#arrow"></use>
												</svg>
											</button>
										</div>
										<div class="col-12">
											<div class="alert alert--success alert--filled">
												<div class="alert__icon">
													<svg class="icon">
														<use xlink:href="#check"></use>
													</svg>
												</div>
												<p class="alert__text"><strong>Tamamlandı!</strong> Mesajınız başarılı şekilde gönderildi.</p><span class="alert__close">
													<svg class="icon">
														<use xlink:href="#close"></use>
													</svg></span>
											</div>
											<div class="alert alert--error alert--filled">
												<div class="alert__icon">
													<svg class="icon">
														<use xlink:href="#close"></use>
													</svg>
												</div>
												<p class="alert__text"><strong>Hata!</strong> Mesajınız başarılı şekilde gönderilemedi.</p><span class="alert__close">
													<svg class="icon">
														<use xlink:href="#close"></use>
													</svg></span>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</section>

				<section class="section">
					<div class="container">
						<div class="row flex-column-reverse flex-lg-row">
							<div class="col-lg-12">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3011.373559329881!2d29.04149901571848!3d40.99519622817804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cac7f3732c39c3%3A0xcb6117780ec6559f!2sSolo%20Teknoloji!5e0!3m2!1str!2str!4v1609527446480!5m2!1str!2str" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
							</div>							
						</div>
					</div>
				</section>


			</main>





<?php include 'footer.php' ?>