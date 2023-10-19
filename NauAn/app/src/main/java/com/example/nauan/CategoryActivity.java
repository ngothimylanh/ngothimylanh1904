package com.example.nauan;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;

public class CategoryActivity extends AppCompatActivity {
    FirebaseDatabase db = FirebaseDatabase.getInstance();
    FirebaseAuth mAuth = FirebaseAuth.getInstance();;
    FirebaseUser user = mAuth.getCurrentUser();
    FoodAdapter adapter;


    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_category);

        if (user == null)
        {
            Intent intent = new Intent(CategoryActivity.this, LoginActivity.class);
            startActivity(intent);
            finish();
        }
        categorylist();
    }

    private void categorylist(){
        RecyclerView recyclerView = findViewById(R.id.catelist);
        TextView category_tv = findViewById(R.id.category_tv);
        Intent intent = getIntent();
        String category = intent.getStringExtra("category");
        Query query = FirebaseDatabase.getInstance().getReference("food")
                .orderByChild("category").equalTo(category);
        query.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                ArrayList<food> foodList = new ArrayList<>();
                for (DataSnapshot ds : dataSnapshot.getChildren()) {
                    String foodname = ds.child("foodname").getValue().toString();
                    String foodimage = ds.child("foodimage").getValue().toString();
                    food food = new food(foodname, foodimage);
                    foodList.add(food);
                }
                recyclerView.setLayoutManager(new LinearLayoutManager(CategoryActivity.this));
                adapter = new FoodAdapter(CategoryActivity.this, foodList);
                category_tv.setText(category.toUpperCase());
                adapter.notifyDataSetChanged();
                recyclerView.setAdapter(adapter);
            }

            @Override
            public void onCancelled(@NonNull DatabaseError error) {
                Toast.makeText(CategoryActivity.this, " Lỗi sự kiện! ", Toast.LENGTH_LONG).show();
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        super.onCreateOptionsMenu(menu);
        getMenuInflater().inflate(R.menu.main_menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.logout:
            {
                FirebaseAuth.getInstance().signOut();
                Toast.makeText(CategoryActivity.this, " Đã đăng xuất! ", Toast.LENGTH_LONG).show();
                Intent intent = new Intent(CategoryActivity.this, LoginActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            case R.id.user:
            {
                Intent intent = new Intent(CategoryActivity.this, ProfileActivity.class);
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


