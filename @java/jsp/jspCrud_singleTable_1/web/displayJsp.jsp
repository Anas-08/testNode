<%-- 
    Document   : displayJsp
    Created on : 11 Oct, 2024, 8:14:48 PM
    Author     : Admin
--%>

<%@page import="java.sql.SQLException"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Connection"%>
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
        
        <table cellspacing="0" cellpadding="14" border="1">
            <tr>
                <th>Book Name</th>
                <th>Book Price</th>
                <th>Book Category</th>
                <th>Book Id</th>
                <th colspan="2">Action</th>
            </tr>  
            <%
                Connection con = db.JdbcConnect.getConnect();
                ResultSet res = db.JdbcConnect.read(con);
                  
                while(res.next()){
                        
                    
            %>
             <tr>
                 <td><%= res.getString("name") %></td>
                 <td><%= res.getString("price") %></td>
                 <td><%= res.getString("category") %></td>
                 <td><%= res.getString("bookid") %></td>
                 <td><a href="editJsp.jsp?id=<%= res.getInt("id") %>" >Edit</a></td>
                 <td><a href="deleteJsp.jsp?id=<%= res.getInt("id") %>" >Delete</a></td>          
            </tr>
            <% 
                }
            %>
            
        </table>
        
    </center>
    </body>
</html>
