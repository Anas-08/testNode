<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Edit Page</title>
    </head>
    <%
        int id = Integer.parseInt(request.getParameter("id"));
        Connection con = db.Product.getConnect();
        ResultSet row = db.Product.readSingle(con, id);
        if(row.next()){
    %>
    <body>
    <center>
        <h1>Edit Page</h1>
        <br>
        <br>
        <hr>
        <br>
        <br>
        
        <form action="" method="post">
        <table>
            <input type="hidden" name="action" value="update" >
            
            <tr>
                <td>Product Id : </td>
                <td><input type="text" name="pid" value="<%= row.getString("pid") %>" placeholder="enter product id" required></td>
            </tr>
            <tr>
                <td>Product Name : </td>
                <td><input type="text" name="name" value="<%= row.getString("name") %>" placeholder="enter product" required ></td>
            </tr>
            <tr>
                <td>Product Category : </td>
                <td>
                    <select name="category" id="category" >
                        <option value="electronic <%= "electronic".equals(row.getString("category")) ? "selected" : "" %> ">Electronic</option>
                        <option value="cosmetic <%= "cosmetic".equals(row.getString("category")) ? "selected" : "" %> ">Cosmetic</option>
                        <option value="cloth <%= "cloth".equals(row.getString("category")) ? "selected" : "" %> ">Cloth</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Product Price : </td>
                <td><input type="text" name="price" value="<%= row.getInt("price") %>" placeholder="enter price"  required ></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="sub" value="Edit Product"></td>
            </tr>
        </table>
    </form>
        <% }else{
            out.print("<script>alert('no id found')</script>");
        } %>
    </center>
    </body>
</html>

<%
    String action = request.getParameter("action");
    
    if(action != null && action.equals("update")){
        String pid = request.getParameter("pid");
        String name = request.getParameter("name");
        String category = request.getParameter("category");
        int price = Integer.parseInt(request.getParameter("price"));

//        out.println(pid);
//        out.println(name);
//        out.println(category);
//        out.println(price);

        int rows = db.Product.update(con, id, pid, name, category, price);
        if(rows > 0){
            out.print("<script>alert('updated')</script>");
            response.sendRedirect("display.jsp");
        }else{
            out.print("<script>alert('not updated')</script>");
        }
    }
%>
