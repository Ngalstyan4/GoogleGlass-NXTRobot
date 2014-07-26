<?php



require_once("mysql.php");

mysql::connect();


function setCords($x,$y,$z)
{



	$query = "INSERT INTO `cords`(`x`, `y`,`z`) VALUES ($x,$y,$z)";

	if(mysql_query($query))
		{
	
exit("success");
		}
	else
		{
			exit("error");
		}
}
function getCords()
{

$query = "SELECT * FROM `cords`WHERE 1 LIMIT 1";

if(mysql_num_rows(mysql_query($query))<1)
{
echo "wait";exit();
}
else{
$x = mysql_result(mysql_query($query),0,'x');
$y = mysql_result(mysql_query($query),0,'y');
$z = mysql_result(mysql_query($query),0,'z');




$arr = array
(
"x"=>$x,
"y"=>$y,
"z"=>$z
);
$arr = json_encode($arr);


mysql_query("DELETE FROM `cords` WHERE 1 LIMIT 1");
//exit($arr);
}
$treshold = 2.5;
if($x>$treshold){echo "left#".abs($x);exit();}
else if($x<-1*$treshold){echo "right#".abs($x); exit();}

else if($z>$treshold){echo "down#".abs($z); exit();}
else if($z<-1*$treshold){echo "up#".abs($z); exit();}

else {exit("stop");}







}





if(isset($_GET['x'])&& isset($_GET['y'])&&isset($_GET['z'])){
	setCords($_GET['x'],$_GET['y'],$_GET['z']);
}
if(isset($_GET['getCords'])){
	getCords();
}



?>





<!DOCTYPE HTML>
<html>
  <head>
  <script src="http://code.jquery.com/jquery-2.0.3.js"></script>
    <style>
      body {
        margin: 0px;
        padding: 0px;
      }
	  canvas
	  {
	  border:1px solid #444;
	  }
    </style>
  </head>
  <body>
    <canvas id="myCanvas" width="600" height="400"></canvas>
    <script>
      function writeMessage(canvas, message) {
        var context = canvas.getContext('2d');
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.font = '18pt Calibri';
        context.fillStyle = 'black';
        context.fillText(message, 10, 25);
      }
      function getPos(canvas) {
        
		
		$.get("/LabView/cords/?getCords",function(data)
		{
		data = "\'("+data+")\'";
		console.log(data);
		data = eval(data);
		console.log(data);
		x = data.x;y=data.y;
		x = parseFloat(x);y=parseFloat(y)
		});
        return {
		
          x: x ,
          y: y 
        };
      }
	  
	  $(document).ready(function()
	  {
	     var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');

      canvas.addEventListener('mousemove', function(evt) {
        var mousePos = getPos(canvas);
        var message = 'Mouse position: ' + mousePos.x + ',' + mousePos.y;
        writeMessage(canvas, message);
      }, false);
	  
	  
	  })
   
	  
	  
	  
    </script>
  </body>
</html>