<?php 
require '../includes/config.inc.php';
$id=$_GET['id'];
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM student where Student_id ='$id'")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> Allocated Rooms</title>

	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);
		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--bootsrap -->

	<!--// Meta tag Keywords -->

	<!-- css files -->
	<link rel="stylesheet" href="../web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="../web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
	<link rel="stylesheet" href="../web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web-fonts -->

</head>

<body>

<!-- banner -->
<div class="inner-page-banner" id="home">
	<!--Header-->
	<header>
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<img src="../web_home/images/logo.png" style="width:78px;height:78px;float:left;">
				<h1><a class="navbar-brand" >SCEM<span class="display"> </span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				
			</nav>
		</div>
	</header>
	<!--Header-->
</div>
<!-- //banner -->
<div class="container-fluid">
    <div>Name:
    <?php echo $Fname." ".$Lname; ?>
    </div>
    <hr>
    
	<form id='employee_frm' action="update-database.php">
		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo isset($Student_id) ? $Student_id : "" ?>" />
		</div>
        <div class="form-group">
			<label>Hostel Name</label>
			<select class="custom-select browser-default select2" name="hostel_id">
			
			<?php
			$dept = $conn->query("SELECT * from hostel order by Hostel_id asc");
			while($row=$dept->fetch_assoc()):
			?>
				<option value="<?php echo $row['Hostel_id'] ?>" <?php echo isset($Hostel_id) && $Hostel_id == $row['Hostel_id'] ? "selected" :"" ?>><?php echo $row['Hostel_name'] ?></option>
			<?php endwhile; ?>
            </select>
            
</div>
		
        
		<div class="form-group">
			<label>Room NO</label>
			<select class="custom-select browser-default select2" name="Room_id">
			
			<?php
			$dept = $conn->query("SELECT * from room order by Room_id asc");
			while($row=$dept->fetch_assoc()):
			?>
				<option value="<?php echo $row['Room_id'] ?>" <?php echo isset($Room_id) && $Room_id == $row['Room_id'] ? "selected" :"" ?>><?php echo $row['Room_No'] ?></option>
			<?php endwhile; ?>
            </select>
            
</div>
<div>
    <button type="submit" >submit</button>
</form>
</div>
</body>
</html>