<%-- 
    Document   : logoutJsp
    Created on : 11 Oct, 2024, 11:24:24 PM
    Author     : Admin
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>logout Page</title>
    </head>
    <body>
         <center>
        
        <h1>Logout Page</h1>
        <%
            session.invalidate();
            
request.getRequestDispatcher("./index.jsp").forward(request, response);
        %>
    </center>
    </body>
</html>
