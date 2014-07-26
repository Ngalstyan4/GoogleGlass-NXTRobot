GoogleGlass-NXTRobot
====================

This project is a demonstration how to ccontrol NXT Robot with Google Glass.
The ida is that the NXT Robot will move forward, backword, left and right as the one who wears the glass moves
their head correspondingly forward, backward, left and right.
The Glass will use the values of its accelerometer sensor as an indication of its orientation in the space.
Glass communicates with the Robot via internet. 
This Project can be used as a base for many other project for the glass and robot as well, because it makes the bridge between two platforms through internet


A summery of the project:
  1. Google glass connects to the Internet.
  2. Google glass keeps track of its accelerometer values and sends them to server using HTTP protocol. 
  3.Server gets the request made by the Glass and writes the values of the accelerometer in MySql data base.

  4. NXT Robot connects to host computer via Bluetooth.
  5. Host Computer makes and HTTP query to the same server the Glass had written its accelerometer sensror values in order       to get a command for the robot
  6. The Server returns a <code>String</code> type command to the host computer
  7.Host computer send the command to the robot.


Details about how to install:
  In order to run this program on your local machine you need the fallowing software:
      1.LabVIew (2008-2012)
      2.Android SDK (Find here : http://developers.android.com/sdk )
      3. Google glass developmend kit (GDK) from inside SDK tools.
      3.Java jdk (FInd here: http://www.oracle.com/technetwork/java/javase/downloads/jdk8-downloads-2133151.html)
      4./Optional/Processing 2.0 (Find here: http://processing.org)
      5. (Local) server
      6.Mindstorms NXT Robot.
      
  First, you need to upload <pre><code>/ LabView / Robot_glass_control__nxt.vi</code> file into the NXT brick and run  <code>/LabView / Robot_glass_control__computer.vi</code><pre> on your local computer
  Then you need to upload files in PHP folder to your ser/ver and insert table in database folder in your MySql database.
  After finishing this, you just need to copy the URL where your PHP files are, past it in adnroid or processing project as the value of <pre><code>/String BASE</code></pre>
  
  <pre><code>
  AccelerometerManager accel;
float ax, ay, az;
<b>String BASE = "http://Narek.Galstyan1996.student.tumo.org/glass/accel";</b>
String x,y,z;
 HttpResponse response;

  </code></pre>
  
  
  , and run the aplication on your google glass.
  
 
if you are not yet clear how everything works, have a look at  this presentation:
http://prezi.com/h6mpu6rcd3py/?utm_campaign=share&utm_medium=copy
