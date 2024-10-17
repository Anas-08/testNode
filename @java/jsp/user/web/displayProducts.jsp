<%@page import="java.sql.ResultSet"%>
<%@ include file="header.jsp" %>
<%@ include file="menu.jsp" %>

<h2>Product List</h2>
<table border="1">
    <tr>
        <th>Product Code</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <% 
        ResultSet products = (ResultSet) request.getAttribute("products");
        while (products.next()) {
    %>
    <tr>
        <td><%= products.getInt("product_code") %></td>
        <td><%= products.getString("product_name") %></td>
        <td><%= products.getString("category") %></td>
        <td><%= products.getDouble("price") %></td>
        <td>
            <a href="ProductServlet?action=delete&product_code=<%= products.getInt("product_code") %>">Delete</a>
        </td>
    </tr>
    <% } %>
</table>

<%@ include file="footer.jsp" %>
