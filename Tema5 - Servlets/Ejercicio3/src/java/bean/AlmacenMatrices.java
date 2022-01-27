/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package bean;

import java.util.ArrayList;

/**
 *
 * @author dw2
 */
public class AlmacenMatrices {
    private static ArrayList<int[][]> matrices= new ArrayList<int[][]>();
    
    public static boolean guardarMatriz(int[][] matriz){ 
        if(matrices.add(matriz))
            return true;
        
        return false;
    }
    
    public ArrayList<int[][]> getMatrices(){
        return matrices;
    }
    
}
