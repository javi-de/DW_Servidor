package beans;


public class Cuenta {
    private String titular;
    private float saldo;
    
    public Cuenta(String titular, float saldo){
        this.titular= titular;
        this.saldo= saldo;
    }
    
    public boolean gastar(float cantidad){
        if(this.saldo < cantidad){
            this.saldo-= cantidad;
            return true;
        }
        
        return false;
    }
    
    public void ingresar(float cantidad){
        this.saldo+= cantidad;
    }
    
    public String getTitular() {
        return titular;
    }

    public void setTitular(String titular) {
        this.titular = titular;
    }

    public float getSaldo() {
        return saldo;
    }

    public void setSaldo(float saldo) {
        this.saldo = saldo;
    }
}
