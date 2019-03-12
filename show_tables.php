
<?php
require('php/db.php');
session_start();
if(!isset($_SESSION['sfirstname'])){
    header('Location: homepage_before_login.php');
}
?>

<html>
<head>
<link rel="icon" href="images/Logo.png">
<meta http-equiv="refresh" content="5; URL=show_tables.php">
 <title>Tables Booked</title>
 <style>
    thead tr th
{
    text-align:center;
    max-width:1000px;
}
tbody
{
    position: relative;
    max-height: 100px;
    overflow-x:auto;

}
tbody tr td
{
    width:1000px;
}

  table {
   
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 15px;
   text-align: left;
   
     } 
     table, th,td{
       border-collapse:collapse;
      border: 2px solid #588c7e;
      text-align:center;
     }
  th {
    width:100%;
   background-color: #588c7e;
   color: white;
   padding-left:60px;
   padding-right:60px;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<body>
<div class="tablestuff">
<table >
<thead >
 <tr>
  <th>ID</th> 
  <th>Phone</th> 
  <th>Date</th>
  <th>Time</th>
  <th>F1T1</th>
  <th>F1T2</th>
  <th>F1T3</th>
  <th>F1T4</th>
  <th>F1T5</th>
  <th>F1T6</th>
  <th>F1T7</th>
  <th>F1T8</th>
  <th>F1T9</th>
  <th>F2T1</th>
  <th>F2T2</th>
  <th>F2T3</th>
  <th>F2T4</th>
  <th>F2T5</th>
  <th>F2T6</th>
  <th>F2T7</th>
  <th>F2T8</th>
  <th>F2T9</th>
  <th>F3T1</th>
  <th>F3T2</th>
  <th>F3T3</th>
  <th>F3T4</th>
  <th>F3T5</th>
  <th>F3T6</th>
  <th>F3T7</th>
  <th>F3T8</th>
  <th>F3T9</th>
  <th>F4T1</th>
  <th>F4T2</th>
  <th>F4T3</th>
  <th>F4T4</th>
  <th>F4T5</th>
  <th>F4T6</th>
  <th>F4T7</th>
  <th>F4T8</th>
  <th>F4T9</th>

 </tr></thead>
 <?php
  
  $date_today = date('Y-m-d');
  $sql = "SELECT * FROM table_booking WHERE date_of_booking >= '$date_today'";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
     $last_id=$row["id"];
     $date=$row['date_of_booking'];
     
  
    echo 
    "<tbody>" . 
    "<tr><td>" . $row["id"] . 
    "</td><td>" . $row["phone"] . 
    "</td><td>" . $row["date_of_booking"] . 
    "</td><td>" . $row["time_"] . 
    "</td><td>" . "<img src=" . $row["f1t1"] . ">" . 
    "</td><td>" . "<img src=" . $row["f1t2"] . ">" . 
    "</td><td>" . "<img src=" . $row["f1t3"] . ">" . 
    "</td><td>" . "<img src=" . $row["f1t4"] . ">" . 
    "</td><td>" . "<img src=" . $row["f1t5"] . ">" . 
    "</td><td>" . "<img src=" . $row["f1t6"] . ">" . 
    "</td><td>" . "<img src=" . $row["f1t7"] . ">" . 
    "</td><td>" ."<img src=" . $row["f1t8"] . ">" . 
    "</td><td>" . "<img src=" . $row["f1t9"] . ">" . 
    "</td><td>" . "<img src=" . $row["f2t1"] . ">" . 
    "</td><td>" . "<img src=" . $row["f2t2"] . ">" . 
    "</td><td>" . "<img src=" . $row["f2t3"] . ">" . 
    "</td><td>" . "<img src=" . $row["f2t4"] . ">" . 
    "</td><td>" . "<img src=" . $row["f2t5"] . ">" . 
    "</td><td>" . "<img src=" . $row["f2t6"] . ">" . 
    "</td><td>" . "<img src=" . $row["f2t7"] . ">" . 
    "</td><td>" ."<img src=" . $row["f2t8"] . ">" . 
    "</td><td>" . "<img src=" . $row["f2t9"] . ">" . 
    "</td><td>" . "<img src=" . $row["f3t1"] . ">" . 
    "</td><td>" . "<img src=" . $row["f3t2"] . ">" . 
    "</td><td>" . "<img src=" . $row["f3t3"] . ">" . 
    "</td><td>" . "<img src=" . $row["f3t4"] . ">" . 
    "</td><td>" . "<img src=" . $row["f3t5"] . ">" . 
    "</td><td>" . "<img src=" . $row["f3t6"] . ">" . 
    "</td><td>" . "<img src=" . $row["f3t7"] . ">" . 
    "</td><td>" ."<img src=" . $row["f3t8"] . ">" . 
    "</td><td>" . "<img src=" . $row["f3t9"] . ">" . 
    "</td><td>" . "<img src=" . $row["f4t1"] . ">" . 
    "</td><td>" . "<img src=" . $row["f4t2"] . ">" . 
    "</td><td>" . "<img src=" . $row["f4t3"] . ">" . 
    "</td><td>" . "<img src=" . $row["f4t4"] . ">" . 
    "</td><td>" . "<img src=" . $row["f4t5"] . ">" . 
    "</td><td>" . "<img src=" . $row["f4t6"] . ">" . 
    "</td><td>" . "<img src=" . $row["f4t7"] . ">" . 
    "</td><td>" ."<img src=" . $row["f4t8"] . ">" . 
    "</td><td>" . "<img src=" . $row["f4t9"] . ">" . 
    "</td><td>" . "</tbody>";
    
}
echo "</table>" . "</div>";
} 

?>
</table>
<script>
var beep = (function () {
    var ctxClass = window.audioContext ||window.AudioContext || window.AudioContext || window.webkitAudioContext
    var ctx = new ctxClass();
    return function (duration, type, finishedCallback) {

        duration = +duration;

        // Only 0-4 are valid types.
        type = (type % 5) || 0;

        if (typeof finishedCallback != "function") {
            finishedCallback = function () {};
        }

        var osc = ctx.createOscillator();

        osc.type = type;
        //osc.type = "sine";

        osc.connect(ctx.destination);
        if (osc.noteOn) osc.noteOn(0);
        if (osc.start) osc.start();

        setTimeout(function () {
            if (osc.noteOff) osc.noteOff(0);
            if (osc.stop) osc.stop();
            finishedCallback();
        }, duration);

    };
})();

function beep1() {
    var snd = new Audio("data:audio/wav;base64,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qJrx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU=");  
    snd.play();
}

var k="<?php echo $_SESSION['beep'];?>";
if(k=="1"){
  beep(1000, 2, function () {"<?php $_SESSION['beep']="0";?>"});
 
}



setTimeout(function(){
   window.location.reload(1);
}, 5000);
</script>
</body>
</html>
