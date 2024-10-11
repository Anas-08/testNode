
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login Page</title>
    </head>
    <body>
         <center>
        <br>
        <br>
            <h1>Login Page</h1>
        <br>
        <br>
        <form action="index.jsp" method="post">
            <table>
                <input type="hidden" name="action" value="login">
                <tr>
                    <td>username : </td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>password : </td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Login"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Not Register ? <a href="./registerJsp.jsp">register here</a></td>
                </tr>
            </table>
        </form>
    </center>
    </body>
</html>

<%
    String action = request.getParameter("action");
    if(action != null && action.equals("login")){
        String name = request.getParameter("name");
        String password = request.getParameter("password");
        
        Connection con = db.JdbcConnect.getConnect();
        ResultSet res = db.JdbcConnect.login(con, name, password);
        
        if(res.next()){
            session.setAttribute("username", name);
           // request.getRequestDispatcher("./profileJsp.jsp").forward(request, response);
            response.sendRedirect("./profileJsp.jsp");
        }else{
           // request.getRequestDispatcher("./index.jsp").forward(request, response);
            out.println("<script>alert('invalid user and password')</script>");
        }
    
    }
%>