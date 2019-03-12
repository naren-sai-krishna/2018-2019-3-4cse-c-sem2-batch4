<?php 
require('php/db.php');
session_start();
if(!isset($_SESSION['sfirstname'])){
	header('Location: homepage_before_login.php');
}
if(!isset($_SESSION['date1'])){
	header('Location: tablereserve1.php');
}
$date=$_SESSION['date1'];
$time=$_SESSION['time1'];
$queryRole = "SELECT * FROM table_booking WHERE date_of_booking='$date' and time_='$time'";
$result1=mysqli_query($con,$queryRole) or die(mysqli_error());
$rows1 = mysqli_num_rows($result1);
$row1=mysqli_fetch_assoc($result1);
if(!isset($_SESSION['sfirstname'])){
	header('Location: homepage_before_login.php');
}
if(isset($_POST['submit']))
{
	// function checkImage($id){
	// 	if($id=='')
	// 	$q="Update table_booking set f1t1='images/selected.png' where date_of_booking='$date' and time_='$time'";
	// 	$qq=mysqli_query($con,$q);
		
	// }
	$f1t1=$_POST['f1t1'];$f1t2=$_POST['f1t2'];$f1t3=$_POST['f1t3'];$f1t4=$_POST['f1t4'];$f1t5=$_POST['f1t5'];$f1t6=$_POST['f1t6'];$f1t7=$_POST['f1t7'];$f1t8=$_POST['f1t8'];$f1t9=$_POST['f1t9'];
	$f2t1=$_POST['f2t1'];$f2t2=$_POST['f2t2'];$f2t3=$_POST['f2t3'];$f2t4=$_POST['f2t4'];$f2t5=$_POST['f2t5'];$f2t6=$_POST['f2t6'];$f2t7=$_POST['f2t7'];$f2t8=$_POST['f2t8'];$f2t9=$_POST['f2t9'];
	$f3t1=$_POST['f3t1'];$f3t2=$_POST['f3t2'];$f3t3=$_POST['f3t3'];$f3t4=$_POST['f3t4'];$f3t5=$_POST['f3t5'];$f3t6=$_POST['f3t6'];$f3t7=$_POST['f3t7'];$f3t8=$_POST['f3t8'];$f3t9=$_POST['f3t9'];
	$f4t1=$_POST['f4t1'];$f4t2=$_POST['f4t2'];$f4t3=$_POST['f4t3'];$f4t4=$_POST['f4t4'];$f4t5=$_POST['f4t5'];$f4t6=$_POST['f4t6'];$f4t7=$_POST['f4t7'];$f4t8=$_POST['f4t8'];$f4t9=$_POST['f4t9'];

	$update=mysqli_query($con,"UPDATE table_booking set f1t1='$f1t1', f1t2='$f1t2', f1t3='$f1t3', f1t4='$f1t4', f1t5='$f1t5', f1t6='$f1t6', f1t7='$f1t7', f1t8='$f1t8', f1t9='$f1t9', 
														f2t1='$f2t1', f2t2='$f2t2', f2t3='$f2t3', f2t4='$f2t4', f2t5='$f2t5', f2t6='$f2t6', f2t7='$f2t7', f2t8='$f2t8', f2t9='$f2t9', 
														f3t1='$f3t1', f3t2='$f3t2', f3t3='$f3t3', f3t4='$f3t4', f3t5='$f3t5', f3t6='$f3t6', f3t7='$f3t7', f3t8='$f3t8', f3t9='$f3t9', 
														f4t1='$f4t1', f4t2='$f4t2', f4t3='$f4t3', f4t4='$f4t4', f4t5='$f4t5', f4t6='$f4t6', f4t7='$f4t7', f4t8='$f4t8', f4t9='$f4t9' 
														where date_of_booking='$date' and time_='$time'");
	
	if($update)
		{ 
			$_SESSION['beep']="1";
			?>
 		<script> 
 		alert("Your table has been sucessfully booked!. Thank You");

 		</script> 
<?php
}
header("refresh:0; url=tablereserve.php");
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
                height: 130px;
                width: auto;
                float: left;
                margin-top: 20px;
                transition: 5s linear;
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
.submit-btn {
   
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

.booking-form .submit-btn:hover,
.booking-form .submit-btn:focus {
	opacity: 0.9;
	
}
    </style>
</head>

<body>
<button class="btn" style="position:absolute" onclick="goBack()">Back</button>


<div class="info" style="position:absolute;top:2%;right:5%">
    <img src="images/reserved.png" alt="table">&nbsp;&nbsp;&nbsp;
    <img src="images/selected.png" alt="table">&nbsp;&nbsp;&nbsp;
    <img src="images/available.png" alt="table">
</div>

<div class="info" style="color:white;position:absolute;top:10%;right:5%">
    <span>Reserved</span>&nbsp;&nbsp;&nbsp; 
    <span>Selected</span>&nbsp;&nbsp;&nbsp;
    <span>Available</span>
</div>
                     
				
<form method="post" class="form-inline" > 


<div class="rest">
<div class="form-btn" style="margin:20px;">
<input type="submit" name="submit" value="Book" style="margin-left:500%;width:100%;padding-left:30px;padding-right:30px" class="submit-btn">
</div>

<img src="images/Logo.png" onload="Func()" style="margin-top:150%;margin-left:375%"class="Logo" id="Logo" alt="LOGO">
</div>      
                            
<table style="width:40%;position:absolute;top:0;left:0;">
<caption> <h1>Floor 1</h1></caption>
  
  <tr>
	<td><img src="<?php echo $row1['f1t1']?>" class="table-logo" alt="LOGO" id="f1t1" onclick="change(id)">
	<input hidden type="text" name="f1t1" id="f1t11" value="<?php echo $row1['f1t1']?>"> </td>
    <td><img src="<?php echo $row1['f1t2']?>" class="table-logo" alt="LOGO" id="f1t2" onclick="change(id)">
	<input type="hidden" name="f1t2" id="f1t21" value="<?php echo $row1['f1t2']?>"> </td>
    <td><img src="<?php echo $row1['f1t3']?>" class="table-logo" alt="LOGO" id="f1t3" onclick="change(id)">
	<input type="hidden" name="f1t3" id="f1t31" value="<?php echo $row1['f1t3']?>"> </td>
  </tr>
  <tr>
    <td><img src="<?php echo $row1['f1t4']?>" class="table-logo" alt="LOGO" id="f1t4" onclick="change(id)">
	<input type="hidden" name="f1t4" id="f1t41" value="<?php echo $row1['f1t4']?>"> </td>
    <td><img src="<?php echo $row1['f1t5']?>" class="table-logo" alt="LOGO" id="f1t5" onclick="change(id)">
	<input type="hidden" name="f1t5" id="f1t51" value="<?php echo $row1['f1t5']?>"> </td>
    <td><img src="<?php echo $row1['f1t6']?>" class="table-logo" alt="LOGO" id="f1t6" onclick="change(id)">
	<input type="hidden" name="f1t6" id="f1t61" value="<?php echo $row1['f1t6']?>"> </td>
  </tr>
  <tr>
	<td><img src="<?php echo $row1['f1t7']?>" class="table-logo" alt="LOGO" id="f1t7" onclick="change(id)">
	<input type="hidden" name="f1t7" id="f1t71" value="<?php echo $row1['f1t7']?>"> </td>
    <td><img src="<?php echo $row1['f1t8']?>" class="table-logo" alt="LOGO" id="f1t8" onclick="change(id)">
	<input type="hidden" name="f1t8" id="f1t81" value="<?php echo $row1['f1t8']?>"> </td>
    <td><img src="<?php echo $row1['f1t9']?>" class="table-logo" alt="LOGO" id="f1t9" onclick="change(id)">
	<input type="hidden" name="f1t9" id="f1t91" value="<?php echo $row1['f1t9']?>"> </td>
  </tr>
</table>



<table style="width:40%;position:absolute;bottom:0;left:0;">
<caption> <h1>Floor 3</h1></caption>
  
  <tr>
    <td><img src="<?php echo $row1['f3t1']?>" class="table-logo" alt="LOGO" id="f3t1" onclick="change(id)">
	<input type="hidden" name="f3t1" id="f3t11" value="<?php echo $row1['f3t1']?>"> </td>
    <td><img src="<?php echo $row1['f3t2']?>" class="table-logo" alt="LOGO" id="f3t2" onclick="change(id)">
	<input type="hidden" name="f3t2" id="f3t21" value="<?php echo $row1['f3t2']?>"> </td> 
    <td><img src="<?php echo $row1['f3t3']?>" class="table-logo" alt="LOGO" id="f3t3" onclick="change(id)">
	<input type="hidden" name="f3t3" id="f3t31" value="<?php echo $row1['f3t3']?>"> </td>
  </tr>
  <tr>
    <td><img src="<?php echo $row1['f3t4']?>" class="table-logo" alt="LOGO" id="f3t4" onclick="change(id)">
	<input type="hidden" name="f3t4" id="f3t41" value="<?php echo $row1['f3t4']?>"> </td>
    <td><img src="<?php echo $row1['f3t5']?>" class="table-logo" alt="LOGO" id="f3t5" onclick="change(id)">
	<input type="hidden" name="f3t5" id="f3t51" value="<?php echo $row1['f3t5']?>"> </td>
    <td><img src="<?php echo $row1['f3t6']?>" class="table-logo" alt="LOGO" id="f3t6" onclick="change(id)">
	<input type="hidden" name="f3t6" id="f3t61" value="<?php echo $row1['f3t6']?>"> </td>
  </tr>
  <tr>
    <td><img src="<?php echo $row1['f3t7']?>" class="table-logo" alt="LOGO" id="f3t7" onclick="change(id)">
	<input type="hidden" name="f3t7" id="f3t71" value="<?php echo $row1['f3t7']?>"> </td>
    <td><img src="<?php echo $row1['f3t8']?>" class="table-logo" alt="LOGO" id="f3t8" onclick="change(id)">
	<input type="hidden" name="f3t8" id="f3t81" value="<?php echo $row1['f3t8']?>"> </td>
    <td><img src="<?php echo $row1['f3t9']?>" class="table-logo" alt="LOGO" id="f3t9" onclick="change(id)">
	<input type="hidden" name="f3t9" id="f3t91" value="<?php echo $row1['f3t9']?>"> </td>
  </tr>
</table>

<table style="width:40%;position:absolute;bottom:0;right:0;">
<caption> <h1>Floor 4</h1></caption>
  
  <tr>
    <td><img src="<?php echo $row1['f4t1']?>" class="table-logo" alt="LOGO" id="f4t1" onclick="change(id)">
	<input type="hidden" name="f4t1" id="f4t11" value="<?php echo $row1['f4t1']?>"> </td>
    <td><img src="<?php echo $row1['f4t2']?>" class="table-logo" alt="LOGO" id="f4t2" onclick="change(id)">
	<input type="hidden" name="f4t2" id="f4t21" value="<?php echo $row1['f4t2']?>"> </td>
    <td><img src="<?php echo $row1['f4t3']?>" class="table-logo" alt="LOGO" id="f4t3" onclick="change(id)">
	<input type="hidden" name="f4t3" id="f4t31" value="<?php echo $row1['f4t3']?>"> </td>
  </tr>
  <tr>
    <td><img src="<?php echo $row1['f4t4']?>" class="table-logo" alt="LOGO" id="f4t4" onclick="change(id)">
	<input type="hidden" name="f4t4" id="f4t41" value="<?php echo $row1['f4t4']?>"> </td>
    <td><img src="<?php echo $row1['f4t5']?>" class="table-logo" alt="LOGO" id="f4t5" onclick="change(id)">
	<input type="hidden" name="f4t5" id="f4t51" value="<?php echo $row1['f4t5']?>"> </td> 
    <td><img src="<?php echo $row1['f4t6']?>" class="table-logo" alt="LOGO" id="f4t6" onclick="change(id)">
	<input type="hidden" name="f4t6" id="f4t61" value="<?php echo $row1['f4t6']?>"> </td>
  </tr>
  <tr>
    <td><img src="<?php echo $row1['f4t7']?>" class="table-logo" alt="LOGO" id="f4t7" onclick="change(id)">
	<input type="hidden" name="f4t7" id="f4t71" value="<?php echo $row1['f4t7']?>"> </td>
    <td><img src="<?php echo $row1['f4t8']?>" class="table-logo" alt="LOGO" id="f4t8" onclick="change(id)">
	<input type="hidden" name="f4t8" id="f4t81" value="<?php echo $row1['f4t8']?>"> </td>
    <td><img src="<?php echo $row1['f4t9']?>" class="table-logo" alt="LOGO" id="f4t9" onclick="change(id)">
	<input type="hidden" name="f4t9" id="f4t91" value="<?php echo $row1['f4t9']?>"> </td>
  </tr>
</table>

<table style="width:40%;position:absolute;top:0;right:0;">
<caption> <h1>Floor 2</h1></caption>
  
  <tr>
    <td><img src="<?php echo $row1['f2t1']?>" class="table-logo" alt="LOGO" id="f2t1" onclick="change(id)">
	<input type="hidden" name="f2t1" id="f2t11" value="<?php echo $row1['f2t1']?>"> </td>
    <td><img src="<?php echo $row1['f2t2']?>" class="table-logo" alt="LOGO" id="f2t2" onclick="change(id)">
	<input type="hidden" name="f2t2" id="f2t21" value="<?php echo $row1['f2t2']?>"> </td> 
    <td><img src="<?php echo $row1['f2t3']?>" class="table-logo" alt="LOGO" id="f2t3" onclick="change(id)">
	<input type="hidden" name="f2t3" id="f2t31" value="<?php echo $row1['f2t3']?>"> </td>
  </tr>
  <tr>
    <td><img src="<?php echo $row1['f2t4']?>" class="table-logo" alt="LOGO" id="f2t4" onclick="change(id)">
	<input type="hidden" name="f2t4" id="f2t41" value="<?php echo $row1['f2t4']?>"> </td>
    <td><img src="<?php echo $row1['f2t5']?>" class="table-logo" alt="LOGO" id="f2t5" onclick="change(id)">
	<input type="hidden" name="f2t5" id="f2t51" value="<?php echo $row1['f2t5']?>"> </td>
    <td><img src="<?php echo $row1['f2t6']?>" class="table-logo" alt="LOGO" id="f2t6" onclick="change(id)">
	<input type="hidden" name="f2t6" id="f2t61" value="<?php echo $row1['f2t6']?>"> </td>
  </tr>
  <tr>
    <td><img src="<?php echo $row1['f2t7']?>" class="table-logo" alt="LOGO" id="f2t7" onclick="change(id)">
	<input type="hidden" name="f2t7" id="f2t71" value="<?php echo $row1['f2t7']?>"> </td>
    <td><img src="<?php echo $row1['f2t8']?>" class="table-logo" alt="LOGO" id="f2t8" onclick="change(id)">
	<input type="hidden" name="f2t8" id="f2t81" value="<?php echo $row1['f2t8']?>"> </td>
    <td><img src="<?php echo $row1['f2t9']?>" class="table-logo" alt="LOGO" id="f2t9" onclick="change(id)">
	<input type="hidden" name="f2t9" id="f2t91" value="<?php echo $row1['f2t9']?>"> </td>
  </tr>
</table>


                    


<script>
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
	var x11= document.getElementById(element+"1");
	var x1=x11.getAttribute("value");
  	var v = x.getAttribute("src");

  if(v == "images/reserved.png"){
      alert("TABLE RESERVED ! PLEASE SELECT ANOTHER.")
	  v1= "<?php echo 'images/reserved.png'?>";
  }
  else if(v == "images/available.png"){
	v = "images/selected.png";
	v1= "<?php echo 'images/reserved.png'?>";
  }
  else{
	v = "images/available.png";
	v1= "<?php echo 'images/available.png'?>";
  }
  x11.setAttribute("value", v1);
  x.setAttribute("src", v);	
// 	var x = document.getElementById(element).src;
//   $.post("aa.php",{aaa:x}, function(data){
// 	alert(data);
// 	("#"+element).html(data);	
	
//   });
}

function Func(){
    Logo=document.getElementById('Logo');
    Logo.style.transform="rotate(10000deg)";
    
}
function Check(){
	
	var hr = new XMLHttpRequest();
   
    var url = "aa.php";
    var parm1=document.getElementById('f1t11').value;
    var parm2=document.getElementById('f1t12').value;
    var parm3=document.getElementById('f1t13').value;
    var parm4=document.getElementById('f1t14').value;
    document.write("hello");
    var vars = "parm1="+parm1+"&parm2="+parm2+"&parm3="+parm3+"&parm4="+parm4;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.write("yes");
			document.getElementById("status").innerHTML = return_data;
	    }
		else{
			document.write("NO");
		}
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
               

	// for(var i=1;i<=4;i++){
	// 		for(var j=1;j<=9;j++){
	// 			ele="f"+i+"t"+j;
				
	// 			var x = document.getElementById(ele);
	// 			  var v = x.getAttribute("src");
				  
  	// 			if(v == "images/selected.png"){
	// 				v = "images/reserved.png";
	// 				x.setAttribute("src", v);
	// 			  }
		  			
	// 		}
	// 	}

}
    </script>


</form>
</body>