/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package servlet;

import bean.AlmacenMatrices;
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
public class VisorMatrices extends HttpServlet {

    private AlmacenMatrices almacenMatrices=new AlmacenMatrices();

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        
        
        ArrayList<int[][]> matrices= almacenMatrices.getMatrices();
        
        try (PrintWriter out = response.getWriter()) {
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet VisorMatrices</title>");            
            out.println("</head>");
            out.println("<body>");
            
            
            out.println("<h1>Servlet VisorMatrices at " + request.getContextPath() + "</h1>");
            
            
            
            for (int[][] matriz : matrices) {
                out.println("<table border='1'>");
                for (int i= 0; i <matriz.length; i++) {
                    out.println("<tr>");
                    for (int j= 0; j <matriz[i].length; j++) {
                        out.println("<td>" + matriz[i][j] + "</td>");
                    }
                    out.println("</tr>");
                }
                out.println("</table>");
                out.println("<br><br>");
            }
                out.println("<p><a href='IntroCeldas'>INTRODUCIR OTRA MATRIZ</a></p>");
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
