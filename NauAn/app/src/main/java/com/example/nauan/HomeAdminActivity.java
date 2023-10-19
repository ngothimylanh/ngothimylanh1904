package com.example.nauan;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

public class HomeAdminActivity extends AppCompatActivity {
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_admin);
        FirebaseAuth mAuth;
        FirebaseUser user;
        mAuth = FirebaseAuth.getInstance();
        user = mAuth.getCurrentUser();
        if (user == null)
        {
            Intent intent = new Intent(HomeAdminActivity.this, LoginActivity.class);
            startActivity(intent);
            finish();
        }
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
                Toast.makeText(HomeAdminActivity.this, " Đã đăng xuất! ", Toast.LENGTH_LONG).show();
                Intent intent = new Intent(HomeAdminActivity.this, LoginActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            case R.id.usermng:
            {
                Intent intent = new Intent(HomeAdminActivity.this, UserManagerActivity.class);
                startActivity(intent);
                finish();
                break;

            }
            case R.id.foodmng:
            {
                Intent intent = new Intent(HomeAdminActivity.this, FoodManagerActivity.class);
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