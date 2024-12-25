<?php
//error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Red Drop BD | Search Blood Donor </title>
	<!-- Meta tag Keywords -->

	<script>
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<style>
		/* Centering the entire form section */
		form {
			display: flex;
			justify-content: center;
			align-items: center;
			margin: 0;
		}

		/* Card container for the form */
		.form-card {
			background-color: #ffffff;
			border-radius: 8px;
			box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
			padding: 30px;
			width: 100%;
			max-width: 500px;
		}

		/* Form group for better spacing and alignment */
		.form-group {
			margin-bottom: 20px;
		}

		/* Label styling */
		label {
			font-size: 16px;
			color: #333;
			font-weight: 600;
			margin-bottom: 8px;
			display: block;
		}

		/* Select and Textarea Styling */
		select.form-control,
		textarea.form-control {
			background-color: #f8f8f8;
			border: 1px solid #ddd;
			padding: 12px 15px;
			font-size: 16px;
			border-radius: 5px;
			width: 100%;
			transition: all 0.3s ease;
			height: 45px;
			/* Align input and textarea height */
		}

		textarea.form-control {
			height: 120px;
			/* Give a larger height to the textarea */
		}

		select.form-control:focus,
		textarea.form-control:focus {
			border-color: #3D52A0;
			outline: none;
			box-shadow: 0 0 5px rgba(61, 82, 160, 0.4);
		}

		/* Submit button styling */
		.btn-submit {
			background-color: #3D52A0;
			border: none;
			color: white;
			padding: 12px 25px;
			font-size: 16px;
			border-radius: 5px;
			width: 100%;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}

		.btn-submit:hover {
			background-color: #2C4081;
		}

		/* Spacing between fields */
		.form-group {
			margin-bottom: 20px;
		}
	</style>
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
				<li class="breadcrumb-item active" aria-current="page">Search The Donor</li>
			</ol>
		</div>
	</div>
	<!-- //page details -->

	<!-- contact -->
	<div class="agileits-contact py-5">
		<div class="py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">Search The Donor</h3>
				<span>
					<i class="fas fa-tint" style="color:red"></i>
				</span>

			</div>
			<form name="donar" method="post">
				<div class="form-card">
					<div class="form-group">
						<label for="bloodgroup">Blood Group <span style="color:red">*</span></label>
						<select name="bloodgroup" class="form-control" required>
							<?php
							$sql = "SELECT * from  tblbloodgroup";
							$query = $dbh->prepare($sql);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							if ($query->rowCount() > 0) {
								foreach ($results as $result) { ?>
									<option value="<?php echo htmlentities($result->BloodGroup); ?>"><?php echo htmlentities($result->BloodGroup); ?></option>
							<?php }
							} ?>
						</select>
					</div>

<!-- 					<div class="form-group">
						<label for="location">Location</label>
						<textarea class="form-control" name="location"></textarea>
					</div> -->

					<div class="form-group">
						<input type="submit" name="sub" class="btn btn-submit" value="Submit">
					</div>
				</div>
			</form>

			<div class="agileits-contact py-5">
				<div class="py-xl-5 py-lg-3">
					<?php
					if (isset($_POST['sub'])) {
						$status = 1;
						$bloodgroup = $_POST['bloodgroup'];
						$location = $_POST['location'];

						$sql = "SELECT * from tblblooddonars where (status=:status and BloodGroup=:bloodgroup) ||  (Address=:location)";
						$query = $dbh->prepare($sql);
						$query->bindParam(':status', $status, PDO::PARAM_STR);
						$query->bindParam(':bloodgroup', $bloodgroup, PDO::PARAM_STR);
						$query->bindParam(':location', $location, PDO::PARAM_STR);
						$query->execute();
						$results = $query->fetchAll(PDO::FETCH_OBJ);
						$cnt = 1;
						if ($query->rowCount() > 0) { ?>

							<div class="w3ls-titles text-center mb-5">
								<h3 class="title">Matched Donors</h3>
								<span>
									<i class="fas fa-tint" style="color:red"></i>
								</span>

							</div>
							<div class="d-flex">

								<div class="row package-grids mt-5" style="padding-left: 50px; width:100%">
									<?php foreach ($results as $result) { ?>
										<div class="col-md-6 pricing">

											<div class="price-top">
												<a href="single.html">
													<img src="images/blood-donor.jpg" alt="Blood Donor" style="border:1px #000 solid" class="img-fluid" />
												</a>
												<h3><?php echo htmlentities($result->FullName); ?>
												</h3>
											</div>
											<div class="price-bottom p-4">
												<table class="table table-bordered">

													<tbody>
														<tr>
															<th>Gender</th>
															<td><?php echo htmlentities($result->Gender); ?></td>
														</tr>
														<tr>
															<td>Blood Group</td>
															<td><?php echo htmlentities($result->BloodGroup); ?></td>
														</tr>
														<tr>
															<td>Mobile No.</td>
															<td><?php echo htmlentities($result->MobileNumber); ?></td>
														</tr>

														<tr>
															<td>Email ID</td>
															<td><?php echo htmlentities($result->EmailId); ?></td>
														</tr>

														<tr>
															<td>Age</td>
															<td><?php echo htmlentities($result->Age); ?></td>
														</tr>

														<tr>
															<td>Address</td>
															<td><?php echo htmlentities($result->Address); ?></td>
														</tr>

														<tr>
															<td>Message</td>
															<td><?php echo htmlentities($result->Message); ?></td>
														</tr>

													</tbody>
												</table>
												<a class="btn btn-primary" style="color:#fff" href="contact-blood.php?cid=<?php echo $result->id; ?>">Request</a>
											</div>
										</div> <?php }
										} else {
											echo htmlentities("No Record Found");
										}
									} ?>


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
			<script>
				if (performance.navigation.type === 1) {
					// page was reloaded, clear the form
					document.forms['donar'].reset();
				}
			</script>
</body>

</html>
