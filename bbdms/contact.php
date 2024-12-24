<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['send'])) {
	$name = $_POST['fullname'];
	$email = $_POST['email'];
	$contactno = $_POST['contactno'];
	$message = $_POST['message'];
	$sql = "INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':name', $name, PDO::PARAM_STR);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
	$query->bindParam(':message', $message, PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if ($lastInsertId) {

		echo '<script>alert("Query Sent. We will contact you shortly.")</script>';
	} else {
		echo "<script>alert('Something went wrong. Please try again.');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Red Drop BD | Contact Us </title>
	<!-- Meta tag Keywords -->

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

	<style>
		/* Founder Card Styling */
		.founder-card {
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
			text-align: center;
		}

		/* Founder Image - Circle frame */
		.founder-img {
			width: 120px;
			height: 120px;
			border-radius: 50%;
			object-fit: cover;
			border: 4px solid #3D52A0;
		}

		/* Founder Title */
		.founder-title {
			font-size: 20px;
			color: #333;
			font-weight: bold;
			margin-top: 15px;
		}

		/* Founder Description */
		.founder-description {
			font-size: 14px;
			color: #666;
			margin-top: 10px;
			text-align: justify;
			text-indent: 30px;
			word-wrap: break-word;
		}

		/* Social Icons Styling */
		.social-icons {
			margin-top: 15px;
		}

		.social-icons a {
			color: #333;
			font-size: 18px;
			margin: 0 10px;
			text-decoration: none;
		}

		.social-icons a:hover {
			color: #3D52A0;
		}

		/* Responsive styling */
		@media (max-width: 768px) {
			.founder-img {
				width: 100px;
				height: 100px;
			}

			.founder-title {
				font-size: 18px;
			}

			.founder-description {
				font-size: 13px;

			}
		}
	</style>
</head>

<body>
	<?php include('includes/header.php'); ?>

	<!-- banner 2 -->
	<div class="inner-banner-w3ls">
		<div class="container">

		</div>
		<!-- //banner 2 -->
	</div>
	<!-- page details -->
	<div class="breadcrumb-agile">
		<div aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
			</ol>
		</div>
	</div>
	<!-- //page details -->

	<!-- contact -->
	<div class="agileits-contact py-5">
		<div class="py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">Contact Us</h3>
				<span>
					<i class="fas fa-tint"></i>
				</span>
				<p class="mt-2">Let's Do it for the Community</p>
			</div>
			<div class="d-flex">
				<!-- Founder Card -->
				<div class="col-lg-6 w3_agileits-contact-left">
					<div class="founder-card">
						<!-- Founder Picture -->
						<img src="images/founder.jpg" alt="Founder" class="founder-img">
						<h4 class="founder-title">Naeem Shahriar</h4>
						<p class="founder-title" style="color:#666">-Founder</p>
						<p class="founder-description">The founder of RedDropBD recognized the critical issue in blood donation requests – messages often go unnoticed as people assume someone else will help. This delay can be life-threatening. RedDropBD aims to solve this by directly connecting blood requesters with eligible donors, encouraging immediate action. Rather than forwarding messages, requesters should contact potential donors directly, ensuring quicker responses and more effective donations. The founder’s vision is to foster a more responsive community, making blood donations timely and life-saving. Through this direct approach, RedDropBD seeks to create a compassionate and engaged network for those in need.</p>
						<!-- Social Icons -->
						<div class="social-icons">
							<a href="https://www.facebook.com/shahriarnaeem/" target="_blank"><i class="fab fa-facebook-f"></i></a>
							<a href="https://github.com/Naeem-Shahriar?" target="_blank"><i class="fab fa-github"></i></a>
							<a href="https://www.linkedin.com/in/naeem-shahriar-349221220/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
						</div>
					</div>
				</div>
				<!-- Contact Form -->
				<div class="col-lg-6 contact-right-w3l">
					<h5 class="title-w3 text-center mb-5">Get In Touch</h5>
					<form action="#" method="post">
						<div class="d-flex space-d-flex">
							<div class="form-group grid-inputs">
								<input type="text" class="form-control" id="name" name="fullname" placeholder="Entar Your Name">
							</div>

							<div class="form-group grid-inputs">
								<input type="text" class="form-control" id="phone" name="contactno" placeholder="Phone Number">
							</div>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="email" name="email" required placeholder="Email Address">
						</div>
						<div class="form-group">
							<textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Enter Your Message" maxlength="999" style="resize:none"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" name="send">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- //contact -->




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