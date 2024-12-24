<?php
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Red Drop BD | Home Page</title>
	<script>
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
		rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
		rel="stylesheet">
	<!-- //Web-Fonts -->

</head>

<body>
	<?php include('includes/header.php'); ?>

	<!-- banner -->
	<div class="slider">
		<div class="callbacks_container">
			<ul class="rslides callbacks callbacks1" id="slider4">
				<li>
					<div class="banner-top2"></div>
				</li>
				<li>
					<div class="banner-top4">
						<div class="banner-info_agile_w3ls">
							<div class="container text-center">
								<h3>Your Blood Can Save a Life–<br><span>Join RedDropBD</span></h3>
								<a href="sign-up.php" class="login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3 ">
									<i class="fas fa-sign-in-alt mr-2 mt-2"></i>Register Now</a>
							</div>
						</div>
					</div>


				</li>
				<li>
					<div class="banner-top3">
						<div class="banner-info_agile_w3ls">
							<div class="container">
								<!-- 		<h3><span></span>
								</h3> -->
							</div>
						</div>
					</div>
				</li>

			</ul>
		</div>
	</div>
	<!-- //banner -->
	<div class="clearfix"></div>

	<!-- banner bottom -->
	<div class="banner-bottom py-5">
		<div class="d-flex container py-xl-3 py-lg-3">
			<div class="banner-left-bottom-w3ls offset-lg-2 offset-md-1">
				<h3 class="text-white my-3">Be Someone’s Lifeline – Become a Blood Donor Today!</h3>
				<p>Every day, countless lives depend on the generosity of blood donors. By becoming a blood donor, you have the power to save lives and make a real difference in your community</p>
			</div>
			<div class="button">
				<a href="sign-up.php" class="login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3 ">
					Register Now</a>
			</div>
		</div>
	</div>
	<!-- //banner bottom -->
	<!-- blog -->
	<div class="blog-w3ls py-5" id="blog">
		<div class="container py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title black">Some of the Donar</h3>
				<span>
					<i class="fas fa-tint"></i>
				</span>
			</div>
			<div class="row package-grids mt-5">
				<?php
				$status = 1;
				$sql = "SELECT * from tblblooddonars where status=:status order by rand() limit 6";
				$query = $dbh->prepare($sql);
				$query->bindParam(':status', $status, PDO::PARAM_STR);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);
				$cnt = 1;
				if ($query->rowCount() > 0) {
					foreach ($results as $result) { ?>
						<div class="col-md-4 pricing" style="margin-top:2%;">
							<div class="price-top">
								<img src="images/blood-donor.jpg" alt="" class="img-fluid" />

								<h3><?php echo htmlentities($result->FullName); ?>
								</h3>
							</div>
							<div class="price-bottom p-4">
								<h4 class="text-dark mb-3">Gender: <?php echo htmlentities($result->Gender); ?></h4>
								<p class="card-text"><b>Blood Group :</b> <?php echo htmlentities($result->BloodGroup); ?></p>
								<a class="btn btn-primary" style="color:#fff" href="contact-blood.php?cid=<?php echo $result->id; ?>">Request</a>
							</div>
						</div><?php }
						} ?>
			</div>
		</div>
	</div>
	<!-- //blog -->

	<!-- treatments -->
	<div class="screen-w3ls py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="container">
				<div class="row">
					<!-- Text Content -->
					<div class="col-lg-6 col-md-12">
						<h2 class="blood-donation-title">
							<i class="fas fa-hand-holding-heart donation-icon"></i> Blood Donation Saves Lives
						</h2>
						<p class="blood-donation-description">
							Donating blood is a simple, yet life-saving act. Every donation can help save up to three lives.
							Your donation ensures that hospitals have the blood supply needed to treat patients in emergencies,
							surgeries, and chronic conditions.
						</p>
					</div>
					<!-- Image Content -->
					<div class="col-lg-6 col-md-12">
						<h2 class="faq-title">Frequently Asked Questions (FAQ)</h2>
						<!-- FAQ Item 1 -->
						<div class="faq-item">
							<div class="faq-question" onclick="toggleAnswer(this)">
								<span>Who can donate blood?</span>
								<span class="plus-sign">+</span>
							</div>
							<div class="faq-answer">
								<p>Anyone between the ages of 18 and 65, who is in good health, and weighs at least 110 lbs can typically donate blood. Donors should be free from infections and certain medical conditions.</p>
							</div>
						</div>
						<!-- FAQ Item 2 -->
						<div class="faq-item">
							<div class="faq-question" onclick="toggleAnswer(this)">
								<span>How often can I donate blood?</span>
								<span class="plus-sign">+</span>
							</div>
							<div class="faq-answer">
								<p>You can donate whole blood every 56 days, platelets every 7 days, and plasma every 28 days. It's important to follow the guidelines to ensure your safety.</p>
							</div>
						</div>
						<!-- FAQ Item 3 -->
						<div class="faq-item">
							<div class="faq-question" onclick="toggleAnswer(this)">
								<span>What are the benefits of donating blood?</span>
								<span class="plus-sign">+</span>
							</div>
							<div class="faq-answer">
								<p>Donating blood helps save lives. It also benefits the donor by improving circulation and reducing the risk of certain health conditions. Additionally, it's a great way to contribute to your community.</p>
							</div>
						</div>
						<!-- FAQ Item 4 -->
						<div class="faq-item">
							<div class="faq-question" onclick="toggleAnswer(this)">
								<span>Does donating blood hurt?</span>
								<span class="plus-sign">+</span>
							</div>
							<div class="faq-answer">
								<p>Most donors experience minimal discomfort during the blood donation process. The needle insertion is quick and may cause a slight pinch, but the process is usually painless.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- JavaScript to Toggle Answer Visibility -->
	<script>
		function toggleAnswer(element) {
			// Close any open FAQ
			const openItems = document.querySelectorAll('.faq-item.open');
			openItems.forEach(item => {
				if (item !== element.parentElement) {
					item.classList.remove('open');
					item.querySelector('.faq-answer').style.display = 'none';
				}
			});

			// Toggle the current FAQ
			const answer = element.nextElementSibling;
			const plusSign = element.querySelector('.plus-sign');
			if (answer.style.display === 'none' || answer.style.display === '') {
				answer.style.display = 'block';
				plusSign.textContent = '-';
				element.parentElement.classList.add('open');
			} else {
				answer.style.display = 'none';
				plusSign.textContent = '+';
				element.parentElement.classList.remove('open');
			}
		}
	</script>


	<!-- footer -->
	<?php include('includes/footer.php'); ?>


	<!-- Js files -->
	<!-- JavaScript -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- Default-JavaScript-File -->

	<!-- banner slider -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function() {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function() {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function() {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>
	<!-- //banner slider -->

	<!-- fixed navigation -->
	<script src="js/fixed-nav.js"></script>
	<!-- //fixed navigation -->

	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- move-top -->
	<script src="js/move-top.js"></script>
	<!-- easing -->
	<script src="js/easing.js"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="js/medic.js"></script>

	<script src="js/bootstrap.js"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

	<!-- //Js files -->

</body>

</html>