<?php 
require('php/db.php');
session_start();


if(!isset($_SESSION['sfirstname'])){
	header('Location: homepage_before_login.php');
}

if(isset($_POST['but']))
{
	$date=$_POST['date'];
    $time=$_POST['time'];
    $phone=$_SESSION['lphone'];
    $_SESSION['date1']=$date;
	$_SESSION['time1']=$time;
	$queryRole = "SELECT * FROM table_booking WHERE date_of_booking='$date' and time_='$time'";
	$result1=mysqli_query($con,$queryRole) or die(mysqli_error());
	$rows = mysqli_num_rows($result1);
	if($rows==1){
		header("Location: tablereserve.php");
	}
	else{
		$insert=mysqli_query($con,"INSERT INTO table_booking(phone,date_of_booking,time_) VALUES('$phone','$date','$time')");
		if($insert)
		{
			header("Location: tablereserve.php");
		}
		else{
			header("Location: tablereserve1.php");
		}
	}
    ?>
    
    
<?php

}



if(isset($_POST['submit']))
{?>
<script>
		Check();
		document.getElementById('rest').style="display:none";
</script>
<?php
	//print_r($_POST);exit;
	$name=$_SESSION['sfirstname'];  //$_POST['<name of input tag>']
	$date=$_POST['date'];
	$time=$_POST['time'];
	$no_of_table=2;//$_POST['no_of_tables'];
	$no_of_person=4;//$_POST['no_of_person'];
	$queryy=mysqli_query($con,"SELECT * from table_booking where date_of_booking='$date' and time_='$time'");
	// if(mysqli_num_rows($queryy)>0){
	// 	if( $row=mysqli_fetch_assoc($result)){
	
	$insert=mysqli_query($con,"INSERT INTO table_booking(username,date_of_booking,time_, no_tables, no_of_persons) VALUES('$name','$date','$time','$no_of_table','$no_of_person')");
	if($insert)
	{ ?>
		<script> 
		alert("Your table has been sucessfully booked!. Thank You");
        
		</script>
	<?php }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
		<title>Reserve your Tables</title>
		<link rel="icon" href="images/Logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		*{
                
				margin: 0px;
				padding:0px;
				box-sizing: border-box;
				font-family: 'Flamenco';
				font-weight:bold;
				}
        .Logo{
                height:80%;
				width:80%;
                width: auto;
                float: left;
                margin-top: 20px;
                transition: 4000s linear;
        }
		body{
			background-image: linear-gradient(rgba(0, 0, 0, 0.8),rgba(0,0,0,0.8)), url('images/i2.jpeg');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                height: 100vh;
				overflow: hidden;
		}
        h4{
            font-family: 'Pacifico';
            color:white;
            
        }
        h1{
            font-family: 'Pacifico';
            color:white;
            
        }
        table{
            padding-left:5%;
            height:30%;
            width:40%;
            background-color:#0009;
            margin-bottom:2%;
            margin-left:5%;
            margin-right:5%;
            margin-top:8%;

            border-spacing:0px;
        }
        .btn {
  border-radius: 12px;
  border-color:purple;
  background-color: transparent;
  border: 2px solid;
  color: purple;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 1%;
  position: absolute;
  opacity: 1;
  transition: 0.3s;
  z-index:2;
  
}





.booking-form {
	position: relative;
	max-width: 500px;
	width: 100%;
	margin: 0px auto;
	padding: 15px;
	overflow: hidden;
	background-color: transparent;
}


.booking-form .form-header h1 {
	font-weight: 700;
	text-transform: capitalize;
	font-size: 42px;
	margin: 0px;
	color: #fff;
	
}

.booking-form .form-group {
	position: relative;
	margin-bottom: 30px;
}

.booking-form .form-control {
	background-color: white;
	height: 60px;
	padding: 0px 25px;
	border: none;
	border-radius: 40px;
	color: black;
	-webkit-box-shadow: 0px 0px 0px 2px transparent;
	box-shadow: 0px 0px 0px 2px transparent;
	-webkit-transition: 0.2s;
	transition: 0.2s;
}

.booking-form .form-control::-webkit-input-placeholder {
	color: black;
}

.booking-form .form-control:-ms-input-placeholder {
	color: black;
}

.booking-form .form-control::placeholder {
	color: black;
}
input:focus,
select:focus,
textarea:focus,
button:focus {
    outline: none;
}
.booking-form .form-control:focus {
	-webkit-box-shadow: 0px 0px 0px 2px #ff8846;
	box-shadow: 0px 0px 0px 2px #ff8846;
}

.booking-form input[type="date"].form-control {
	padding-top: 16px;
}

.booking-form input[type="date"].form-control:invalid {
	color: black;
}

.booking-form input[type="date"].form-control+.form-label {
	opacity: 1;
	top: 10px;
}

.booking-form select.form-control {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}

.booking-form select.form-control:invalid {
	color: black;
}

.booking-form select.form-control+.select-arrow {
	position: absolute;
	right: 15px;
	top: 50%;
	-webkit-transform: translateY(-50%);
	transform: translateY(-50%);
	width: 32px;
	line-height: 32px;
	height: 32px;
	text-align: center;
	pointer-events: none;
	color: rgba(255, 255, 255, 0.5);
	
	font-size: 14px;
	text-decoration: none;
}



.booking-form select.form-control option {
	color: #000;
	font-size:20px;
	
}

.booking-form .form-label {
	position: absolute;
	top: -10px;
	left: 25px;
	opacity: 0;
	color: #ff8846;
	
	font-size: 13px;
	text-decoration: none;
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: 1.3px;
	height: 15px;
	line-height: 15px;
	-webkit-transition: 0.2s all;
	transition: 0.2s all;
	opacity: 1;
	top: 10px;
	
	
}

.booking-form .form-group.input-not-empty .form-control {
	padding-top: 0px;
	
}

.booking-form .form-group.input-not-empty .form-label {
	opacity: 1;
	top: 10px;
}
.rest{
	display:none;
}
.booking-form .submit-btn {
    margin-top:-35%;
	color: #fff;
	background-color: #e35e0a;
	font-weight: 700;
	height: 60px;
	padding: 10px 30px;
	width: 100%;
	border-radius: 40px;
	border: none;
	text-transform: uppercase;
	font-size: 16px;
	letter-spacing: 1.3px;
	-webkit-transition: 0.2s all;
	transition: 0.2s all;
}
.form-inline { 
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}
#submit{
display:none;
}
.booking-form .submit-btn:hover,
.booking-form .submit-btn:focus {
	opacity: 0.9;
	
}

    </style>
</head>

<body onload="Func()">
<button class="btn" style="position:absolute" onclick="goBack()">Back</button>



                     
				
					<div class="booking-form " >
						<form method="post" class="form-inline" >
								<div class="col-md-6">
									<div class="form-group">
										<input style="font-size:110%;padding-top:20px;" class="form-control" name="date" id="date" type="date" min="<?php echo date('Y-m-d'); ?>" max="2020-12-31"required>
										<span class="form-label">Date</span>&nbsp;&nbsp;
									</div>
								</div>
							
									<div class="col-md-6">
										<div class="form-group">
										<select style="font-size:110%;padding-top:20px;"name="time" id="time" class="form-control" required>
										<option value="8 A.M - 9 A.M">8 A.M - 9 A.M</option>
										<option value="9 A.M - 10 A.M">9 A.M - 10 A.M</option>
										<option value="10 A.M - 11 A.M">10 A.M - 11 A.M</option>
										<option value="11 A.M - 12 P.M">11 A.M - 12 P.M</option>
										<option value="12 P.M - 1 P.M">12 P.M - 1 P.M</option>
										<option value="1 P.M - 2 P.M">1 P.M - 2 P.M</option>
										<option value="2 P.M - 3 P.M">2 P.M - 3 P.M</option>
										<option value="3 P.M - 4 P.M">3 P.M - 4 P.M</option>
										<option value="4 P.M - 5 P.M">4 P.M - 5 P.M</option>
										<option value="5 P.M - 6 P.M">5 P.M - 6 P.M</option>
										<option value="6 P.M - 7 P.M">6 P.M - 7 P.M</option>
										<option value="7 P.M - 8 P.M">7 P.M - 8 P.M</option>
										</select>										
										<span class="form-label">Time</span>
										</div>
									</div>&nbsp;&nbsp;&nbsp;
							<div class="form-btn">
							<input type="submit" name="but" id="but" onsubmit="[document.getElementById('rest').style.display='block',document.getElementById('submit').style.display='block',document.getElementById('but').style.display='none']",  value="Done" style="width:100%;padding:5px;"class="submit-btn">
							</div>
						</form>
					</div>

        <!--<div style="margin-left:42%;margin-top:-2%">
        <h4>Cost per table = Rs. 250/- *</h4>
        <h4>Table Capacity : 4 members</h4>
</div>-->


<img src="images/Logo.png" style="margin-left:30%;margin-top:2%;"class="Logo" id="Logo" alt="LOGO">


<script>
	function show_tables(){
		document.getElementById('rest').style.display='block';
		document.getElementById('submit').style.display='block';
		document.getElementById('but').style.display='none'; 




	}









    function goBack() {
            window.history.back();
        }  
		$('.form-control').each(function () {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function () {
			floatedLabel($(this));
		});

		function floatedLabel(input) {
			var $field = input.closest('.form-group');
			if (input.val()) {
				$field.addClass('input-not-empty');
			} else {
				$field.removeClass('input-not-empty');
			}
		}
    function change(element)
{
  var x = document.getElementById(element);
  var v = x.getAttribute("src");
  if(v == "images/table (1).png"){
      alert("TABLE RESERVED ! PLEASE SELECT ANOTHER.")

  }
  else if(v == "images/table (3).png")
    v = "images/table (2).png";
  else
    v = "images/table (3).png";
  x.setAttribute("src", v);	
}

function Func(){
    Logo=document.getElementById('Logo');
    Logo.style.transform="rotate(100000deg)";
    
}
function Check(){
	for(var i=1;i<=4;i++){
			for(var j=1;j<=9;j++){
				ele="f"+i+"t"+j;
				alert(ele);
				var x = document.getElementById(ele);
				  var v = x.getAttribute("src");
				  
  				if(v == "images/table (2).png"){
					v = "images/table (1).png";
					x.setAttribute("src", v);
				  }
		  			
			}
		}
}
    </script>



</body>