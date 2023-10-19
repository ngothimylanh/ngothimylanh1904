package com.example.nauan;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.RadioGroup;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

public class AddFoodActivity extends AppCompatActivity {
    String category;
    EditText etfoodname;
    EditText etfoodimage;
    EditText etingredient;
    EditText etdescription;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_food);

        etfoodname = findViewById(R.id.foodname_add);
        etfoodimage = findViewById(R.id.foodimage_add);
        etingredient = findViewById(R.id.ingredient_add);
        etdescription = findViewById(R.id.description_add);
        Button edit_btn = findViewById(R.id.edit_btn);
        edit_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                addfood();
            }
        });
    }
    private void addfood(){
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

        if (!foodname.equals("") && !foodimage.equals("") && !ingredient.equals("") && !description.equals("") && category!=null) {
            FirebaseDatabase db = FirebaseDatabase.getInstance();
            DatabaseReference myRef = db.getReference("food");
            description = description.replace("\n", "<br>");

            food food = new food(foodname,foodimage,ingredient,description,category);

            myRef.push().setValue(food);
            Toast.makeText(AddFoodActivity.this, " Thêm thành công ", Toast.LENGTH_LONG).show();

            Intent intent = new Intent(AddFoodActivity.this, FoodManagerActivity.class);
            startActivity(intent);
            finish();
        }else{
            Toast.makeText(AddFoodActivity.this, " Vui lòng nhập đầy đủ thông tin! ", Toast.LENGTH_LONG).show();
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
                Toast.makeText(AddFoodActivity.this, " Đã đăng xuất! ", Toast.LENGTH_SHORT).show();
                Intent intent = new Intent(AddFoodActivity.this, LoginActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            case R.id.usermng:
            {
                Intent intent = new Intent(AddFoodActivity.this, UserManagerActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            case R.id.foodmng:
            {
                Intent intent = new Intent(AddFoodActivity.this, FoodManagerActivity.class);
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