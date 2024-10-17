
package db;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class User {
        
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
     
     public static int insertUser(Connection con, String username, String password) {
        int rows = 0;
        try {
            String insertQuery = "insert into users1(username, password, role) values(?,?,?)";
            PreparedStatement ps = con.prepareStatement(insertQuery);
            ps.setString(1, username);
            ps.setString(2, password);
            ps.setString(3, "user");
         
            rows = ps.executeUpdate();
        } catch (SQLException e) {
            System.out.println(" sql error : " + e.getMessage());
        }
        return rows;
     }
        
        public static ResultSet read(Connection con) {
            ResultSet result = null;
            try {
                String select = "select * from users1";
                PreparedStatement ps = con.prepareStatement(select);
                result = ps.executeQuery();
            } catch (SQLException e) {
                System.out.println(" sql error : " + e.getMessage());
            }
            return result;
        }
        
        public static ResultSet login(Connection con, String username, String password) {
            ResultSet result = null;
            try {
                String select = "select * from users1 where username = ? and password = ?";
                
                PreparedStatement ps = con.prepareStatement(select);
                ps.setString(1, username);
                ps.setString(2, password);
                result = ps.executeQuery();
            } catch (SQLException e) {
                System.out.println(" sql error : " + e.getMessage());
            }
            return result;
        }

        
    public static int insertProduct(Connection con, String productname, String category, int price) {
        int rows = 0;
        try {
            String insertQuery = "insert into products2(product_name, category, price) values(?,?,?)";
            PreparedStatement ps = con.prepareStatement(insertQuery);
            ps.setString(1, productname);
            ps.setString(2, category);
            ps.setInt(3, price);
            
            rows = ps.executeUpdate();
        } catch (SQLException e) {
            System.out.println(" sql error : " + e.getMessage());
        }
        return rows;
    }
    
    public static int deleteProduct(Connection con, int id) {
        int rows = 0;
        try {
            String deleteQuery = "delete from products2 where id = ?";
            PreparedStatement ps = con.prepareStatement(deleteQuery);
            ps.setInt(1, id);
            rows = ps.executeUpdate();
        } catch (SQLException e) {
            System.out.println(" sql error : " + e.getMessage());
        }
        return rows;
    }
    
     public static int update(Connection con, String productname, String category, int price, int id) {
        int rows = 0;
        try {
            String updateQuery = "update products2 set product_name =?,  category =? , price =? where id = ?";
            PreparedStatement ps = con.prepareStatement(updateQuery);
            ps.setString(1, productname);
            ps.setString(2, category);
            ps.setInt(3, price);
            ps.setInt(3, id);
            rows = ps.executeUpdate();
        } catch (SQLException e) {
            System.out.println(" sql error : " + e.getMessage());
        }
        return rows;
    }
    
    public static ResultSet readProduct(Connection con) {
            ResultSet result = null;
            try {
                String select = "select * from products2";
                PreparedStatement ps = con.prepareStatement(select);
                result = ps.executeQuery();
            } catch (SQLException e) {
                System.out.println(" sql error : " + e.getMessage());
            }
            return result;
    }
         
        
    public static void main(String[] args) {
        Connection con = getConnect();
//        int row = insertUser(con, "test1", "test1");
//        if(row > 0){
//            System.out.println("inserted");
//        }else{
//            System.out.println("not inserted");       
//        }
        
    }
     
             
    
}
