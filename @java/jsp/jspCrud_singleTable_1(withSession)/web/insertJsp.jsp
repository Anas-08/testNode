<%-- 
    Document   : insertJsp
    Created on : 11 Oct, 2024, 6:24:47 PM
    Author     : Admin
--%>

<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP insert Page</title>
    </head>
    <body>
        
    <center>
        <h1>Insert Page</h1>

        <br>
        <br>
        <br>
        
        <form action="insertJsp.jsp" method="post">
        <input type="hidden" name="action" value="insert"  />
        <table>
            <tr>
                <td>Book Id : </td>
                <td><input type="text" name="bookid" placeholder="enter book id" required></td>
            </tr> 
            <tr>
                <td>Book Name : </td>
                <td><input type="text" name="bookname" placeholder="enter book name" required></td>
            </tr>
            <tr>
                <td>Book Price : </td>
                <td><input type="text" name="bookprice" placeholder="enter book price" required></td>
            </tr>
            <tr>
                <td>Book Category : </td>
                <td>
                <select name="bookcategory" id="bookcategory">
                    <!--<option value="">select category</option>-->
                    <option value="education">Education</option>
                    <option value="fictional">Fictional</option>
                    <option value="history">History</option>
                    <option value="computer">computer science</option>
                </select></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="insertsubmit" value="Insert" ></td>
            </tr>
           
        </table>
    </form>
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
    
    if(action != null && action.equals("insert")){ 
        
        String bookname = request.getParameter("bookname");
        String bookprice = request.getParameter("bookprice");
        String bookcategory = request.getParameter("bookcategory");
        int bookid =Integer.parseInt(request.getParameter("bookid"));
     
        Connection con = db.JdbcConnect.getConnect();
        int row = db.JdbcConnect.insert(con, bookname, bookprice, bookcategory, bookid);
    
        if(row > 0){
            out.println("<script>alert('Inserted')</script>");
        }else{
            out.println("<script>alert('Not Inserted')</script>");      
        }
    }
    
%>
