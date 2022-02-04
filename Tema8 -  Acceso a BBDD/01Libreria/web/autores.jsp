<%-- 
    Document   : autores
    Created on : 04-feb-2022, 2:09:57
    Author     : Javi
--%>

<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Lista de autores</h1>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Fecha de nacimiento</th>
                <th>Nacionalidad</th>
                <th>Ver libros</th>
            </tr>
            <c:forEach items="${autores2}" var="autor">
                <tr>
                    <td>${autor.nombre}</td>
                    <td>
                        ${autor.fechanac}
                    </td>
                    <td>${autor.nacionalidad}</td>
                    <td><a href="ServletControlador?indiceAutor=${autor.idAutor}">Ver libros</a></td>
                </tr>
            </c:forEach>
        </table>
        <h1>Añadir autor</h1>
        <form action="" method="post">
            <label>Nombre: <input type="text" name="nombreAutor"></label>
            <label>Fecha de nacimiento: <input type="text" name="fechaAutor"></label>
            <label>Nacionalidad: <input type="text" name="nacAutor"></label>          
            <button type="submit" name="butAniadir">Añadir</button>
        </form>
        <c:if test="${dameLibrosDelAutor != null}">
            <h1>Libros de </h1>
            <ul>
                <c:forEach  items="${dameLibrosDelAutor}" var="titLibro">
                    <li>titLibro</li>
                </c:forEach>
            </ul>
        </c:if>
    </body>
</html>
