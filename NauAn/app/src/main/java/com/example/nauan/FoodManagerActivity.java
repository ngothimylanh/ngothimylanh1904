package com.example.nauan;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
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

public class FoodManagerActivity extends AppCompatActivity {
    FirebaseDatabase db = FirebaseDatabase.getInstance();
    FirebaseAuth mAuth = FirebaseAuth.getInstance();;
    FirebaseUser user = mAuth.getCurrentUser();
    FoodAdapterAdmin adapter;
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_food_mng);
        if (user == null)
        {
            Intent intent = new Intent(FoodManagerActivity.this, LoginActivity.class);
            startActivity(intent);
            finish();
        }
        listfood_ad();
        Button add = findViewById(R.id.addfood_btn);
        add.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(FoodManagerActivity.this, AddFoodActivity.class);
                startActivity(intent);
                finish();
            }
            });
    }
    private void listfood_ad(){
        RecyclerView recyclerView = findViewById(R.id.allfoodadmin);
        DatabaseReference foodRef = db.getReference("food");
        foodRef.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                ArrayList<food> foodListad = new ArrayList<>();
                for(DataSnapshot ds : dataSnapshot.getChildren()){
                    String foodname = String.valueOf(ds.child("foodname").getValue());
                    String foodimage = String.valueOf(ds.child("foodimage").getValue());
                    food food = new food(foodname, foodimage);
                    foodListad.add(food);
                }
                adapter = new FoodAdapterAdmin(FoodManagerActivity.this, foodListad);
                recyclerView.setLayoutManager(new LinearLayoutManager(FoodManagerActivity.this));
                recyclerView.setAdapter(adapter);
                adapter.notifyDataSetChanged();
            }

            @Override
            public void onCancelled(@NonNull DatabaseError error) {
                Toast.makeText(
                        FoodManagerActivity.this, " Lỗi sự kiện! ", Toast.LENGTH_LONG).show();
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
                Toast.makeText(FoodManagerActivity.this, " Đã đăng xuất! ", Toast.LENGTH_SHORT).show();
                Intent intent = new Intent(FoodManagerActivity.this, LoginActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            case R.id.usermng:
            {
                Intent intent = new Intent(FoodManagerActivity.this, UserManagerActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            case R.id.foodmng:
            {
                Toast.makeText(FoodManagerActivity.this, " Đang hiển thị! ", Toast.LENGTH_SHORT).show();
                break;
            }
            default:
                return super.onOptionsItemSelected(item);
        }
    return true;
    }
}