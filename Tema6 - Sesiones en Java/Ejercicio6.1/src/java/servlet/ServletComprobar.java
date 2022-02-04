/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package servlet;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author Javi
 */
public class ServletComprobar extends HttpServlet {
    

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        
        //al entrar aquí, las variables de sesión deberian no ser nulas:
        
        HttpSession sesion = request.getSession(true);
        
        String palabraSecreta= (String)sesion.getAttribute("palabraSecreta");
        ArrayList<String> letrasPalabraSecreta= (ArrayList<String>)sesion.getAttribute("letrasPalabraSecreta");
        int vidas= (int)sesion.getAttribute("vidas");
        ArrayList<Integer> posiciones= (ArrayList<Integer>)sesion.getAttribute("posiciones");
        boolean hasGanado= (boolean)sesion.getAttribute("hasGanado");
        boolean hasPerdido= (boolean)sesion.getAttribute("hasPerdido");
        
        try (PrintWriter out = response.getWriter()) {
            if(vidas!= 0){
                if(request.getParameter("posicion")!= null){
                    posiciones.add( Integer.parseInt(request.getParameter("posicion")) );
                    sesion.setAttribute("posiciones", posiciones);
                    
                    vidas--;
                    sesion.setAttribute("vidas", vidas);
                }else{
                    if( !(request.getParameter("respuesta").equalsIgnoreCase( (String)sesion.getAttribute("palabraSecreta"))) ){
                        vidas--;
                        sesion.setAttribute("vidas", vidas);
                        
                        out.println(request.getParameter("respuesta"));
                        out.println((String)sesion.getAttribute("palabraSecreta"));
                        
                    }else{
                        sesion.setAttribute("hasGanado", true);
                    }
                }
            }else{
                sesion.setAttribute("hasPerdido", true);
            }
        
        
        
        
        
        response.sendRedirect(request.getContextPath()+"/ServletJuego");
        return;
        
        
        
           
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
