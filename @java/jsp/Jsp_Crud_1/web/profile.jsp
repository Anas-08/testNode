<%-- 
    Document   : profile
    Created on : 14 Oct, 2024, 10:37:31 PM
    Author     : Admin
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>profile Page</title>
    </head>
    
    <%
        String username = (String)session.getAttribute("username");
    %>
    <body>
    <center>
       <div style="border: 1px solid black; padding: 12px; display: flex; justify-content: space-between;" >
           <h1>Welcome, <%= username %> </h1>
           <button><a href="logout.jsp" >Logout</a></button>
        </div>    
           
           <br>
           <br>
           <hr>
           <br>
           <br>
           
           <div style="border: 1px solid black; padding: 12px; display: flex; justify-content: space-around;" >
               <button><a href="insertProduct.jsp" >Insert Product</a></button>
               <button><a href="display.jsp" >Display Product</a></button>
           </div>
        
    </center>
    </body>
</html>
