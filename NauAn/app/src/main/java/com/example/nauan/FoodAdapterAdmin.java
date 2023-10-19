package com.example.nauan;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;

class FoodAdapterAdmin extends RecyclerView.Adapter<FoodAdapterAdmin.ViewHolder> {
    private Context context;
    private ArrayList<food> foodlistad;

    private DatabaseReference Ref = FirebaseDatabase.getInstance().getReference("food");


    public FoodAdapterAdmin(Context context, ArrayList<food> foodlistad) {
        this.context = context;
        this.foodlistad = foodlistad;
    }

    public static class ViewHolder extends RecyclerView.ViewHolder {
        public ImageView foodimage;
        public TextView foodname;
        public ImageView deletefood;
        public ImageView editfood;

        public ViewHolder(View itemView) {
            super(itemView);

            foodimage = itemView.findViewById(R.id.food_image_ad);
            foodname = itemView.findViewById(R.id.food_name_ad);
            deletefood = itemView.findViewById(R.id.del_food_ad);
            editfood = itemView.findViewById(R.id.edit_food_ad);
        }
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext()).inflate(R.layout.foodlist_admin, parent, false);
        return new ViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, int position) {
        food currentFood = foodlistad.get(position);
        holder.deletefood.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Query query = Ref.orderByChild("foodname").equalTo(currentFood.getFoodname());
                query.get().addOnSuccessListener(new OnSuccessListener<DataSnapshot>() {
                    @Override
                    public void onSuccess(DataSnapshot dataSnapshot) {
                        for (DataSnapshot ds : dataSnapshot.getChildren()) {
                            ds.getRef().removeValue().addOnSuccessListener(new OnSuccessListener<Void>() {
                                @Override
                                public void onSuccess(Void aVoid) {
                                    Toast.makeText(context, " Xoá thành công "+currentFood.getFoodname()+"! ", Toast.LENGTH_LONG).show();
                                }
                            }).addOnFailureListener(new OnFailureListener() {
                                @Override
                                public void onFailure(@NonNull Exception e) {
                                    Toast.makeText(context, " Lỗi sự kiện! ", Toast.LENGTH_LONG).show();
                                }
                            });
                        }
                    }
                });

            }
        });
        holder.editfood.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, EditFoodActivity.class);
                intent.putExtra("currentfoodname",currentFood.getFoodname());
                context.startActivity(intent);
            }
        });
        String foodimg = String.valueOf(currentFood.getFoodimage());
        holder.foodname.setText(currentFood.getFoodname());
        Picasso.get().load(foodimg).fit().centerInside().into(holder.foodimage);
    }

    @Override
    public int getItemCount() {
        return foodlistad.size();
    }
}
