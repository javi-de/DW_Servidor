package com.javi.ejercicio1.servlets;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author dw2
 */
public class ServletConversor extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        
        
        if(request.getParameter("butCelFah")!= null){
            String strCelsius = request.getParameter("celsius");
            
            System.out.println("Procesando petición.");
            
            if(strCelsius == null || strCelsius.equals("")){
                System.out.println("Generando página error");
                crearPáginaError(request, response, "No ha introducido ningún valor");
                return;
            }
            
            try{
                 double celsius= 
                
                
            }catch(NumberFormatException e){
                
            }
        }
        
        
        
        
        
        
        
        /*
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet ServletConversor</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Parametros: " + request.getParameter("celsius")+ "</h1>");
            out.println("</body>");
            out.println("</html>");
        }
        */
    }
    
    
    
    private void crearPáginaError(HttpServletRequest request, HttpServletResponse response, String mensajeError) throws ServletException, IOException{
    response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet ServletConversor</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h2>" + mensajeError + "</h2>");
            out.println("<a href='http://localhost:8080/Ejercicio1/'>Volver al formulario</a>");
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
 