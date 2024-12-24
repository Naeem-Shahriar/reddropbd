<?php
error_reporting(0);
include('includes/config.php');
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
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </div>
    </div>
    <!-- //page details -->

    <!-- about -->
    <section class="about py-5">
        <div class="container py-xl-5 py-lg-3">
            <?php
            $pagetype = "aboutus";
            $sql = "SELECT type,detail,PageName from tblpages where type=:pagetype";
            $query = $dbh->prepare($sql);
            $query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
                foreach ($results as $result) { ?>
                    <div class="w3ls-titles text-center mb-md-5 mb-4">
                        <h3 class="title"><?php echo htmlentities($result->PageName); ?></h3>
                        <span>
                            <i class="fas fa-tint" style="color:red"></i>
                        </span>
                    </div>
                    <p class="aboutpara text-center mx-auto"><?php echo $result->detail; ?>.</p>
            <?php }
            } ?>

        </div>
    </section>

    <section class="team-section">
        <h2 class="team-heading">IT Executives</h2>
        <div class="team-container">
            <!-- Team Member 1 -->
            <div class="team-member">
                <div class="team-image-container" onclick="toggleDetails('team1')">
                    <img src="images/hamdus.jpeg" alt="Team Member 1" class="team-image">
                    <h3 class="team-title">Fajle Rabbi Hamdu</h3>
                    <p>Front-end Developer</p>
                </div>
                <div class="team-details" id="team1">
                    <p>Hamdu is a skilled web developer with expertise in front-end technologies and design systems.</p>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="team-member">
                <div class="team-image-container" onclick="toggleDetails('team2')">
                    <img src="images/Anas.jpg" alt="Team Member 2" class="team-image">
                    <h3 class="team-title">Anas Bin Ayub</h3>
                    <p>Front-end Developer</p>
                </div>
                <div class="team-details" id="team2">
                    <p>Anas expertise in front-end technologies & specializes in UI/UX design, creating user-friendly and visually appealing experiences.</p>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="team-member">
                <div class="team-image-container" onclick="toggleDetails('team3')">
                    <img src="images/naeems.jpeg" alt="Team Member 3" class="team-image">
                    <h3 class="team-title">Naeem Shahriar</h3>
                    <p>Back-end Developer</p>
                </div>
                <div class="team-details" id="team3">
                    <p>Naeem is a back-end developer focusing on database management and server-side architecture.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="gallery-section">
        <h2 class="gallery-heading">Supported By 58 Batch</h2>
        <div class="gallery-container">
            <!-- Gallery Item 1 -->
            <div class="gallery-item">
                <img src="images/01.jpeg" alt="Image 1">
            </div>

            <!-- Gallery Item 2 -->
            <div class="gallery-item">
                <img src="images/02.jpeg" alt="Image 2">
            </div>

            <!-- Gallery Item 3 -->
            <div class="gallery-item">
                <img src="images/03.jpeg" alt="Image 3">
            </div>

            <!-- Gallery Item 4 -->
            <div class="gallery-item">
                <img src="images/04.jpeg" alt="Image 4">
            </div>

            <!-- Gallery Item 5 -->
            <div class="gallery-item">
                <img src="images/05.jpeg" alt="Image 5">
            </div>

            <!-- Gallery Item 6 -->
            <div class="gallery-item">
                <img src="images/06.jpeg" alt="Image 6">
            </div>
            <div class="gallery-item">
                <img src="images/07.jpg" alt="Image 1">
            </div>

            <!-- Gallery Item 2 -->
            <div class="gallery-item">
                <img src="images/08.jpg" alt="Image 2">
            </div>

            <!-- Gallery Item 3 -->
            <div class="gallery-item">
                <img src="images/09.jpeg" alt="Image 3">
            </div>

            <!-- Gallery Item 4 -->
            <div class="gallery-item">
                <img src="images/10.jpeg" alt="Image 4">
            </div>

            <!-- Gallery Item 5 -->
            <div class="gallery-item">
                <img src="images/11.jpeg" alt="Image 5">
            </div>

            <!-- Gallery Item 6 -->
            <div class="gallery-item">
                <img src="images/12.jpeg" alt="Image 6">
            </div>
        </div>
    </section>
    <script>
        function toggleDetails(id) {
            const details = document.getElementById(id);

            // Close all other boxes
            document.querySelectorAll('.team-details').forEach((box) => {
                if (box.id !== id) {
                    box.style.display = 'none';
                }
            });

            // Toggle the clicked box
            if (details.style.display === 'block') {
                details.style.display = 'none'; // Close if already open
            } else {
                details.style.display = 'block'; // Open if closed
            }
        }

        // Close info boxes when clicking outside
        document.addEventListener('click', (event) => {
            const isTeamMember = event.target.closest('.team-member'); // Check if the click was inside a .team-member
            if (!isTeamMember) {
                document.querySelectorAll('.team-details').forEach((box) => {
                    box.style.display = 'none'; // Close all boxes
                });
            }
        });
    </script>



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