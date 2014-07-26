package processing.test.accelerometerglass_http;

import processing.core.*; 
import processing.data.*; 
import processing.event.*; 
import processing.opengl.*; 

import android.net.http.*; 
import org.apache.http.*; 
import org.apache.http.HttpResponse; 
import org.apache.http.client.ClientProtocolException; 
import org.apache.http.client.HttpClient; 
import org.apache.http.client.methods.HttpGet; 
import org.apache.http.impl.client.DefaultHttpClient; 

import java.util.HashMap; 
import java.util.ArrayList; 
import java.io.File; 
import java.io.BufferedReader; 
import java.io.PrintWriter; 
import java.io.InputStream; 
import java.io.OutputStream; 
import java.io.IOException; 

public class AccelerometerGlass_HTTP extends PApplet {












AccelerometerManager accel;
float ax, ay, az;
String BASE = "http://narek.galstyan1996.student.tumo.org/glass/accel";//write your base URL here
String x,y,z;
 HttpResponse response;


public void setup() {
  
  
  accel = new AccelerometerManager(this); //DEFINE ACCELEROMETER
// GetRequest get = new GetRequest(BASE+"?x="+x+"&y="+y+"&z="+z);
  orientation(PORTRAIT);
  noLoop();
}


public void draw() {
  background(0);
  fill(255);
  textSize(70);
  textAlign(CENTER, CENTER);
 x = nf(ax, 1, 2);
 y = nf(ay, 1, 2);
 z = nf(az, 1, 2);
  text("x: " + x + "\n" + //DEBUG MODE: SEE ACCELEROMETER 
       "y: " + y + "\n" + //PARAMETERS HERE
       "z: " + z + "\n", 
       0, 0, width, height);
       
try {
      DefaultHttpClient httpClient = new DefaultHttpClient();

      HttpGet httpGet = new HttpGet(BASE+"?x="+x+"&y="+y+"&z="+z);

       response = httpClient.execute(httpGet);
      HttpEntity entity = response.getEntity();
      //this.content = EntityUtils.toString(response.getEntity());
      
     // if( entity != null ) EntityUtils.consume(entity);
      httpClient.getConnectionManager().shutdown();
      
    } catch( Exception e ) { 
     // e.printStackTrace(); 
    }


delay(10);

}
  
public void resume() {
  if (accel != null) {
    accel.resume();
  }
}

    
public void pause() {
  if (accel != null) {
    accel.pause();
  }
}


public void shakeEvent(float force) {
  println("shake : " + force);
}


public void accelerationEvent(float px, float py, float pz) {
 println("acceleration: " + px + ", " + py + ", " + pz);
  ax = px;
  ay = py;
  az = pz;
  redraw();
}

}
