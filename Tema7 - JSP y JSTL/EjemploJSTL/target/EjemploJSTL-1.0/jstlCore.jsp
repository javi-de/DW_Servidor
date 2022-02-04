<%-- 
    Document   : jstlCore
    Created on : 15-dic-2021, 14:51:19
    Author     : Akaitz
--%>
<!--Buscar� dentro de las denpendencias del proyecto (javaee-api-8.0.jar)-->
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSTL Core</title>
    </head>
    <body>
        <h1>JSTL Core (JSP Standard Tag Library)</h1>
        <!--Manipulaci�n de variables-->
        <!--Definimos la variables-->
        <c:set var="nombre" value="Akaitz"/>
        <!--Desplegamos el valor de la variables-->
        <p>Variable nombre: <c:out value="${nombre}"/></p>
        <p>Variable con c�digo html:</p>
        <c:out value="<h4>Hola</h4>" escapeXml="false"/>
        <!--C�digo condicionado, uso de if-->
        <c:set var="bandera" value="true"/>
        <c:if test="${!bandera}">
            <p>La Bandera es verdadera</p>
        </c:if>
        <!--C�digo condicionado, uso de switch-->
        <c:if test="${param.opcion != null}">
            <c:choose>
                <c:when test="${param.opcion == 1}">
                    <p>Opci�n 1 seleccionada</p>
                </c:when>
                <c:when test="${param.opcion == 2}">
                    <p>Opci�n 2 seleccionada</p>
                </c:when>
                <c:otherwise>
                    <p>Opci�n proporcionada desconocida: ${param.opcion}</p>
                </c:otherwise>
            </c:choose>
        </c:if>
        <!--Iteraci�n de un arreglo-->
        <%
            String[] nombres = {"Akaitz", "Iker", "Aritz"};
            //Para poder acceder a esta variable, por EL o JSTL, hay que compartirla en un alcance
            request.setAttribute("nombres", nombres);
        %>
        <p>Lista de Nombres:</p>
        <ul>
            <c:forEach var="persona" items="${nombres}">
                <li>${persona}</li>
            </c:forEach>
        </ul>
        <p><a href="index.jsp">Regresar al inicio</a></p>
    </body>
</html>
