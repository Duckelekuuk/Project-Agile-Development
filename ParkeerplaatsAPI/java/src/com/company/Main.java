package com.company;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.Arrays;


public class Main {

    public static void main(String[] args) {
	    // Dit java project is gemaakt om de parkeerplaats API metode te ontwikkelen en testen.
        // !!!
        //
        try {
            System.out.println(GetParkingSpotsCount());
        } catch (Exception e){
            System.out.println("Exception: " + e.toString());
        }


    }

    static int GetParkingSpotsCount() throws Exception{
        int availableSpots = 0;
        String[] parkingSpots = {"EVB-P1629220","EVB-P1629218","EVB-P1811500","EVB-P1629219","EVB-P1811123"};
        JSONArray chargingPoints = new JSONArray(Get("https://amsterdam-maps.bma-collective.com/embed/elektrisch/laden/chargingstations.bb.json.php"));
        for (int i=0; i < chargingPoints.length(); i++) {
            JSONObject chargingPoint = chargingPoints.getJSONObject(i);
            if(Arrays.asList(parkingSpots).contains(chargingPoint.get("CSExternalID").toString())){
                JSONArray ports = chargingPoint.getJSONObject("ChargingPoints").getJSONArray("ChargingPoint");
                for(int j=0; j < ports.length(); j++){
                    JSONObject port = ports.getJSONObject(j);
                    if(port.getInt("Status") == 0){
                        availableSpots++;
                    }
                }
            }
        }
        return availableSpots;
    }

    private static String Get(String url) throws Exception {

        URL obj = new URL(url);
        HttpURLConnection con = (HttpURLConnection) obj.openConnection();

        con.setRequestMethod("GET");

        int responseCode = con.getResponseCode();

        BufferedReader in = new BufferedReader(
                new InputStreamReader(con.getInputStream()));
        String inputLine;
        StringBuffer response = new StringBuffer();

        while ((inputLine = in.readLine()) != null) {
            response.append(inputLine);
        }
        in.close();
        return response.toString();
    }
}
