<%-- 
    Document   : logout
    Created on : 14 Oct, 2024, 10:50:57 PM
    Author     : Admin
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
       <%
           session.invalidate();
           response.sendRedirect("index.jsp");
       %>
    </body>
</html>
