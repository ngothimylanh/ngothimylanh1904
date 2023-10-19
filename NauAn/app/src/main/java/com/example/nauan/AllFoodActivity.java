package com.example.nauan;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.SearchView;
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

public class AllFoodActivity extends AppCompatActivity {
    FirebaseDatabase db = FirebaseDatabase.getInstance();
    FirebaseAuth mAuth = FirebaseAuth.getInstance();
    FirebaseUser user = mAuth.getCurrentUser();
    FoodAdapter adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_allfood);

        if (user == null) {
            Intent intent = new Intent(AllFoodActivity.this, LoginActivity.class);
            startActivity(intent);
            finish();
        }

        listfood();
    }

    private void listfood() {
        RecyclerView recyclerView = findViewById(R.id.alllist);
        DatabaseReference foodRef = db.getReference("food");
        foodRef.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                ArrayList<food> foodList = new ArrayList<>();
                for (DataSnapshot ds : dataSnapshot.getChildren()) {
                    String foodname = ds.child("foodname").getValue().toString();
                    String foodimage = ds.child("foodimage").getValue().toString();
                    food food = new food(foodname, foodimage);
                    foodList.add(food);
                }
                adapter = new FoodAdapter(AllFoodActivity.this, foodList);
                recyclerView.setLayoutManager(new LinearLayoutManager(AllFoodActivity.this));
                recyclerView.setAdapter(adapter);
                adapter.notifyDataSetChanged();
            }

            @Override
            public void onCancelled(@NonNull DatabaseError error) {
                Toast.makeText(
                        AllFoodActivity.this, " Lỗi sự kiện! ", Toast.LENGTH_LONG).show();
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.food_menu, menu);

        MenuItem searchItem = menu.findItem(R.id.search);
        RecyclerView recyclerView = findViewById(R.id.alllist);
        SearchView searchView = (SearchView) searchItem.getActionView();

        searchView.setQueryHint("Tìm kiếm món ăn");

        searchView.setOnQueryTextListener(new SearchView.OnQueryTextListener() {
            @Override
            public boolean onQueryTextSubmit(String query) {
                return true;
            }

            @Override
            public boolean onQueryTextChange(String newText) {
                DatabaseReference foodRef = db.getReference("food");

                foodRef.orderByChild("foodname")
                        .startAt(newText)
                        .endAt(newText + "\uf8ff")
                        .addValueEventListener(new ValueEventListener() {
                            @Override
                            public void onDataChange(DataSnapshot dataSnapshot) {
                                ArrayList<food> foodList = new ArrayList<>();
                                for (DataSnapshot ds : dataSnapshot.getChildren()) {
                                    String foodname = ds.child("foodname").getValue().toString();
                                    String foodimage = ds.child("foodimage").getValue().toString();
                                    food food = new food(foodname, foodimage);
                                    foodList.add(food);
                                }
                                adapter = new FoodAdapter(AllFoodActivity.this, foodList);
                                recyclerView.setLayoutManager(new LinearLayoutManager(AllFoodActivity.this));
                                recyclerView.setAdapter(adapter);
                                adapter.notifyDataSetChanged();
                            }

                            @Override
                            public void onCancelled(@NonNull DatabaseError error) {
                                Toast.makeText(
                                        AllFoodActivity.this, " Lỗi sự kiện! ", Toast.LENGTH_LONG).show();
                            }
                        });

                return true;
            }
        });

        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.logout:
            {
                FirebaseAuth.getInstance().signOut();
                Toast.makeText(AllFoodActivity.this, " Đã đăng xuất! ", Toast.LENGTH_LONG).show();
                Intent intent = new Intent(AllFoodActivity.this, LoginActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            case R.id.user:
            {
                Intent intent = new Intent(AllFoodActivity.this, ProfileActivity.class);
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
