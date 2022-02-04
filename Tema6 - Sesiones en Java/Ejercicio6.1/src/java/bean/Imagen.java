package bean;


public class Imagen {
    private String ruta;
    private String nombre;
    private long tamanio;
    
    
    public Imagen(String ruta, String nombre, long tamanio){
        this.ruta= ruta;
        this.nombre= nombre;
        this.tamanio= tamanio;
    }
    
     public String getRuta() {
        return ruta;
    }

    public String getNombre() {
        return nombre;
    }

    public long gettamanio() {
        return tamanio;
    }
    
    public String tamanioDesglosado(){
        String tamanioDesglos= "";
        
        double bytes= tamanio%1024;
        
        tamanioDesglos= bytes+" bytes ";
        
        if(tamanio> 1024){
            double Kb = tamanio/1024%1024;
            tamanioDesglos=Kb + " Kb " + tamanioDesglos;
        }
        
        if(tamanio>(1024*1024)){
            double Mb = tamanio/1024/1024%1024;
            tamanioDesglos=Mb + " Mb " + tamanioDesglos;
        }
        
        return tamanioDesglos;
    }
    
}
