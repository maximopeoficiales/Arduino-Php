#define BLYNK_PRINT Serial
#include <ESP8266WiFi.h>
#include <BlynkSimpleEsp8266.h>
BlynkTimer timer;

const char* auth = "Ay3UaytnGZg7E5q_LVM8j_UpAL2tofjn"; //token blynk
const char* ssid = "arduino"; //nombre del wifi
const char* pass = "123456789"; //pass del wifi
char host[]  = "192.168.137.1"; //host del ipconfig ipv4 adaptador ethernet ethernet
int flag=0;

String chipid = ""; //el id del chip
String accion = "Puerta abierta bro"; //el msg que se mandara

void notifyOnButtonPress()
{
  int isButtonPressed = digitalRead(D1);
  if (isButtonPressed==1 && flag==0) {
    
  Serial.print("chipId: "); 
  chipid = String(ESP.getChipId());
  Serial.println(chipid);

  Serial.print("connecting to ");
  Serial.println(host);

  WiFiClient client;
  const int httpPort = 80; //puerto del phpmyadmin
  if(!client.connect(host, httpPort)){ //abre la conexion, pregunta si no hubo conexion, imprime la lina de abajo
    Serial.println("connection failed");
    return;
  }

  String url = "http://localhost/Prueba/enviar_datos.php"; //url donde se envian los datos

  String data = "chipId="+ chipid +"&accion="+ accion;

  Serial.print("Requesting URL: ");
  Serial.println(url);

  client.print(String("POST ") + url + " HTTP/1.1" + "\r\n" + 
               "Host: " + host + "\r\n" +
               "Accept: */*" + "*\r\n" +
               "Content-Length: " + data.length() + "\r\n" +
               "Content-Type: application/x-www-form-urlencoded" + "\r\n" +
               "\r\n" + data);

  Serial.println("Respond:");
  while(client.available()){
    String line = client.readStringUntil('\r');
    Serial.print(line);
  }

    Serial.println("Alguien ha abierto la puerta");
    Blynk.notify(accion);
    Serial.println("closing connection");
    flag=1;
  }
  else if (isButtonPressed==0)
  {
    
    flag=0;
        
  }
}

void setup() {
  Serial.begin(9600);
Blynk.begin(auth, ssid, pass);
pinMode(D1,INPUT_PULLUP);
timer.setInterval(16000L,notifyOnButtonPress);
}

void loop() {
  Blynk.run();
  timer.run();
}
