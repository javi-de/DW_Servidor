
package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet(name="HolaMundoServlet", urlPatterns = {"/HolaMundo/*", "*.saludo"})
public class HolaMundoServlet extends HttpServlet{
    
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException{
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter();
        try{
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Hola Mundo</title>");
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Hola Mundo!</h1>");
            out.println("<img src='saludo.jpg'>");
            out.println("</body>");
            out.println("</html>");
        }finally{
            out.close();
        }
    }
}
