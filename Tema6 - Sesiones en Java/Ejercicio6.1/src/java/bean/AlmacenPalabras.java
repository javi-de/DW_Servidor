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
        add("Benemerita");
        add("Torquemada");
        add("Benalmadena");
        add("Sabiñanigo");
        add("Nicomedes");
        add("Ataulfo");
        add("Perogrullo");
        add("Coprofagia");
        add("Hipopótamo");
        add("Cocotero");
        add("Titicaca");
        add("Cacatúa");
        add("Halitosis");
        add("Machupichu");
        add("Pichabrava");
        add("Alioli");
        
    }}; 

    public static String dameUnaPalabra(){
        int numRandom= (int)(Math.random()*ARRALMACEN.size());
        String palabra= ARRALMACEN.get(numRandom).toUpperCase();
        
        return palabra;
    }
 
}
