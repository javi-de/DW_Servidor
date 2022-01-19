/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package servlet;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletContext;
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
        
        
        response.setContentType("text/html;charset=UTF-8");
        
        String error="";
        String link="";

        
        
        
        
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet ServletFormOpinion</title>");            
            out.println("</head>");
            out.println("<body>");
                out.println("<p style='color: red'>" + error + "</p>");
                out.println();
                
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
                    out.println("<input type='textarea' id='comentarios' name='comentarios'><br><br>");
                    
                    out.println("<div><strong>Tus secciones favoritas: </strong></div>");
                    out.println("<input type='checkbox' id='' name='' value=''>");
                    out.println("<label for=''></label><br>");
                    out.println("<input type='checkbox' id='' name='' value=''>");
                    out.println("<label for=''></label><br>");
                    out.println("<input type='checkbox' id='' name='' value=''>");
                    out.println("<label for=''></label><br>");
                    out.println("<input type='checkbox' id='' name='' value=''>");
                    out.println("<label for=''></label><br>");
                    out.println("<input type='checkbox' id='' name='' value=''>");
                    out.println("<label for=''></label><br>");
                    out.println("<input type='checkbox' id='' name='' value=''>");
                    out.println("<label for=''></label><br>");
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
