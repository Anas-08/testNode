<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>login Page</title>
    </head>
    <body>
    <center>
        <form action="index.jsp" method="post"> 
            <table>
                <input type="hidden" name="action" value="login" >
                <tr>
                    <td>Name : </td>
                    <td><input type="text" name="name" ></td>
                </tr>
                 <tr>
                    <td>Password : </td>
                    <td><input type="password" name="password" ></td>
                </tr>
                <tr>
                    <td> </td>
                    <td><input type="submit" value="Login" ></td>
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
    
out.println(name);
out.println(password);
    
    Connection con = db.Product.getConnect();
    ResultSet res = db.Product.readLogin(con, name, password);
    
    
            if(res.next()){
        session.setAttribute("username", name);
        response.sendRedirect("profile.jsp");
    }else{
        out.println("invald");
    }
   

    }
%>
