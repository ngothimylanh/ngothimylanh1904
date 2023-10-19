package com.example.nauan;

public class user {
    public String username;
    public String fullname;
    public String password;
    public String email;
    public String role;


    public user(String username,String fullname,String password, String email, String role){
        this.username = username;
        this.fullname = fullname;
        this.password = password;
        this.email = email;
        this.role = role;
    }
    public user(String username, String email,String password, String role){
        this.username = username;
        this.email = email;
        this.password = password;
        this.role = role;
    }


    public String getUsername(){
        return username;
    }
    public void setUsername(String username){
        username = username;
    }
    public String getFullname(){
        return fullname;
    }
    public void setFullname(String fullname){
        fullname = fullname;
    }

    public String getPassword(){
        return password;
    }

    public void setPassword(String password){
        password = password;
    }

    public void setEmail(String email){
        email = email;
    }

    public String getEmail(){
        return email;
    }

    public void setRole(String role){
        role = role;
    }

    public String getRole(){
        return role;
    }
}
