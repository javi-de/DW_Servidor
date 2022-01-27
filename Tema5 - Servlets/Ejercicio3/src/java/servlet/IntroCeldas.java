package servlet;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class IntroCeldas extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        response.setContentType("text/html;charset=UTF-8");

        // si se accede a esta página sin pulsar el boton "Generar tabla", volverá al index.html
        if(request.getParameter("butGenerar")== null){
            response.sendRedirect(request.getContextPath());
            return;
        }
        
        int numFilas;
        if(request.getParameter("filas").isEmpty() || request.getParameter("filas").equalsIgnoreCase("0")){
            numFilas= 0;
        }else{
            numFilas= Integer.parseInt(request.getParameter("filas"));
        }
        
        int numColumnas;
        if(request.getParameter("columnas").isEmpty() || request.getParameter("columnas").equalsIgnoreCase("0")){
            numColumnas= 0;
        }else{
            numColumnas= Integer.parseInt(request.getParameter("columnas"));
        }

        boolean fondoGris;
        if(request.getParameter("checkFondo")!= null){
            fondoGris= true;
        }else{
            fondoGris= false;
        }

        if(numFilas== 0 || numColumnas== 0){
            response.sendRedirect(request.getContextPath() + "/index.html");
        }else{
            try (PrintWriter out = response.getWriter()) {
                out.println("<!DOCTYPE html>");
                out.println("<html>");
                out.println("<head>");
                out.println("<title>Servlet IntroCeldas</title>");            
                out.println("</head>");
                out.println("<body>");
                    out.println("<h1>INTRODUCE VALORES EN LAS CELDAS</h1>");

                    out.println("<p>numFilas-> " + numFilas + "</p>");
                    out.println("<p>numColumnas-> " + numColumnas + "</p>");
                    out.println("<p>fondoGris->" + fondoGris + "</p>");

                    out.println("<form action='GuardarMatriz' method='POST'>");
                        out.println( dibujaMatriz(numFilas, numColumnas, fondoGris) );
                        out.println("<input type='submit' value='Guardar matriz'>");
                        out.println("<input type='reset' value='Restablecer'>");
                    out.println("</form>");

                out.println("</body>");
                out.println("</html>");
            }
        }
        
    }

    private static String dibujaMatriz(int numFilas, int numColumnas, boolean fondoGris){
            String tabla="";

            if(fondoGris== true){
                tabla+= "<table border='1' style='background-color: grey'>";  
            }else{
                tabla+= "<table border='1'>";  
            }

            for(int contFil= 1; contFil<= numFilas; contFil++){
                tabla+= "<tr>";
                for(int contCol=1; contCol<= numColumnas; contCol++){
                    tabla+= "<td>";
                    tabla+= "<input type='number' name='celda" + contFil + contCol + "'>";
                    tabla+= "</td>";
                }
                tabla+= "</tr>";
            } 
            tabla+= "</table>";  
        
        return tabla;
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
