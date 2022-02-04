<%-- 
    Document   : devoluciones
    Created on : 25 ene. 2022, 10:12:48
    Author     : dw2
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Hola</h1>
        <table>
            <c:forEach var="libroPrestamo" items="${librosPrestamo}" varStatus="estado">
            <tr>
                <td>
                    ${estado.count}.-
                    ${libroPrestamo.titulo},
                    ${libroPrestamo.fecha} dias prestado
                </td>
                <td>
                    <c:choose>
                        <c:when test="${sessionScope.devoluciones.contains(libroPrestamo.id)}">
                            <a href="ServletDevolver?revertir=${libroPrestamo.id}">REVERTIR DEVOLUCION</a>
                        </c:when>
                        <c:otherwise>
                            <a href="ServletDevolver?marcar=${libroPrestamo.id}">MARCAR DEVOLUCION</a>
                        </c:otherwise>
                    </c:choose>
                </td>
            </tr>
         </c:forEach>
        </table>
        <c:if test="${sessionScope.devoluciones.size()>0}">
            <a href="ServletDevolver?grabar">GRABAR DEVOLUCIONES</a>
            (${sessionScope.devoluciones.size()} libros)
        </c:if>
    </body>
</html>
