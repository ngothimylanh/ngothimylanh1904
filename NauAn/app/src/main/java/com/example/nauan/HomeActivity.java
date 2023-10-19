package com.example.nauan;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.ViewFlipper;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.google.firebase.database.ValueEventListener;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;
import java.util.List;

public class HomeActivity extends AppCompatActivity {
    ViewFlipper viewFlipper;
    FirebaseDatabase db = FirebaseDatabase.getInstance();
    FirebaseAuth mAuth = FirebaseAuth.getInstance();;
    FirebaseUser user = mAuth.getCurrentUser();
    FoodAdapter adapter;

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        TextView all_href = findViewById(R.id.all_href);

        if (user == null)
        {
            Intent intent = new Intent(HomeActivity.this, LoginActivity.class);
            startActivity(intent);
            finish();
        }
        all_href.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(HomeActivity.this, AllFoodActivity.class);
                startActivity(intent);
                finish();
            }
        });

        ActionViewFlipper();
        listfood();
        category();
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
                Toast.makeText(HomeActivity.this, " Đã đăng xuất! ", Toast.LENGTH_LONG).show();
                Intent intent = new Intent(HomeActivity.this, LoginActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            case R.id.user:
            {
                Intent intent = new Intent(HomeActivity.this, ProfileActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            default:
                return super.onOptionsItemSelected(item);
        }
    return true;
    }

    private void ActionViewFlipper(){
        viewFlipper = (ViewFlipper) findViewById(R.id.viewFlipper);
        viewFlipper.setFlipInterval(2000); // Chuyển đổi giữa các view sau mỗi 2 giây
        viewFlipper.startFlipping(); // Bắt đầu tự động chuyển đổi
    }

    private void listfood(){
        RecyclerView recyclerView = findViewById(R.id.homelist);
        DatabaseReference foodRef = db.getReference("food");
        foodRef.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                ArrayList<food> foodList = new ArrayList<>();
                for(DataSnapshot ds : dataSnapshot.getChildren()){
                    String foodname = ds.child("foodname").getValue().toString();
                    String foodimage = ds.child("foodimage").getValue().toString();
                    food food = new food(foodname, foodimage);
                    foodList.add(food);
                }
                adapter = new FoodAdapter(HomeActivity.this, foodList);
                recyclerView.setLayoutManager(new LinearLayoutManager(HomeActivity.this));
                recyclerView.setAdapter(adapter);
    //            adapter.notifyDataSetChanged();
            }

            @Override
            public void onCancelled(@NonNull DatabaseError error) {
                Toast.makeText(HomeActivity.this, " Lỗi sự kiện! ", Toast.LENGTH_LONG).show();
            }
        });

    }
    private void category(){
        ImageView category_chinh = findViewById(R.id.iconcom);
        ImageView category_monnuoc = findViewById(R.id.iconmi);
        ImageView category_nhanh = findViewById(R.id.iconkhoai);
        ImageView category_nuoc = findViewById(R.id.iconnuoc);

        category_chinh.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(HomeActivity.this, CategoryActivity.class);
                intent.putExtra("category", "món ăn chính");
                startActivity(intent);
            }
        });
        category_monnuoc.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(HomeActivity.this, CategoryActivity.class);
                intent.putExtra("category", "món nước");
                startActivity(intent);
            }
        });
        category_nhanh.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(HomeActivity.this, CategoryActivity.class);
                intent.putExtra("category", "thức ăn nhanh");
                startActivity(intent);
            }
        });
        category_nuoc.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(HomeActivity.this, CategoryActivity.class);
                intent.putExtra("category", "nước uống");
                startActivity(intent);
            }
        });
    }
}
