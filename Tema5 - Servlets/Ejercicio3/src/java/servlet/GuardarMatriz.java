/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package servlet;

import bean.AlmacenMatrices;
import com.sun.org.apache.xalan.internal.xsltc.compiler.util.Util;
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
public class GuardarMatriz extends HttpServlet {
    
    private AlmacenMatrices almacenMatrices=new AlmacenMatrices();

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        response.setContentType("text/html;charset=UTF-8");
        
        String error="";
        String celda;
        int numFilas= Integer.parseInt(request.getParameter("filas"));
        int numColumnas= Integer.parseInt(request.getParameter("columnas"));
        int matriz[][]= new int[numFilas][numColumnas];
        
        boolean matrizGuardada= false;
        int matricesTotales= 0;
        
        try{
            //dentro del bucle, se buscarĂ¡ cada valor para colocarlo en su celda correspondiente(la tabla ha sido enviada desde IntroCeldas    
            for (int contFil= 1; contFil<= numFilas; contFil++) {  
                for (int contCol= 1; contCol<= numColumnas; contCol++) {
                    celda="celda" + contFil + "" + contCol;
                                        
                    matriz[contFil -1][contCol -1]= Integer.parseInt(request.getParameter(celda));
                }
            }
            
            matrizGuardada= almacenMatrices.guardarMatriz(matriz);
            matricesTotales= almacenMatrices.getMatrices().size();
            
        }catch(Exception e){
            //la excepcion posible es un numberFormatExcepcion, ya que 'celda' puede tener valores nĂºmericos y cadenas vacias("")
            System.out.println(e);
            error="<p style='color: red'>Es necesario rellenar todas las celdas</p>";
        }
        
        try (PrintWriter out = response.getWriter()) {
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet GuardarMatriz</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet GuardarMatriz</h1>");
            
            if(!error.equals("")){
                out.println(error);
            }else{
                if(matrizGuardada){
                    out.println("<p>Tu matriz de " + numFilas + "x" + numColumnas + " ha sido guarda</p>");
                }else{
                    out.println("<p>Tu matriz de " + numFilas + "x" + numColumnas + " NO se ha podido guardar</p>");
                }
                
                out.println("Actualmente hay " + matricesTotales + " matrices guardadas");

                //out.println("<p>numFilas-> " + numFilas + "</p>");
                //out.println("<p>numColumnas-> " + numColumnas + "</p>");
                /*
                for (int i= 0; i <matriz.length; i++) {
                    for (int j= 0; j <matriz[i].length; j++) {
                        out.println("<span>" + matriz[i][j] + "</span>");
                    }
                    out.println("<br>");
                }
                */
                out.println("<p><a href='IntroCeldas'>INTRODUCIR OTRA MATRIZ</a></p>");
                out.println("<p><a href='VisorMatrices'>VER MATRICES</a></p>");
            }
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
