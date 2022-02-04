<%-- 
    Document   : visor_imagenes.jsp
    Created on : 03-feb-2022, 19:31:46
    Author     : Javi
--%>
<%@page import="org.apache.jasper.tagplugins.jstl.ForEach"%>
<%@page import="java.util.ArrayList"%>
<%@page import="java.io.File"%>
<%@page import="bean.Imagen"%>

<%
    ArrayList<Imagen> imagenesDeCarpeta=new ArrayList<Imagen>();
    
    final String RUTA= "img";
    File carpeta = new File(this.getServletContext().getRealPath(RUTA));
    
    File[] listaImagenes= carpeta.listFiles();

    String ruta, nombre;
    long tamanio;
    
    for(int i= 0; i< listaImagenes.length; i++){
        ruta= this.getServletContext().getContextPath() + "/" + RUTA + "/" + listaImagenes[i].getName();
        nombre= listaImagenes[i].getName();
        tamanio= listaImagenes[i].length();
        
        Imagen imagen= new Imagen(ruta, nombre, tamanio);
        imagenesDeCarpeta.add(imagen);
    }

%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Visor de Imágenes</title>
    </head>
    <body>
        <form action="" method="post">
            <label for="imagenes">Imagenes: </label>
            <select name="imagenes" id="imagenes">
                <%
                    //la variable pos se enviará como value del selec, de tal forma que dar con la imagen será mas facil
                    int pos= 0;
                    for (Imagen imagen : imagenesDeCarpeta) {
                        %>
                        <option value="<%= pos %>">
                            <%= imagen.getNombre() %>
                        </option>
                        <%
                       
                        pos++;
                    }
                %>
            </select>
            
            <span>Tamaños: </span>
            <input type="radio" id="radTamanios1" name="radTamanios" value="300px"checked>
            <label for="tamanios1">300px</label>
            <input type="radio" id="radTamanios2" name="radTamanios" value="400px">
            <label for="tamanios2">400px</label>
            <input type="radio" id="radTamanios3" name="radTamanios" value="500px">
            <label for="tamanios3">500px</label>
            
            <button type="submit" name="butVer">VER IMAGEN</button>
        </form>
            
        <%
            if( request.getParameter("butVer")!= null ){
                int indice= Integer.parseInt(request.getParameter("imagenes"));
                Imagen imgSelec= imagenesDeCarpeta.get(indice);
            
        %>
        
            <p>Tamaño: <%= imgSelec.tamanioDesglosado() %></p>
            
            <img src="<%= imgSelec.getRuta() %>" 
                 width="<%= request.getParameter("radTamanios") %>" alt="<%= imgSelec.getNombre()  %>">
        
        
        <%
            } // se cierra aquí el if de la línea 68
        %>
        
    </body>
</html>
