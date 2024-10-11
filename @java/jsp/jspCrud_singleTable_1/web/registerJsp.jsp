<%-- 
    Document   : registerJsp
    Created on : 11 Oct, 2024, 10:01:15 PM
    Author     : Admin
--%>

<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Register Page</title>
    </head>
    <body>
    <center>
        <br>
        <br>
            <h1>Register Page</h1>
        <br>
        <br>
        <form action="registerJsp.jsp" method="post">
            <input type="hidden" name="action" value="register"> 
            <table>
                <tr>
                    <td>Name : </td>
                    <td><input type="name" name="name" ></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="email" name="email" ></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input type="password" name="password" ></td>
                </tr>
                <tr>
                    <td>Select Course : </td>
                    <td>
                        <select name="course" id="course">
                            <option value="mca">MCA</option> 
                            <option value="bca">BCA</option> 
                            <option value="msc">MSC</option> 
                            <option value="pdgca">PGDCA</option> 
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Dob : </td>
                    <td><input type="date" name="date"></td>
                </tr>
                <tr>
                    <td>Hobbies : </td>  
                    <td>
                        <input type="checkbox" name="hob[]" value="reading">Reading <br>
                        <input type="checkbox" name="hob[]" value="swimming">Swimming <br>
                        <input type="checkbox" name="hob[]" value="playing">Playing <br>
                    </td>
                </tr>
                <tr>
                    <td>Gender : </td>
                    <td>
                        <input type="radio" name="gender" value="male">Male <br>
                        <input type="radio" name="gender" value="female">Female <br>
                    </td>
                </tr>
                <tr>
                    <td>Address : </td>
                    <td><textarea name="address" id="address"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Register"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Already Register ? <a href="./index.jsp">login here</a></td>
                </tr>
            </table>
        </form>
    </center>

    </body>
</html>

<%
    String action = request.getParameter("action");
    
    if(action != null && action.equals("register")){
        
        String name = request.getParameter("name");
        String password = request.getParameter("password");
        String email = request.getParameter("email");
        String course = request.getParameter("course");
        String date = request.getParameter("date");
        String hob = String.join(",",request.getParameterValues("hob[]"));
        String gender = request.getParameter("gender");
        String address = request.getParameter("address");
    
//        out.println(name);
//        out.println();
//        out.println(password);
//        out.println();
//        out.println(email);
//        out.println();
//        out.println(course);
//        out.println();
//        out.println(date);
//        out.println();
//        out.println(hob);
//        out.println();
//        out.println(gender);
//        out.println();
//        out.println(address);
//        out.println();
        
        Connection con = db.JdbcConnect.getConnect();
        int row = db.JdbcConnect.insertReg(con, name, email, password, course, date, hob, gender, address);
        if(row > 0){
            out.println("<script>alert('Inserted')</script>");
            request.getRequestDispatcher("./index.jsp").forward(request, response);
        }else{
            out.println("<script>alert('not Inserted')</script>");
        }
    }
%>
