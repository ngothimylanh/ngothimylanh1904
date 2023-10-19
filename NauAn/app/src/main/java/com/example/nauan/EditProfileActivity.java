package com.example.nauan;

import android.content.Intent;
import android.os.Bundle;
import android.util.Patterns;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthCredential;
import com.google.firebase.auth.EmailAuthProvider;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.google.firebase.database.ValueEventListener;

public class EditProfileActivity extends AppCompatActivity {
    FirebaseAuth mAuth = FirebaseAuth.getInstance();
    FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();
    String currentemail = user.getEmail();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_editpf);
        Button editpf = findViewById(R.id.editpf_btn);
        editpf.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                updatedb();
            }
        });
    }

    private void updatedb() {
        EditText etusername = findViewById(R.id.username_editpf);
        EditText etfullname = findViewById(R.id.fullname_editpf);
        EditText etpassword = findViewById(R.id.password_editpf);
        EditText etemail = findViewById(R.id.email_editpf);

        String username = String.valueOf(etusername.getText());
        String password = String.valueOf(etpassword.getText());
        String fullname = String.valueOf(etfullname.getText());
        String email = String.valueOf(etemail.getText());
        String role = "";

        int passsize = etpassword.getText().length();

        if (!username.equals("") && !fullname.equals("") && !password.equals("") && !email.equals("")) {
            Query query = FirebaseDatabase.getInstance().getReference("userInfo")
                    .orderByChild("email").equalTo(email);
            query.addListenerForSingleValueEvent(new ValueEventListener() {
                @Override
                public void onDataChange(DataSnapshot ds) {
                    int count = (int) ds.getChildrenCount();
                    if (count > 0 && !email.equals(currentemail)) {
                        Toast.makeText(EditProfileActivity.this, " Email đã được sử dụng! ", Toast.LENGTH_LONG).show();
                    } else if (passsize < 6) {
                        Toast.makeText(EditProfileActivity.this, " Mật khẩu phải dài hơn 6 ký tự! ", Toast.LENGTH_LONG).show();
                    } else {
                        if (Patterns.EMAIL_ADDRESS.matcher(email).matches()) {
                            Query query2 = FirebaseDatabase.getInstance().getReference("userInfo")
                                    .orderByChild("email").equalTo(currentemail);
                            query2.addListenerForSingleValueEvent(new ValueEventListener() {
                                @Override
                                public void onDataChange(DataSnapshot dataSnapshot) {
                                    user.updatePassword(password)
                                            .addOnCompleteListener(new OnCompleteListener<Void>() {
                                                @Override
                                                public void onComplete(@NonNull Task<Void> task) {
                                                    if (task.isSuccessful()) {
                                                        user.updateEmail(email);
                                                        for (DataSnapshot ds : dataSnapshot.getChildren()) {
                                                            String key = ds.getKey();
                                                            DatabaseReference userRef = FirebaseDatabase.getInstance().getReference("userInfo").child(key);
                                                            user user = new user(username, fullname, password, email, role);
                                                            userRef.setValue(user);
                                                        }
                                                        mAuth.signInWithEmailAndPassword(email,password);
                                                        Toast.makeText(EditProfileActivity.this, " Cập nhật thành công!", Toast.LENGTH_LONG).show();
                                                        Intent intent = new Intent(EditProfileActivity.this, HomeActivity.class);
                                                        startActivity(intent);
                                                        finish();
                                                    }
                                                }
                                            });
                                }

                                @Override
                                public void onCancelled(@NonNull DatabaseError error) {
                                    Toast.makeText(EditProfileActivity.this, " Lỗi sự kiện! ", Toast.LENGTH_LONG).show();
                                }
                            });
                        } else {
                            Toast.makeText(EditProfileActivity.this, "Không thể gửi email xác thực. Vui lòng thử lại sau!", Toast.LENGTH_LONG).show();
                        }
                    }
                }

                @Override
                public void onCancelled(@NonNull DatabaseError error) {
                    Toast.makeText(EditProfileActivity.this, " Lỗi sự kiện! ", Toast.LENGTH_LONG).show();
                }
            });
        }
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
                Toast.makeText(EditProfileActivity.this, " Đã đăng xuất! ", Toast.LENGTH_LONG).show();
                Intent intent = new Intent(EditProfileActivity.this, LoginActivity.class);
                startActivity(intent);
                finish();
                break;
            }
            case R.id.user:
            {
                Intent intent = new Intent(EditProfileActivity.this, ProfileActivity.class);
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
