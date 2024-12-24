<?php session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $sql = "SELECT id FROM tblblooddonars WHERE EmailId=:email and Password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    foreach ($results as $result) {
      $_SESSION['bbdmsdid'] = $result->id;
    }
    $_SESSION['login'] = $_POST['email'];
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
  } else {
    echo "<script>alert('Invalid Details');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>Red Drop BD | About Us </title>
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
    /* Main section styles */
    /* Main section styles */
    /* Main section styles */
    .about {
      border-radius: 10px;
      padding: 50px 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .row {
      display: flex;
      flex-wrap: wrap;
    }

    .feature-section {
      background-color: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    h5 {
      font-family: 'Arial', sans-serif;
      font-size: 26px;
      color: #333;
    }

    .feature-section p {
      font-size: 16px;
      color: #555;
    }

    .feature-section img {
      max-width: 100%;
      border-radius: 15px;
      margin-top: 20px;
    }

    .login {
      background-color: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-size: 16px;
      font-weight: bold;
      color: #555;
    }

    .form-control {
      padding: 12px;
      font-size: 14px;
      border-radius: 8px;
      border: 1px solid #ddd;
      margin-top: 8px;
      width: 100%;
    }

    .form-control:focus {
      outline: none;
      border-color: #ff7b72;
      box-shadow: 0 0 5px rgba(255, 123, 114, 0.5);
    }

    .btn.submit {
      background-color: #ff7b72;
      color: white;
      padding: 12px 30px;
      border: none;
      border-radius: 25px;
      font-size: 16px;
      width: 100%;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .btn.submit:hover {
      background-color: #e56157;
      transform: scale(1.05);
    }

    .account-w3ls {
      font-size: 14px;
      color: #555;
    }

    .account-w3ls a {
      color: #ff7b72;
      font-weight: bold;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .account-w3ls a:hover {
      color: #e56157;
      text-decoration: underline;
    }

    .register-btn {
      background-color: #ffcd68;
      color: white;
      padding: 12px 30px;
      border: none;
      border-radius: 25px;
      font-size: 16px;
      transition: all 0.3s ease;
      cursor: pointer;
      text-align: center;
    }

    .register-btn:hover {
      background-color: #e5a737;
      transform: scale(1.05);
    }

    @media (max-width: 767px) {

      .login,
      .feature-section {
        padding: 20px;
      }

      .col-lg-6 {
        width: 100%;
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
        <li class="breadcrumb-item active" aria-current="page">Login</li>
      </ol>
    </div>
  </div>
  <!-- //page details -->

  <!-- login -->
  <section class="about py-5">
    <div class="container py-xl-5 py-lg-3">
      <div class="row">
        <!-- First Column (Design Element - Illustration) -->
        <div class="col-lg-6 col-md-12 mb-4">
          <div class="feature-section px-4 mx-auto mw-100">
            <h5 class="text-center mb-4" style="color: #ff7b72;">Welcome Back!</h5>
            <p class="text-center" style="font-size: 16px; color: #555;">
              Stay connected with your account and access exclusive features tailored just for you.
              Your journey starts here. Log in now and get started!
            </p>
            <!-- Optional: Add an illustration here -->
            <div class="text-center">
              <img src="images/avatar.png" alt="Login Illustration" class="img-fluid rounded-circle">
            </div>
          </div>
        </div>

        <!-- Second Column (Modern Login Form) -->
        <div class="col-lg-6 col-md-12">
          <div class="login px-4 mx-auto mw-100">
            <h5 class="text-center mb-4">Login Now</h5>
            <form action="#" method="post" name="login">
              <div class="form-group">
                <label>Email ID</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" required="">
              </div>
              <div class="form-group">
                <label class="mb-2">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required="">
              </div>
              <button type="submit" class="btn submit mb-4" name="login">Login</button>
              <p class="account-w3ls text-center pb-2" style="color:#333;">
                Don't have an account?
                <a href="sign-up.php" class="register-btn">Create one now</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- //about -->



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