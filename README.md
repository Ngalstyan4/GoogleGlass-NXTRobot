GoogleGlass-NXTRobot
====================
This project was carried out in <b>TUMO</b> Center for creative technologies (Read more about Tumo at <a href=http://tumo.org>Tumo Webpage</a>).<br\>
This project is a demonstration how to control NXT Robot with Google Glass.
The idea is that the NXT Robot will move forward, backward, left and right as the one who wears the glass moves
their head correspondingly forward, backward, left and right.
The Glass will use the values of its accelerometer sensor as an indication of its orientation in the space.
Glass communicates with the Robot via internet. 
This Project can be used as a base for many other project for the glass and robot as well, because it makes the bridge between two platforms through internet


A summary of the project:
  1. Google glass connects to the Internet.
  2. Google glass keeps track of its accelerometer values and sends them to server using HTTP protocol. 
  3.Server gets the request made by the Glass and writes the values of the accelerometer in MySql data base.

  4. NXT Robot connects to host computer via Bluetooth.
  5. Host Computer makes and HTTP query to the same server the Glass had written its accelerometer sensor values in order       to get a command for the robot
  6. The Server returns a <code>String</code> type command to the host computer
  7.Host computer send the command to the robot.


Details about how to install:<br/>
  In order to run this program on your local machine you need the fallowing software:<br/>
      1.LabVIew (2008-2012).<br/>
      2.Android SDK (Find here : http://developers.android.com/sdk ).<br/>
      3. Google glass development kit (GDK) from inside SDK tools.<br/>
      4.Java jdk (Find here: http://www.oracle.com/technetwork/java/javase/downloads/jdk8-downloads-2133151.html).<br/>
      5./Optional/Processing 2.0 (Find here: http://processing.org).<br/>
      6. (Local) server.<br/>
      7.Mindstorms NXT Robot.<br/>
      
  First, you need to upload <pre><code>/ LabView / Robot_glass_control nxt.vi </code></pre> file into the NXT brick and run  <pre><code>/LabView / Robot_glass_control__computer.vi</code></pre> on your local computer
  Then you need to upload files in PHP folder to your server and insert table in database folder in your MySql database.
  After finishing this, you just need to copy the URL where your PHP files are, past it in android or processing project as the value of <pre><code>/String BASE</code></pre>
  
  <pre><code>
  AccelerometerManager accel;
float ax, ay, az;
<b>String BASE = "http://Narek.Galstyan1996.student.tumo.org/glass/accel";</b>
String x,y,z;
 HttpResponse response;

  </code></pre>
  
  
  , and run the application on your google glass.
  
 
if you are not yet clear how everything works, have a look at  this presentation:
http://prezi.com/h6mpu6rcd3py/?utm_campaign=share&utm_medium=copy
