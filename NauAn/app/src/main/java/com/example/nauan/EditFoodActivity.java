package com.example.nauan;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.google.firebase.database.ValueEventListener;

public class EditFoodActivity extends AppCompatActivity {
    String category;
    EditText etfoodname;
    EditText etfoodimage;
    EditText etingredient;
    EditText etdescription;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_food);

        etfoodname = findViewById(R.id.foodname_add);
        etfoodimage = findViewById(R.id.foodimage_add);
        etingredient = findViewById(R.id.ingredient_add);
        etdescription = findViewById(R.id.description_add);
        Button edit_btn = findViewById(R.id.edit_btn);
        edit_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                editfood();
            }
        });
    }
    private void editfood(){
        String foodname = etfoodname.getText().toString();
        String foodimage = etfoodimage.getText().toString();
        String ingredient = etingredient.getText().toString();
        String description = etdescription.getText().toString();

        RadioGroup gr = findViewById(R.id.radioGroup);
        int checkedId = gr.getCheckedRadioButtonId();
        switch (checkedId) {
            case R.id.MAC:
                category = "món ăn chính";
                break;
            case R.id.MN:
                category = "món nước";
                break;
            case R.id.TAN:
                category = "thức ăn nhanh";
                break;
            case R.id.NU:
                category = "nước uống";
                break;
            default:
                category = null;
                break;
        }

        if (!foodname.equals("") && !foodimage.equals("") && !ingredient.equals("") && !description.equals("")&& category!=null) {
            FirebaseDatabase db = FirebaseDatabase.getInstance();
            DatabaseReference myRef = db.getReference("food");
            String descriptionbr = description.replace("\n", "<br>");
            Intent i = getIntent();
            String currentfoodname = i.getStringExtra("currentfoodname");
            Query query2 = myRef.orderByChild("foodname").equalTo(currentfoodname);
            query2.addListenerForSingleValueEvent(new ValueEventListener() {
                @Override
                public void onDataChange(DataSnapshot dataSnapshot) {
                    for (DataSnapshot ds : dataSnapshot.getChildren()) {
                        String key = ds.getKey();
                        DatabaseReference foodRef = FirebaseDatabase.getInstance().getReference("food").child(key);
                        food food = new food(foodname, foodimage, ingredient, descriptionbr, category);
                        foodRef.setValue(food);
                        Toast.makeText(EditFoodActivity.this, " Cập nhật thành công ", Toast.LENGTH_SHORT).show();

                        Intent intent = new Intent(EditFoodActivity.this, FoodManagerActivity.class);
                        startActivity(intent);
                        finish();
                    }
                }
                @Override
                public void onCancelled(@NonNull DatabaseError error) {
                    Toast.makeText(EditFoodActivity.this, " Lỗi sự kiện! ", Toast.LENGTH_SHORT).show();
                }
            });
        }else{
            Toast.makeText(EditFoodActivity.this, " Vui lòng nhập đầy đủ thông tin! ", Toast.LENGTH_SHORT).show();
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
                Toast.makeText(EditFoodActivity.this, " Đã đăng xuất! ", Toast.LENGTH_SHORT).show();
                Intent intent = new Intent(EditFoodActivity.this, LoginActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            case R.id.usermng:
            {
                Intent intent = new Intent(EditFoodActivity.this, UserManagerActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            case R.id.foodmng:
            {
                Intent intent = new Intent(EditFoodActivity.this, FoodManagerActivity.class);
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