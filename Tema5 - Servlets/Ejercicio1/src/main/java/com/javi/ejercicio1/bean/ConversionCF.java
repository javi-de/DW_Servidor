package com.javi.ejercicio1.bean;

public class ConversionCF {
        private double celsius;
        private double fahrenheit;
        
        
        public ConversionCF(double temp, char tipoTemp){
        //tipoTemp: 'c' --> conversion de celsius a fahrenheit
        //          'f' --> conversion de fahrenheit a celsius
            if(tipoTemp== 'c'){
                celsius= temp;
                fahrenheit= Cel_to_Fah(temp);
            }
            
            if(tipoTemp== 'f'){
                fahrenheit= temp;
                celsius= Fah_to_Cel(temp);            }
        }
        
        //conversores de temperaturas
        private double Cel_to_Fah(double temp){
            return ( (temp*9/5) + 32); //devuelve en Fahrenheit
        }
        
        private double Fah_to_Cel(double temp){
            return ( (temp - 32)*5/9  ); //devuelve en Celsius
        }
        
        //getters
        public double getCelsius(){
            return celsius;
        }
        
        public double getFahrenheit(){
            return fahrenheit;
        }
}
