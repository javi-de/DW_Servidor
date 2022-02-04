/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package servlets;

import beans.Cuenta;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author Javi
 */
public class ServletNuevaCuenta extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        response.setContentType("text/html;charset=UTF-8");
        
        HttpSession sesion = request.getSession(true);
        
        Cuenta cuenta;
        String titular= "";
        float saldo= 0;
        String erroresCreacion= "";

        if(request.getParameter("butCrear")!= null){
            
            System.out.println("titular: " + request.getParameter("titular"));
            System.out.println("saldo: " + request.getParameter("saldo"));

            //control de errores para titular
            if(request.getParameter("titular").equals("")){
                erroresCreacion+= "Titular vacío<br>"; 
            }else if(1==1){
                /***titular prohibido**/
            }else{
                titular= request.getParameter("titular");
            }
            
            //control de errores para saldoIni           
            if(!request.getParameter("saldoIni").isEmpty()){
                saldo= Float.parseFloat(request.getParameter("saldoIni"));
                if( saldo < 0 ){
                    erroresCreacion+= "Saldo negativo<br>";
                }
            }
            
            cuenta= new Cuenta(titular, saldo);
            sesion.setAttribute("cuenta", cuenta);
            
            if(erroresCreacion.equals("")){               
                response.sendRedirect(request.getContextPath()+"/movimientos.jsp");
                return;
            }else{
                sesion.setAttribute("erroresCreacion", erroresCreacion);
                
                response.sendRedirect(request.getContextPath()+"/nuevaCuenta.jsp");
                return;
            }
            
            
        }
        
        
        
        /*try (PrintWriter out = response.getWriter()) {
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet ServletNuevaCuenta</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet ServletNuevaCuenta at " + request.getContextPath() + "</h1>");
            out.println("</body>");
            out.println("</html>");
        }*/
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
