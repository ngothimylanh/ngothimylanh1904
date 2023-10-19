package com.example.nauan;

import static androidx.constraintlayout.helper.widget.MotionEffect.TAG;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import android.os.Bundle;
import android.content.Intent;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
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

public class ProfileActivity extends AppCompatActivity{
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        TextView tvusername = findViewById(R.id.username_pf);
        TextView tvfullname = findViewById(R.id.fullname_pf);
        TextView tvpassword = findViewById(R.id.password_pf);
        TextView tvemail = findViewById(R.id.email_pf);

        Button editpf = findViewById(R.id.editprofile_btn);
        Button deluser = findViewById(R.id.delete_btn);

        FirebaseAuth mAuth;
        FirebaseUser user;
        mAuth = FirebaseAuth.getInstance();
        user = mAuth.getCurrentUser();
        String currentemail = user.getEmail();

        Query query = FirebaseDatabase.getInstance().getReference("userInfo")
                .orderByChild("email").equalTo(currentemail);
        query.addListenerForSingleValueEvent(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                for(DataSnapshot ds : dataSnapshot.getChildren()) {
                    String username = ds.child("username").getValue().toString();
                    String fullname = ds.child("fullname").getValue().toString();
                    String password = ds.child("password").getValue().toString();
                    String email = currentemail;

                    tvusername.setText(username);
                    tvfullname.setText(fullname);
                    tvpassword.setText(password);
                    tvemail.setText(email);
                }
            }

            @Override
            public void onCancelled(DatabaseError databaseError) {
                Toast.makeText(ProfileActivity.this, " Lỗi sự kiện! ", Toast.LENGTH_LONG).show();
            }
        });

        editpf.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(ProfileActivity.this, EditProfileActivity.class);
                startActivity(intent);
                finish();
            }
        });
        deluser.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Query query = FirebaseDatabase.getInstance().getReference("userInfo").orderByChild("email").equalTo(currentemail);
                user.delete()
                        .addOnCompleteListener(new OnCompleteListener<Void>() {
                            @Override
                            public void onComplete(@NonNull Task<Void> task) {
                                if (task.isSuccessful()) {
                                    query.addValueEventListener(new ValueEventListener() {
                                        @Override
                                        public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                                            for (DataSnapshot ds : dataSnapshot.getChildren()) {
                                                ds.getRef().removeValue();
                                                Toast.makeText(ProfileActivity.this, " Xoá tài khoản thành công! ", Toast.LENGTH_LONG).show();
                                                mAuth.signOut();
                                                Intent intent = new Intent(ProfileActivity.this, LoginActivity.class);
                                                startActivity(intent);
                                                finish();
                                            }
                                        }

                                        @Override
                                        public void onCancelled(@NonNull DatabaseError error) {
                                            Toast.makeText(ProfileActivity.this, " Lỗi sự kiện! ", Toast.LENGTH_LONG).show();
                                        }
                                    });
                                }
                            }
                        });
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
                Toast.makeText(ProfileActivity.this, " Đã đăng xuất! ", Toast.LENGTH_SHORT).show();
                Intent intent = new Intent(ProfileActivity.this, LoginActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            case R.id.user:
            {
                Toast.makeText(ProfileActivity.this, " Đang hiển thị ", Toast.LENGTH_SHORT).show();
                break;
            }
            default:
                return super.onOptionsItemSelected(item);
        }
        return true;
    }
}
