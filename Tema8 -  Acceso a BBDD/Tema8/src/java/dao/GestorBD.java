/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dao;


import java.sql.Connection;
import java.sql.Date;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.time.LocalDate;
import static java.time.temporal.ChronoUnit.DAYS;
import java.util.ArrayList;
import java.util.HashMap;

import java.util.LinkedHashMap;
import java.util.Map;

import org.apache.commons.dbcp2.BasicDataSource;

/**
 *
 * @author Akaitz
 */
public class GestorBD {
    private static final String DRIVER = "com.mysql.jdbc.Driver";
    private static final String URL = "jdbc:mysql://localhost:3306/biblioteca?zeroDateTimeBehavior=CONVERT_TO_NULL";
    private static final String USER = "root";
    private static final String PASS = "";
    private static BasicDataSource dataSource;

    public GestorBD() {
        //Creamos el pool de conexiones
        dataSource = new BasicDataSource();
        dataSource.setDriverClassName(DRIVER);
        dataSource.setUrl(URL);
        dataSource.setUsername(USER);
        dataSource.setPassword(PASS);
        //Indicamos el tamaño del pool de conexiones
        dataSource.setInitialSize(50);
    }
    
    public ArrayList<Map> librosPrestamo(){
        ArrayList<Map> librosPrestamo = new ArrayList<Map>();
        String sql = "SELECT prestamo.id as id, titulo, DATEDIFF(CURRENT_DATE,fecha) as fecha FROM libro,prestamo WHERE libro.id=prestamo.idlibro order by fecha DESC";
        try {
            Connection con = dataSource.getConnection();
            Statement st = con.createStatement();
            ResultSet rs = st.executeQuery(sql);
            while(rs.next()){
                Map libroPrestamo = new HashMap();
                libroPrestamo.put("titulo", rs.getString("titulo"));
                libroPrestamo.put("fecha", rs.getInt("fecha"));
                libroPrestamo.put("id", rs.getInt("id"));
                librosPrestamo.add(libroPrestamo);
            }
            rs.close();
            st.close();
            con.close();
        } catch (SQLException ex) {
            System.err.println("Error en metodo librosPrestados: " + ex);
        }
        return librosPrestamo;
    }
    
    public void devolver(ArrayList<Integer> devoluciones){
        try{    
            Connection con = dataSource.getConnection();
            PreparedStatement ps = con.prepareStatement("DELETE FROM prestamo WHERE id=?");
            for (Integer devolucion : devoluciones) {
                ps.setInt(1, devolucion); 
                ps.executeUpdate();
            }
            ps.close();
            con.close();
        } catch (SQLException ex) {
            System.err.println("Error en metodo devolver: " + ex);
        }
        
    }
}
