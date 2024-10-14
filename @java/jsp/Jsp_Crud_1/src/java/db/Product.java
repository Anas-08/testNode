package db;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class Product {
    
    // connection
    public static Connection getConnect(){
        Connection conn = null;
        try{
            Class.forName("com.mysql.cj.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/myjsp?useSSL=false", "root", "Thispc@123");
            System.out.println("Connected...");
        }catch(ClassNotFoundException e){
            System.out.println("class error " + e.getMessage());
        }catch(SQLException e){
            System.out.println("sql error " + e.getMessage());
        }
        return conn;
    }
    
    public static int insert(Connection con, String pid, String name, String category, int price){
        int rowsAffected = 0;
        try{
            String insert = "insert into product1(pid,name,category,price) values(?,?,?,?)";
            PreparedStatement ps = con.prepareStatement(insert);
            ps.setString(1, pid);
            ps.setString(2, name);
            ps.setString(3, category);
            ps.setInt(4, price);
            rowsAffected = ps.executeUpdate();
        }catch(SQLException e){
            System.out.println("sql error " + e.getMessage());
        }
        return rowsAffected;
    }
    
    public static int update(Connection con, int id, String pid, String name, String category, int price){
        int rowsAffected = 0;
            try{
                String update = "update product1 set pid = ?, name = ?, category = ?, price = ? where id = ?";
                PreparedStatement ps = con.prepareStatement(update);
                ps.setString(1, pid);
                ps.setString(2, name);
                ps.setString(3, category);
                ps.setInt(4, price);
                ps.setInt(5, id);
                rowsAffected = ps.executeUpdate();
            }catch(SQLException e){
                System.out.println("sql error " + e.getMessage());
            }
        return rowsAffected;
    }
    
    public static ResultSet read(Connection con){
        ResultSet rows = null;
            try{
                String select = "select * from product1";
                PreparedStatement ps = con.prepareStatement(select);
                rows = ps.executeQuery();
            }catch(SQLException e){
                System.out.println("sql error " + e.getMessage());
            }
        return rows;
    }
    public static ResultSet readSingle(Connection con, int id){
        ResultSet rows = null;
            try{
                String select = "select * from product1 where id = ?";
                PreparedStatement ps = con.prepareStatement(select);
                ps.setInt(1, id);
                rows = ps.executeQuery();
            }catch(SQLException e){
                System.out.println("sql error " + e.getMessage());
            }
        return rows;
    }
    
    public static int delete(Connection con, int id){
        int rowsAffected = 0;
            try{
                String delete = "delete from product1 where id = ?";
                PreparedStatement ps = con.prepareStatement(delete);
                ps.setInt(1, id);
                rowsAffected = ps.executeUpdate();
            }catch(SQLException e){
                System.out.println("sql error " + e.getMessage());
            }
        return rowsAffected;
    }
    
    // register table(reg1)
    public static int insertRegister(Connection con , String name, String email, String password){
        int rowsAffected = 0;
        try{
            String insert = "insert into reg2(name, email, password) values(?,?,?)";
            PreparedStatement ps = con.prepareStatement(insert);
            ps.setString(1, name);
            ps.setString(2, email);
            ps.setString(3, password);
            rowsAffected = ps.executeUpdate();
        }catch(SQLException e){
                System.out.println("sql error " + e.getMessage());
        }
        return rowsAffected;
    }
    
    // get (name, password)
    public static ResultSet readLogin(Connection con, String name, String password){
        ResultSet row = null;
            try{
                String select = "select * from reg2 where name = ? and password= ?";
                PreparedStatement ps = con.prepareStatement(select);
                ps.setString(1, name);
                ps.setString(2, password);
               row = ps.executeQuery();
            }catch(SQLException e){
                System.out.println("sql error " + e.getMessage());
            }
        return row;
    }
    
    
    public static void main(String[] args) {
        Connection con = getConnect();
//        int row = insert(con, "103", "smartphone", "electronic", 7000);
//        if(row > 0){
//            System.out.println("inserted");
//        }else{
//            System.out.println("not inserted");
//        }

// int row = update(con, 1, "100", "test", "miscellanous", 2000);
//            if(row > 0){
//            System.out.println("updated");
//        }else{
//            System.out.println("not updated");
//        }

//        int row = delete(con, 1);
//        if(row > 0){
//            System.out.println("deleted");
//        }else{
//            System.out.println("not deleted");
//        }
        
//        int row = insertRegister(con, "Demo", "demo@gmail.com", "root");
//          if(row > 0){
//            System.out.println("inserted");
//        }else{
//            System.out.println("not inserted");
//        }
      
//        ResultSet row = read(con);
//       try{
//            while(row.next()){
//            System.out.println(row.getString("pid"));
//            System.out.println(row.getString("name"));
//            System.out.println(row.getString("category"));
//            System.out.println(row.getInt("price"));
//                System.out.println("");
//        }
//       }catch(SQLException e){
//                System.out.println("sql error " + e.getMessage());
//       }

    }
       
}
