
<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Delete Page</title>
    </head>
    <body>
        <%
            int id = Integer.parseInt(request.getParameter("id"));
            Connection con = db.Product.getConnect();
            int row = db.Product.delete(con, id);
            
            if(row > 0){
                out.print("<script>alert('deleted')</script>");
                response.sendRedirect("display.jsp");
            }else{
                out.print("<script>alert('not deleted')</script>");
            }
        %>
        <h1>Hello World!</h1>
    </body>
</html>
