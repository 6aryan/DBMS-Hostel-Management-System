<?php
  require '../includes/config.inc.php';
 
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
				<h1><a class="navbar-brand" href="admin_home.php">SCEM<span class="display"> </span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="admin_home.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="create_hm.php">Appoint Hostel Manager</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="apllications_list.php">Application</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="students.php">Students</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="admin_contact.php">Contact</a>
						</li>
			            <li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="admin_profile.php">My Profile</a>
							</li>
							<li>
								<a href="../includes/logout.inc.php">Logout</a>
							</li>
						</ul>
					</li>
					
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<!--Header-->
</div>
<!-- //banner -->
<br><br><br>






<div class="container">
<h2 class="heading text-capitalize mb-sm-5 mb-4"> Rooms Allotted </h2>
<?php
   //$hostel_id = $_SESSION['hostel_id'];
  
   //select the hostel name from hostel table
   //$query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
   //$result6 = mysqli_query($conn,$query6);
   //$row6 = mysqli_fetch_assoc($result6);
   //$hostel_name = $row6['Hostel_name'];
?>

  <table class="table table-hover">
    <thead>
      <tr>
	    <th >#</th>
        <th>Student Name</th>
        <th>Student ID</th>
        <th>Contact Number</th>
        <th>Hostel</th>
        <th>Room Number</th>
		<th >Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
	
	$i = 1;
	$query1 = "SELECT * FROM Student";
	$result1 = mysqli_query($conn,$query1);
      if(mysqli_num_rows($result1)==0){
         echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }
      else{
		
      	while($row1 = mysqli_fetch_assoc($result1)){
			
      		//get the room_no of the student from room_id in room table
            $room_id = $row1['Room_id'];
            $HID = $row1['Hostel_id'];
            $query7 = "SELECT * FROM Room WHERE Room_id = '$room_id'";
            $result7 = mysqli_query($conn,$query7);
            $row7 = mysqli_fetch_assoc($result7);
            
            $query99 = "SELECT * FROM Hostel WHERE Hostel_id = '$HID'";
            $result99 = mysqli_query($conn,$query99);
            $row99 = mysqli_fetch_assoc($result99);
            // 
            if (! $row99 ) {
              $HNM='not allocated';
            }else{
				$HNM = $row99['Hostel_name'];
			}
            if(!$row7 ){
              $room_no='not allocated';
            }else{
				$room_no = $row7['Room_No'];
			}
            //student name
            $student_name = $row1['Fname']." ".$row1['Lname'];
    ?>
	<tr>
								<td ><?php echo $i++ ?></td>
									<td class="">
										 <p> <b><?php echo $student_name?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row1['Student_id'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row1['Mob_no'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $HNM ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $room_no ?></b></p>
									</td>
									<td>
									<a style='background-color:tomato; color:white;padding:10px'class="fa fa-edit" id="edit-btn" href="manage_student.php?id=<?php echo $row1['Student_id']; ?>" >Edit</a>
									
										<a style='background-color:red; color:white;padding:10px' class="fa fa-trash" href="delete_student.php?id=<?php echo $row1['Student_id']; ?>"  onclick="return confirm('Are you sure you want to delete this user ?');">Delete</a>
									</td>
	</tr>
				<?php }} ?>
    </tbody>
  </table>
</div>
<br>
<br>
<br>

<!-- footer -->
<footer class="py-5">
	<div class="container py-md-5">
		<div class="footer-logo mb-5 text-center">
			<a class="navbar-brand" href="https://sahyadri.edu.in/" target="_blank">Sahyadri College of<span class="display"> Engineering & Management</span></a>
		</div>
		<div class="footer-grid">
			
			<div class="list-footer">
				<ul class="footer-nav text-center">
					<li>
						<a href="admin_home.php">Home</a>
					</li>
					
					<li>
						<a href="create_hm.php">Appoint</a>
					</li>
					<li>
						<a href="apllications_list.php">Application</a>
					</li>
					<li>
						<a href="students.php">Students</a>
					</li>
					<li>
						<a href="admin_contact.php">Contact</a>
					</li>
					<li>
						<a href="admin_profile.php">Profile</a>
					</li>
				</ul>
			</div>
			
		</div>
	</div>
</footer>
<!-- footer -->

<!-- js-scripts -->

	<!-- js -->
	<script type="text/javascript" src="../web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="../web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
	<!-- //js -->

	<!-- banner js -->
	<script src="web_home/js/snap.svg-min.js"></script>
	<script src="web_home/js/main.js"></script> <!-- Resource jQuery -->
	<!-- //banner js -->

	<!-- flexSlider --><!-- for testimonials -->
	<script defer src="web_home/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	</script>
	<!-- //flexSlider --><!-- for testimonials -->

	<!-- start-smoth-scrolling -->
	<script src="web_home/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="web_home/js/move-top.js"></script>
	<script type="text/javascript" src="web_home/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->

<!-- //js-scripts -->
<style>
 #form-container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 20px;
  box-shadow: 0 0 10px #ccc;
}
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height:150px;
	}
</style>
<script>
	$('#new_emp_btn').click(function(){
	document.getElementById("new_emp_btn").addEventListener("click", function() {
  document.getElementById("form-container").style.display = "block";
});
})


document.getElementById("cancel-form").addEventListener("click", function() {
  document.getElementById("form-container").style.display = "none";

});



	
</script>
</body>
</html>
