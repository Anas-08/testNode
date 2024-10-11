<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Update Page</title>
    </head>
    <body>
    <center>
        <%
            int id = Integer.parseInt(request.getParameter("id"));
            Connection con = db.JdbcConnect.getConnect();
            ResultSet res = db.JdbcConnect.readSingle(con, id);
            if(res.next()){
        %>
        <h1>Update Page</h1>
        <br>    
        <br>
        <br>
          <form action="" method="post">
        <input type="hidden" name="action" value="update"  />
        <input type="hidden" name="pid" value="<%= id %>"  />
        <table>
            <tr>
                <td>Book Id : </td>
                <td><input type="text" name="bookid" value="<%= res.getInt("bookid") %>" placeholder="enter book id" required></td>
            </tr> 
            <tr>
                <td>Book Name : </td>
                <td><input type="text" name="bookname" value="<%= res.getString("name") %>" placeholder="enter book name" required></td>
            </tr>
            <tr>
                <td>Book Price : </td>
                <td><input type="text" name="bookprice" value="<%= res.getString("price") %>" placeholder="enter book price" required></td>
            </tr>
            <tr>
                <td>Book Category : </td>
                <td>
                <select name="bookcategory" id="bookcategory" >
                    <!--<option value="">select category</option>-->
                    <option value="education <%= "education".equals(res.getString("category")) ? "selected" : "" %> ">Education</option>
                    <option value="fictional <%= "fictional".equals(res.getString("category")) ? "selected" : "" %> ">Fictional</option>
                    <option value="history" <%= "history".equals(res.getString("category")) ? "selected" : "" %> >History</option>
                    <option value="computer" <%= "computer".equals(res.getString("category")) ? "selected" : "" %> >computer science</option>
                </select></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="updatesubmit" value="Update" ></td>
            </tr>
           
        </table>
    </form>
            <% }else {
                out.println("<h3>No record found for the given ID.</h3>");
                } 
            %>
        <br>
        <br>
        <a href="displayJsp.jsp">Display</a>
        <br>
        <br>
        
        
    </center>
    </body>
</html>

<%
    String action = request.getParameter("action");
    
    if(action != null && action.equals("update")){ 
        
        String bookname = request.getParameter("bookname");
        String bookprice = request.getParameter("bookprice");
        String bookcategory = request.getParameter("bookcategory");
       // int pid = Integer.parseInt(request.getParameter("pid"));
        int bookid = Integer.parseInt(request.getParameter("bookid"));
     
       
        int row = db.JdbcConnect.update(con, bookname, bookprice, bookcategory, bookid, id);
    
        if(row > 0){
            out.println("<script>alert('Updated')</script>");
            request.getRequestDispatcher("displayJsp.jsp").forward(request, response);
        }else{
            out.println("<script>alert('Not Updated')</script>");      
        }
    }
    
%>
