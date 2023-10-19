package com.example.nauan;


import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
import android.widget.ViewFlipper;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseAuthSettings;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;

public class LoginActivity extends AppCompatActivity {

    public FirebaseAuth mAuth = FirebaseAuth.getInstance();
    public EditText etemail;
    public EditText etpassword;
    public String email;
    public String password;

    @Override
    public void onStart() {
        super.onStart();
        FirebaseUser currentUser = mAuth.getCurrentUser();
        if(currentUser != null){
            email = currentUser.getEmail();
            checkRole();
        }
    }
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        //ẩn thanh menu trang login
        ActionBar actionBar = getSupportActionBar();
        actionBar.hide();

        Button signup_btn = findViewById(R.id.signup_btn);
        Button login_btn = findViewById(R.id.login_btn);
        etemail = findViewById(R.id.email_login);
        etpassword = findViewById(R.id.password_login);

        //bấm signup
        signup_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(LoginActivity.this, SignupActivity.class);
                startActivity(intent);
                finish();
            }
        });

        //bấm login
        login_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                int usersize = etemail.getText().length();
                int passsize = etpassword.getText().length();

                email = etemail.getText().toString();
                password = etpassword.getText().toString();

                if(usersize > 0 && passsize > 0) {
                    mAuth.signInWithEmailAndPassword(email, password)
                            .addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                                @Override
                                public void onComplete(@NonNull Task<AuthResult> task) {
                                    if (task.isSuccessful()) {
                                        checkRole();
                                        Toast.makeText(LoginActivity.this, " Đăng nhập thành công! ", Toast.LENGTH_LONG).show();
                                    } else {
                                        Toast.makeText(LoginActivity.this, " Đăng nhập thất bại! ",
                                                Toast.LENGTH_LONG).show();
                                    }
                                }
                            });
                } else {
                    Toast.makeText(LoginActivity.this," Vui lòng nhập đầy đủ thông tin! ", Toast.LENGTH_LONG).show();
                }

            }
        });
    }
    private void checkRole(){
        Query query = FirebaseDatabase.getInstance().getReference("userInfo")
                .orderByChild("email").equalTo(email);
        query.addListenerForSingleValueEvent(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                for(DataSnapshot ds : dataSnapshot.getChildren()){
                    String role = ds.child("role").getValue(String.class);
                    if(role.equals("admin")){
                        Intent intent = new Intent(LoginActivity.this, HomeAdminActivity.class);
                        startActivity(intent);
                        finish();
                    }else{
                        Intent intent = new Intent(LoginActivity.this, HomeActivity.class);
                        startActivity(intent);
                        finish();
                    }
                }
            }

            @Override
            public void onCancelled(DatabaseError databaseError) {
                Toast.makeText(LoginActivity.this, " Lỗi sự kiện! ", Toast.LENGTH_LONG).show();
            }
        });
    }
}
