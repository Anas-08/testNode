<%-- 
    Document   : profileJsp
    Created on : 11 Oct, 2024, 11:23:44 PM
    Author     : Admin
--%>
<% String user = (String)session.getAttribute("username"); %>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Profile Page</title>
    </head>
    <body>
    <center>
        <div style="border: 1px solid black; display: flex; justify-content: space-around;align-items: center; padding: 12px;">
        <h2>Welcome, <%= user %></h2>
        <a href="./logoutJsp.jsp">Signout</a>
    </div>
        <h1>Profile Page</h1>
        <div style="margin-top: 5%;display: flex; justify-content: space-around;">
            <a href="./displayJsp.jsp">Display Book Details</a>
            <a href="./insertJsp.jsp">Insert Books</a>
    </div>
    </center>
    </body>
</html>
