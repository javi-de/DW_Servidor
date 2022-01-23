/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ejercicio2;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Iterator;
import java.util.Scanner;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author dw2
 */
@WebServlet(name = "ServletFormOpinion", urlPatterns = {"/ServletFormOpinion"})
public class ServletFormOpinion extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        response.setContentType("text/html; charset=UTF-8");
        
        String error= "";
        String link= "";
        boolean formEnviado= false;

        String nombre= request.getParameter("nombre");
        String apellidos= request.getParameter("apellidos");
        String opinionWeb= request.getParameter("opinionWeb");
        String comentarios= request.getParameter("comentarios");
        String[] secciones= request.getParameterValues("secciones");

        //Si se ha pulsado el buton Enviar...
        if(request.getParameter("butEnviar")!= null){
            if(nombre.equalsIgnoreCase("")){
                error+= "Es necesario rellenar el campo Nombre<br>";
            }

            if(apellidos.equalsIgnoreCase("")){
                error+= "Es necesario rellenar el campo Apellidos<br>";
            }

            if(opinionWeb== null){
                error+= "Es necesario rellenar el campo OpinionWeb<br>";
            }

            if(comentarios.equalsIgnoreCase("")){
                error+= "Es necesario rellenar el campo Comentarios<br>";
            }

            if(secciones== null){
                error+= "Es necesario rellenar el campo Secciones<br>";  
            }

            if(error.equals("")){
                formEnviado= true;
                try{
                    link= "ejercicio2/seccionesfavoritas.txt";

                    BufferedWriter bw= new BufferedWriter(new FileWriter(getServletContext().getRealPath("/ejercicio2/seccionesfavoritas.txt")));

                    bw.write(nombre + ":");

                    for(String seccion: secciones){
                        bw.write(seccion + ",");
                    }

                    bw.newLine();
                    bw.close();
                }catch(IOException e){
                    e.printStackTrace();
                }
            }
        }



        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet ServletFormOpinion</title>");            
            out.println("</head>");
            out.println("<body>");
                out.println("<p style='color: red'>" + error + "</p>");

                if(formEnviado== true){
                    out.println("<p style='color: green'>Formulario enviado</p>");
                    out.println("<a href='" + link + "' target='_blank'>Ir a Mis secciones favoritas</a><br><br>");
                }
                
                out.println("<form action='' method='POST'>");
                    out.println("<label for='nombre'><strong>Nombre: </strong></label>");
                    out.println("<input type='text' id='nombre' name='nombre'><br><br>");
                    
                    out.println("<label for='apellidos'><strong>Apellidos: </strong></label>");
                    out.println("<input type='text' id='apellidos' name='apellidos'><br><br>");
                    
                    out.println("<div><strong>Opinión que le ha merecido este sitio web: </strong></div>");
                    out.println("<input type='radio' id='opinionWeb1' name='opinionWeb' value='B'>");
                    out.println("<label for='opinionWeb1'>Buena</label><br>");
                    out.println("<input type='radio' id='opinionWeb2' name='opinionWeb' value='R'>");
                    out.println("<label for='opinionWeb2'>Regular</label><br>");                 
                    out.println("<input type='radio' id='opinionWeb3' name='opinionWeb' value='M'>");
                    out.println("<label for='opinionWeb3'>Mala</label><br><br>");
                    
                    out.println("<label for='comentarios'><strong>Comentarios: </strong></label><br>");
                    out.println("<textarea id='comentarios' name='comentarios'></textarea><br><br>");
                    
                    out.println("<div><strong>Tus secciones favoritas: </strong></div>");
                    try{
                        File fileSecciones= new File(getServletContext().getRealPath("ejercicio2/secciones.txt"));
                        
                        int cont= 1;

                        Scanner reader= new Scanner(fileSecciones);
                        
                        while(reader.hasNextLine()){
                            String linea= reader.nextLine();
                            out.println("<input type='checkbox' id='secciones" + cont + "' name='secciones' value='" + linea + "'>");
                            out.println("<label id='secciones" + cont + "'>" + linea + "</label><br>");
                            cont++;
                        }
                        reader.close();
                    }catch (FileNotFoundException e){
                        System.out.println("ERROR FileNotFound.");
                        e.printStackTrace();
                    }

                    out.println("<br><br><button type='submit' name='butEnviar'>Enviar opinión</button>");

                out.println("</form>");
            
            out.println("</body>");
            out.println("</html>");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
