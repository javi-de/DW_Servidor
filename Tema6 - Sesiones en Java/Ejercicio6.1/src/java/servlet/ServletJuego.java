/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package servlet;

import bean.AlmacenPalabras;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Javi
 */
public class ServletJuego extends HttpServlet {
        
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        response.setContentType("text/html;charset=UTF-8");
        
        String palabraSecreta= AlmacenPalabras.dameUnaPalabra();
        int vidas= (int)palabraSecreta.length()/2;

        
        try (PrintWriter out = response.getWriter()) {
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>ServletJuego</title>");            
            out.println("</head>");
            out.println("<body>");
            
                out.println("<table  border='1'>");
                out.println("<tr>");
                    for (int i = 0; i < palabraSecreta.length(); i++) {
                        if(1==1){
                           out.println("<td>" + palabraSecreta.charAt(i) + "<td>");
                        }else{
                          out.println("<td><a href='#?posicion=" + i + "'>Ver</a><td>");

                        }
                        //out.println("<td>" + palabraSecreta.charAt(i) + "</td>");
                    }
                out.println("<tr>");
                out.println("</table>");
                out.println("<p>" + vidas + " vidas restantes</p>");

                out.println("<form action='' method='POST'>");
                    out.println("<label for='respuesta'>Tu respuesta: </label>");
                    out.println("<input type='text' name='respuesta' id='respuesta'>");
                    
                    out.println("<button type='submit' name='butComprobar'>Comprobar</button>");
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
