<%-- 
    Document   : insertProduct
    Created on : 14 Oct, 2024, 3:58:47 PM
    Author     : Admin
--%>

<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Insert Page</title>
    </head>
    <body>
    <center>
        
    <h1>Insert Product</h1>
    <form action="insertProduct.jsp" method="post">
        <table>
            <input type="hidden" name="action" value="insertProduct" >
            <tr>
                <td>Product Id : </td>
                <td><input type="text" name="pid" placeholder="enter product id" required></td>
            </tr>
            <tr>
                <td>Product Name : </td>
                <td><input type="text" name="name" placeholder="enter product" required ></td>
            </tr>
            <tr>
                <td>Product Category : </td>
                <td>
                    <select name="category" id="category">
                        <option value="electronic">Electronic</option>
                        <option value="cosmetic">Cosmetic</option>
                        <option value="cloth">Cloth</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Product Price : </td>
                <td><input type="text" name="price" placeholder="enter price" required ></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="sub" value="Add Product"></td>
            </tr>
        </table>
    </form>
    
    <a href="display.jsp" >Display</a>
        
    </center>
    </body>
</html>
<%
    String action = request.getParameter("action");
    
    if(action != null && action.equals("insertProduct")){
        String pid = request.getParameter("pid");
        String name = request.getParameter("name");
        String category = request.getParameter("category");
        int price = Integer.parseInt(request.getParameter("price"));
        
//        out.println(pid);
//        out.println(name);
//        out.println(category);
//        out.println(price);
        
        Connection con = db.Product.getConnect();
        int row = db.Product.insert(con, pid, name, category, price);
        if(row > 0){
            out.print("<script>alert('inserted')</script>");
        }else{
            out.print("<script>alert('not inserted')</script>");
        }
    }
%>
