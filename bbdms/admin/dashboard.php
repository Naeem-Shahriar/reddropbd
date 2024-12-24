<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>RedDrop BD | Admin Dashboard</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
<div class="content-wrapper py-5 bg-light">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h2 class="page-title text-primary">Welcome Naeem</h2>
                <p class="text-muted">Debug your life decisions and contribute for the community</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Listed Blood Groups -->
            <div class="col-md-3">
                <div class="card border-primary shadow">
                    <div class="card-body text-center">
                        <?php 
                        $sql ="SELECT id FROM tblbloodgroup ";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $bg = $query->rowCount();
                        ?>
                        <h1 class="display-5 text-primary"><?php echo htmlentities($bg); ?></h1>
                        <p class="text-uppercase font-weight-bold">Listed Blood Groups</p>
                    </div>
                    <a href="manage-bloodgroup.php" class="btn btn-primary btn-block">Full Detail <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>

            <!-- Registered Blood Group -->
            <div class="col-md-3">
                <div class="card border-success shadow">
                    <div class="card-body text-center">
                        <?php 
                        $sql1 ="SELECT id FROM tblblooddonars ";
                        $query1 = $dbh->prepare($sql1);
                        $query1->execute();
                        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                        $regbd = $query1->rowCount();
                        ?>
                        <h1 class="display-5 text-success"><?php echo htmlentities($regbd); ?></h1>
                        <p class="text-uppercase font-weight-bold">Registered Blood Donors</p>
                    </div>
                    <a href="donor-list.php" class="btn btn-success btn-block">Full Detail <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>

            <!-- Total Queries -->
            <div class="col-md-3">
                <div class="card border-info shadow">
                    <div class="card-body text-center">
                        <?php 
                        $sql6 ="SELECT id FROM tblcontactusquery ";
                        $query6 = $dbh->prepare($sql6);
                        $query6->execute();
                        $results6 = $query6->fetchAll(PDO::FETCH_OBJ);
                        $query = $query6->rowCount();
                        ?>
                        <h1 class="display-5 text-info"><?php echo htmlentities($query); ?></h1>
                        <p class="text-uppercase font-weight-bold">Total Queries</p>
                    </div>
                    <a href="manage-conactusquery.php" class="btn btn-info btn-block">Full Detail <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>

            <!-- Total Blood Requests -->
            <div class="col-md-3">
                <div class="card border-danger shadow">
                    <div class="card-body text-center">
                        <?php 
                        $sql6 ="SELECT ID FROM tblbloodrequirer ";
                        $query6 = $dbh->prepare($sql6);
                        $query6->execute();
                        $results6 = $query6->fetchAll(PDO::FETCH_OBJ);
                        $totalreuqests = $query6->rowCount();
                        ?>
                        <h1 class="display-5 text-danger"><?php echo htmlentities($totalreuqests); ?></h1>
                        <p class="text-uppercase font-weight-bold">Blood Requests Received</p>
                    </div>
                    <a href="requests-received.php" class="btn btn-danger btn-block">Full Detail <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php } ?>