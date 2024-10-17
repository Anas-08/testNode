<%@ include file="header.jsp" %>
<%@ include file="menu.jsp" %>

<h2>Register</h2>
<form action="RegisterServlet" method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Register">
</form>

<%@ include file="footer.jsp" %>