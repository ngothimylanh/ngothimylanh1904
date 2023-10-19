package com.example.nauan;

import android.content.Intent;
import android.os.Bundle;
import android.text.Html;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.google.firebase.database.ValueEventListener;
import com.squareup.picasso.Picasso;

public class FoodDetailActivity extends AppCompatActivity {
    private ImageView foodDetailImage;
    private TextView foodDetailName;
    private TextView foodDetailIngredient;
    private TextView foodDetailDescription;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_food_detail);

        foodDetailImage = findViewById(R.id.food_image_detail);
        foodDetailName = findViewById(R.id.category_tv);
        foodDetailIngredient = findViewById(R.id.food_ingredient_detail);
        foodDetailDescription = findViewById(R.id.food_description_detail);

        Intent intent = getIntent();
        String foodname = intent.getStringExtra("foodname");
        String foodimage = intent.getStringExtra("foodimage");

        Query query = FirebaseDatabase.getInstance().getReference("food")
                .orderByChild("foodname").equalTo(foodname);
        query.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                for(DataSnapshot ds : dataSnapshot.getChildren()) {
                    String foodingredient = ds.child("ingredient").getValue().toString();
                    String fooddescription = ds.child("description").getValue().toString();

                    Picasso.get().load(foodimage).into(foodDetailImage);
                    foodDetailName.setText(foodname);
                    foodDetailIngredient.setText(foodingredient);
                    foodDetailDescription.setText(Html.fromHtml(fooddescription));
                }
        }

            @Override
            public void onCancelled(@NonNull DatabaseError error) {
                Toast.makeText(FoodDetailActivity.this, " Lỗi sự kiện! ", Toast.LENGTH_LONG).show();
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
                Toast.makeText(FoodDetailActivity.this, " Đã đăng xuất! ", Toast.LENGTH_LONG).show();
                Intent intent = new Intent(FoodDetailActivity.this, LoginActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            case R.id.user:
            {
                Intent intent = new Intent(FoodDetailActivity.this, ProfileActivity.class);
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
