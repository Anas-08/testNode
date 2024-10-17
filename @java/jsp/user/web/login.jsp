<%@ include file="header.jsp" %>
<%@ include file="menu.jsp" %>

<h2>Login</h2>
<form action="LoginServlet" method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>

<%@ include file="footer.jsp" %>