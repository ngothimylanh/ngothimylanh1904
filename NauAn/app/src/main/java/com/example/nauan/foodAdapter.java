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

class FoodAdapter extends RecyclerView.Adapter<FoodAdapter.ViewHolder> {
    private Context context;
    private ArrayList<food> foodList;


    public FoodAdapter(Context context, ArrayList<food> foodList) {
        this.context = context;
        this.foodList = foodList;
    }

    public static class ViewHolder extends RecyclerView.ViewHolder {
        public ImageView foodimage;
        public TextView foodname;

        public ViewHolder(View itemView) {
            super(itemView);

            foodimage = itemView.findViewById(R.id.food_image);
            foodname = itemView.findViewById(R.id.food_name);
        }
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext()).inflate(R.layout.foodlist, parent, false);
        return new ViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, int position) {
        food currentFood = foodList.get(position);

        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, FoodDetailActivity.class);
                intent.putExtra("foodname", currentFood.getFoodname());
                intent.putExtra("foodimage", currentFood.getFoodimage());
                context.startActivity(intent);
            }
        });

        String foodimg = String.valueOf(currentFood.getFoodimage());
        holder.foodname.setText(currentFood.getFoodname());
        Picasso.get().load(foodimg).fit().centerInside().into(holder.foodimage);
    }

    @Override
    public int getItemCount() {
        return foodList.size();
    }
}
