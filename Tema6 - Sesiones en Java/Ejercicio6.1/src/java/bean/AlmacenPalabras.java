/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package bean;

import java.util.ArrayList;

/**
 *
 * @author Javi
 */
public class AlmacenPalabras {
    private final static ArrayList<String> ARRALMACEN= new ArrayList<String>(){{
        add("onomatopeya");
        add("calcamonia");
        add("palangana");
        add("paralelepipedo");
        add("guacho");
    }}; 

    public static String dameUnaPalabra(){
        int numRandom= (int)Math.random()*ARRALMACEN.size();
        String palabra= ARRALMACEN.get(numRandom);
        
        return palabra;
    }
 
}
