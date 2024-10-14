<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Connection"%>
<%--<%@page import="db.Product"%>--%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Display Page</title>
    </head>
    <body>
    <center>
        
        <h1>Display Page</h1>
        
        <br>
        <br>
        <hr>
        <br>
        <br>
        
          <table border="1" cellpadding="12px" cellspacing="0" >
            <tr>
                <th>Pid</th>
                <th>Product Name</th>
                <th>Product Category</th>
                <th>Product Price</th>
                <th colspan="2">Action</th>
            </tr>
            
            <%
                Connection con = db.Product.getConnect();
                
                ResultSet row = db.Product.read(con);
                while(row.next()){
            %>
            
            <tr>
                <td><%= row.getString("pid") %></td>
                <td><%= row.getString("name") %></td>
                <td><%= row.getString("category") %></td>
                <td><%= row.getInt("price") %></td>
                <td><a href="edit.jsp?id=<%= row.getInt("id") %>" >Edit</a></td>
                <td><a href="delete.jsp?id=<%= row.getInt("id")%>" >Delete</a></td>
            </tr>
            
            <% } %>
        </table>
        
    </center>
    </body>
</html>
