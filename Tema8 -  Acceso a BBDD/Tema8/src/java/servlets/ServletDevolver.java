/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package servlets;

import dao.GestorBD;
import java.io.IOException;
import java.util.ArrayList;
import javax.servlet.ServletConfig;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author dw2
 */
public class ServletDevolver extends HttpServlet {
    private GestorBD bd;
    
    @Override
    public void init(ServletConfig config) throws ServletException {
        super.init(config);
        bd = new GestorBD();
    }
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
        HttpSession session=request.getSession(true);
        
        
        
        if(request.getParameter("marcar")!=null){
            ArrayList<Integer> devoluciones;
            if(session.getAttribute("devoluciones")==null){
                devoluciones=new ArrayList<Integer>();
            } else {
                devoluciones=(ArrayList<Integer>)session.getAttribute("devoluciones");
            }
            if(!devoluciones.contains(Integer.parseInt(request.getParameter("marcar")))){
                devoluciones.add(Integer.parseInt(request.getParameter("marcar")));
            }
            session.setAttribute("devoluciones", devoluciones);
        }
        if(request.getParameter("revertir")!=null){
            ArrayList<Integer> devoluciones;
            if(session.getAttribute("devoluciones")==null){
                devoluciones=new ArrayList<Integer>();
            } else {
                devoluciones=(ArrayList<Integer>)session.getAttribute("devoluciones");
            }
            devoluciones.remove(Integer.valueOf(request.getParameter("revertir")));
            session.setAttribute("devoluciones", devoluciones);
        }
        if(request.getParameter("grabar")!=null){
            ArrayList<Integer> devoluciones;
            if(session.getAttribute("devoluciones")==null){
                devoluciones=new ArrayList<Integer>();
            } else {
                devoluciones=(ArrayList<Integer>)session.getAttribute("devoluciones");
            }
            bd.devolver(devoluciones);
            session.removeAttribute("devoluciones");
            session.removeAttribute("librosPrestamo");
        }
        
        if(session.getAttribute("librosPrestamo")==null){
            session.setAttribute("librosPrestamo", bd.librosPrestamo());
        }
        
        request.getRequestDispatcher("/E1/devoluciones.jsp").forward(request, response);
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
