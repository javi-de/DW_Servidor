/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package servlet;

import bean.Catalogo;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;


public class ServletFormLibros extends HttpServlet {

    Catalogo catalogo= new Catalogo();
    
    ArrayList<String> arrCatalogo= catalogo.getArrCatalogo();
    ArrayList<String> librosGuardadosEnSesion= new ArrayList<String>();
    ArrayList<String> librazos= new ArrayList<String>();

    
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        
        HttpSession sesion = request.getSession(true);
                
        //(ArrayList<String>)sesion.getAttribute("librosElegidos");

        String libroSelec= "";
        
        String mensajeError="";
        
        if(request.getParameter("butAgregar")!= null || request.getParameter("lstLibros")!= null){
            libroSelec= request.getParameter("lstLibros");

            if(librosGuardadosEnSesion.contains(libroSelec)){
                mensajeError= "El libro " + libroSelec + " ya está guardado en la sesión";
            }else{
                librosGuardadosEnSesion.add(libroSelec);
                sesion.setAttribute("misLibros", librosGuardadosEnSesion);
            }
            
            
            //si en la sesión no existe el atributo misLibros, se crea y se le vinculan los libros
            
        }
        
        if(request.getParameter("butReiniciar")!= null){
            sesion.invalidate();
            sesion = request.getSession(true);
        }
        

        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet ServletFormLibros</title>");            
            out.println("</head>");
            out.println("<body>");
                out.println("<h1>ServletFormLibros</h1>");
                out.println("<p>Elige el libro de la lista que quieras agregar a tu sesión: </p>");
                
                out.println("<form action='' method='POST'>");
                    out.println("<select name='lstLibros'>");
                        for(String nombreLibro : arrCatalogo) {
                            if(libroSelec.equalsIgnoreCase(nombreLibro)){ //Las tildes y las ñ y demás caracteres del estilo, hacen que no funcione correctamente
                                out.println("<option value='" + nombreLibro + "' selected>" + nombreLibro + "</option>");
                            }else{
                                out.println("<option value='" + nombreLibro + "'>" + nombreLibro + "</option>");
                            }
                        }
                    out.println("</select>");
                    out.println("<button type='submit' name='butAgregar'>AGREGAR</button>");
                    
                    if(mensajeError.equalsIgnoreCase("")){
                        out.println("</select>");
                    }else{
                    }
                    
                    if(sesion.getAttribute("misLibros")== null){
                        out.println("<h2>No hay ningún libro guardado en tu sesión</h2>");    
                    }else{
                        librazos= (ArrayList<String>)sesion.getAttribute("misLibros");
                        out.println("<h2>TUS LIIBRAZOS: </h2>");
                        out.println("<ul>");
                            for(String nombreLibro : librazos) {
                                out.println("<li>" + nombreLibro + "</li>");
                            }
                        out.println("</ul>"); 
                        
                        out.println("<h2>TU ELECCIÓN: </h2>");
                        out.println("<ul>");
                            for(String nombreLibro : librosGuardadosEnSesion) {
                                out.println("<li>" + nombreLibro + "</li>");
                            }
                        out.println("</ul>");               
                    }
                    
                    out.println("<button type='submit' name='butReiniciar'>Reiniciar sesión</button>");

                    
                    out.println();
                    out.println();
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
