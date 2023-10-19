package com.example.nauan;

import static androidx.constraintlayout.helper.widget.MotionEffect.TAG;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import android.os.Bundle;
import android.content.Intent;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class SignupActivity extends AppCompatActivity{
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_signup);

        ActionBar actionBar = getSupportActionBar();
        actionBar.hide();

        EditText etusername = findViewById(R.id.username_signup);
        EditText etfullname = findViewById(R.id.fullname_signup);
        EditText etpassword = findViewById(R.id.password_signup);
        EditText etemail = findViewById(R.id.email_signup);
        TextView loginahref = findViewById(R.id.login_ahref);
        Button signup_btn = findViewById(R.id.signup_btn_signup);

        loginahref.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(SignupActivity.this, LoginActivity.class);
                startActivity(intent);
                finish();
            }
        });

        signup_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String username,password,fullname,email,role = "";
                FirebaseAuth mAuth;
                mAuth = FirebaseAuth.getInstance();

                username = String.valueOf(etusername.getText());
                password = String.valueOf(etpassword.getText());
                fullname = String.valueOf(etfullname.getText());
                email = String.valueOf(etemail.getText());
                int passsize = etpassword.getText().length();

                if (!username.equals("") && !fullname.equals("") && !password.equals("") && !email.equals("")) {
                    mAuth.createUserWithEmailAndPassword(email,password)
                            .addOnCompleteListener( new OnCompleteListener<AuthResult>() {
                                @Override
                                public void onComplete(@NonNull Task<AuthResult> task) {
                                    if (task.isSuccessful()) {
                                        FirebaseDatabase db = FirebaseDatabase.getInstance();
                                        DatabaseReference myRef = db.getReference("userInfo");

                                        user userInfo = new user(username,fullname,password,email,role);

                                        myRef.push().setValue(userInfo);
                                        Toast.makeText(SignupActivity.this, " Đăng ký thành công ", Toast.LENGTH_LONG).show();

                                        Intent intent = new Intent(SignupActivity.this, HomeActivity.class);
                                        startActivity(intent);
                                        finish();
                                    } else {
                                        Query query = FirebaseDatabase.getInstance().getReference("userInfo")
                                                .orderByChild("email").equalTo(email);
                                        query.addListenerForSingleValueEvent(new ValueEventListener() {
                                            @Override
                                            public void onDataChange(DataSnapshot ds) {
                                                    int count = (int) ds.getChildrenCount();
                                                    if(count > 0){
                                                        Toast.makeText(SignupActivity.this, " Email đã được sử dụng! ", Toast.LENGTH_LONG).show();
                                                    }
                                            }

                                            @Override
                                            public void onCancelled(DatabaseError databaseError) {
                                                Toast.makeText(SignupActivity.this, " Lỗi sự kiện! ", Toast.LENGTH_LONG).show();
                                            }
                                        });
                                        if(passsize<6)
                                        {
                                            Toast.makeText(SignupActivity.this, " Mật khẩu phải dài hơn 6 ký tự! ", Toast.LENGTH_LONG).show();
                                        }
                                    }
                                }
                            });
                } else {
                    Toast.makeText(SignupActivity.this, " Vui lòng nhập đầy đủ thông tin! ", Toast.LENGTH_LONG).show();
                }
            }
        });
    }

}
