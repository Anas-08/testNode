<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Delete Page</title>
    </head>
    <body>
    <center>
        <br>
        <br>
        <h1>Delete Page</h1>
        <br>
        <br>
        <%
            int id = Integer.parseInt(request.getParameter("id"));
            Connection con = db.JdbcConnect.getConnect();
            int row = db.JdbcConnect.delete(con, id);
            if(row > 0){
                out.println("<script>alert('deleted')</script>");
                request.getRequestDispatcher("./displayJsp.jsp").forward(request, response);
            }else{
                out.println("<script>alert('not deleted')</script>");
            }
        %>
    </center>
    </body>
</html>
