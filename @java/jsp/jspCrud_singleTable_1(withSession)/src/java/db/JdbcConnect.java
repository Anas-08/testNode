package db;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class JdbcConnect {

    public static Connection getConnect() {
        Connection conn = null;
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/myjsp?useSSL=false", "root", "Thispc@123");
            System.out.println("connected...");
        } catch (ClassNotFoundException e) {
            System.out.println(" class error : " + e.getMessage());
        } catch (SQLException e) {
            System.out.println(" sql error : " + e.getMessage());
        }
        return conn;
    }

    public static int insert(Connection con, String name, String price, String category, int bookid) {
        int rows = 0;
        try {
            String insertQuery = "insert into bookstable1(name, price, category, bookid) values(?,?,?,?)";
            PreparedStatement ps = con.prepareStatement(insertQuery);
            ps.setString(1, name);
            ps.setString(2, price);
            ps.setString(3, category);
            ps.setInt(4, bookid);
            rows = ps.executeUpdate();
        } catch (SQLException e) {
            System.out.println(" sql error : " + e.getMessage());
        }
        return rows;
    }

    public static int update(Connection con, String name, String price, String category, int bookid, int id) {
        int rows = 0;
        try {
            String updateQuery = "update bookstable1 set name =?, price =? , category =? , bookid =? where id = ?";
            PreparedStatement ps = con.prepareStatement(updateQuery);
            ps.setString(1, name);
            ps.setString(2, price);
            ps.setString(3, category);
            ps.setInt(4, bookid);
            ps.setInt(5, id);
            rows = ps.executeUpdate();
        } catch (SQLException e) {
            System.out.println(" sql error : " + e.getMessage());
        }
        return rows;
    }

    public static int delete(Connection con, int id) {
        int rows = 0;
        try {
            String deleteQuery = "delete from bookstable1 where id = ?";
            PreparedStatement ps = con.prepareStatement(deleteQuery);
            ps.setInt(1, id);
            rows = ps.executeUpdate();
        } catch (SQLException e) {
            System.out.println(" sql error : " + e.getMessage());
        }
        return rows;
    }

    public static ResultSet read(Connection con) {
        ResultSet result = null;
        try {
            String select = "select * from bookstable1";
            PreparedStatement ps = con.prepareStatement(select);
            result = ps.executeQuery();
        } catch (SQLException e) {
            System.out.println(" sql error : " + e.getMessage());
        }
        return result;
    }
    
     public static ResultSet readSingle(Connection con, int id) {
        ResultSet result = null;
        try {
            String select = "select * from bookstable1 where id = ?";
            PreparedStatement ps = con.prepareStatement(select);
            ps.setInt(1, id);
            result = ps.executeQuery();
        } catch (SQLException e) {
            System.out.println(" sql error : " + e.getMessage());
        }
        return result;
    }
    
     // ------------------------------------------------------------------------
     // for different table
     public static int insertReg(Connection con, String name, String email, String password, String course, String date, String hobby, String gender, String address){
         int rows = 0;
         try{
          String insert = "insert into reg1(name,email, password, course, date, hobby, gender, address) values(?,?,?,?,?,?,?,?)";
             PreparedStatement ps = con.prepareStatement(insert);
             ps.setString(1, name);
             ps.setString(2, email);
             ps.setString(3, password);
             ps.setString(4, course);
             ps.setString(5, date);
             ps.setString(6, hobby);
             ps.setString(7, gender);
             ps.setString(8, address);
             rows = ps.executeUpdate();
         } catch (SQLException e) {
            System.out.println(" sql error : " + e.getMessage());
        }
         return rows;
     }
     
     // for login
       public static ResultSet login(Connection con, String name, String password) {
        ResultSet result = null;
        try {
            String select = "select * from reg1 where name = ? and password = ?";
            PreparedStatement ps = con.prepareStatement(select);
            ps.setString(1, name);
            ps.setString(2, password);
            result = ps.executeQuery();
        } catch (SQLException e) {
            System.out.println(" sql error : " + e.getMessage());
        }
        return result;
    }
     
     
     //------------------------
    public static void main(String[] args) {
        Connection con = getConnect();

// insert 
//        int row = insert(con, "c", "200", "computer", 103);
//        if(row > 0){
//            System.out.println("inserted");
//        }else{
//            System.out.println("not inserted");
//        }
// dispaly
//        ResultSet res = read(con);
//        try{
//            while(res.next()){
//                System.out.println(res.getString("name"));
//                System.out.println(res.getString("price"));
//                System.out.println(res.getString("category"));
//                System.out.println(res.getString("bookid"));
//                System.out.println("");
//            }
//        }catch(SQLException e){
//            System.out.println(" sql error : " + e.getMessage());
//        }
// update 
//        int row = update(con, "civilization", "2000", "history", 101,1);
//        if(row > 0){
//            System.out.println("updated");
//        }else{
//            System.out.println("not updated");
//        }
// delete
//        int row = delete(con,1);
//        if(row > 0){
//            System.out.println("deleted");
//        }else{
//            System.out.println("not deleted");
//        }
    }
}
