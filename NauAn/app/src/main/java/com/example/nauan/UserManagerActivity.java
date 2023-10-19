package com.example.nauan;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;

public class UserManagerActivity extends AppCompatActivity {
    FirebaseDatabase db = FirebaseDatabase.getInstance();
    FirebaseAuth mAuth = FirebaseAuth.getInstance();;
    FirebaseUser user = mAuth.getCurrentUser();
    UserAdapter adapter;
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_user_mng);
        FirebaseAuth mAuth;
        FirebaseUser user;
        mAuth = FirebaseAuth.getInstance();
        user = mAuth.getCurrentUser();
        if (user == null)
        {
            Intent intent = new Intent(UserManagerActivity.this, LoginActivity.class);
            startActivity(intent);
            finish();
        }
        listuser();
    }
    private void listuser(){
        RecyclerView recyclerView = findViewById(R.id.alluser);
        DatabaseReference Ref = db.getReference("userInfo");
        Ref.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                ArrayList<user> userList = new ArrayList<>();
                for(DataSnapshot ds : dataSnapshot.getChildren()){
                    String username = ds.child("username").getValue().toString();
                    String email = ds.child("email").getValue().toString();
                    String password = ds.child("password").getValue().toString();
                    String role = ds.child("role").getValue().toString();
                    user user = new user(username, email, password, role);
                    userList.add(user);
                }
                adapter = new UserAdapter(UserManagerActivity.this, userList);
                recyclerView.setLayoutManager(new LinearLayoutManager(UserManagerActivity.this));
                recyclerView.setAdapter(adapter);
                adapter.notifyDataSetChanged();
            }

            @Override
            public void onCancelled(@NonNull DatabaseError error) {
                Toast.makeText(UserManagerActivity.this, " Lỗi sự kiện! ", Toast.LENGTH_LONG).show();
            }
        });

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        super.onCreateOptionsMenu(menu);
        getMenuInflater().inflate(R.menu.admin_menu, menu);
        return true;
    }
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.logoutad:
            {
                FirebaseAuth.getInstance().signOut();
                Toast.makeText(UserManagerActivity.this, " Đã đăng xuất! ", Toast.LENGTH_SHORT).show();
                Intent intent = new Intent(UserManagerActivity.this, LoginActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            case R.id.usermng:
            {
                Toast.makeText(UserManagerActivity.this, " Đang hiển thị! ", Toast.LENGTH_SHORT).show();
                break;
            }
            case R.id.foodmng:
            {
                Intent intent = new Intent(UserManagerActivity.this, FoodManagerActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            default:
                return super.onOptionsItemSelected(item);
        }
        return true;
    }
}