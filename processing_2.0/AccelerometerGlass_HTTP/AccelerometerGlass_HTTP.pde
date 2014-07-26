import android.net.http.*;
import org.apache.http.*;
import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;



//println("Reponse Content: " + get.getContent());
//println("Reponse Content-Length Header: " + get.getHeader("Content-Length"));

AccelerometerManager accel;
float ax, ay, az;
String BASE = "http://Narek.Galstyan1996.student.tumo.org/glass/accel";
String x,y,z;
 HttpResponse response;


void setup() {
  
  
  accel = new AccelerometerManager(this);
// GetRequest get = new GetRequest(BASE+"?x="+x+"&y="+y+"&z="+z);
  orientation(PORTRAIT);
  noLoop();
}


void draw() {
  background(0);
  fill(255);
  textSize(70);
  textAlign(CENTER, CENTER);
 x = nf(ax, 1, 2);
 y = nf(ay, 1, 2);
 z = nf(az, 1, 2);
  text("x: " + x + "\n" + 
       "y: " + y + "\n" + 
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

//get.send();
//println("Reponse Content: " + get.getContent());
delay(200);

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
