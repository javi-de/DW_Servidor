
package bean;

import java.util.ArrayList;

public class Catalogo {
    private final static ArrayList<String> ARR_CATALOGO = new ArrayList<String>(){{
        add("1984");
        add("Caliban y la bruja");
        add("El senior de los anillos");
        add("Hierba de brujas");
        add("Teoria King Kong");
    }};
    
    public static ArrayList<String> getArrCatalogo(){
        return ARR_CATALOGO;
    }
}
