<%@ include file="header.jsp" %>
<%@ include file="menu.jsp" %>

<h2>Add Product</h2>
<form action="ProductServlet?action=add" method="post">
    Product Name: <input type="text" name="product_name" required><br>
    Category: <input type="text" name="category" required><br>
    Price: <input type="text" name="price" required><br>
    <input type="submit" value="Add Product">
</form>

<%@ include file="footer.jsp" %>
