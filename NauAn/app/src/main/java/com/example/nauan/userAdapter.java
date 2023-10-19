package com.example.nauan;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;

class UserAdapter extends RecyclerView.Adapter<UserAdapter.ViewHolder> {
    private Context context;
    private ArrayList<user> userList;

    public UserAdapter(Context context, ArrayList<user> userList) {
        this.context = context;
        this.userList = userList;
    }

    public static class ViewHolder extends RecyclerView.ViewHolder {
        public TextView username;

        public TextView email;
        public TextView role;
        public TextView pass;

        public ViewHolder(View itemView) {
            super(itemView);
            username = itemView.findViewById(R.id.user_name);
            email = itemView.findViewById(R.id.user_email);
            pass = itemView.findViewById(R.id.password_list);
            role = itemView.findViewById(R.id.role);
        }
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext()).inflate(R.layout.userlist_admin, parent, false);
        return new ViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, int position) {
        user currentuser = userList.get(position);
        holder.username.setText(currentuser.getUsername());
        holder.email.setText(currentuser.getEmail());
        holder.pass.setText(currentuser.getPassword());
        holder.role.setText(currentuser.getRole());
    }

    @Override
    public int getItemCount() {
        return userList.size();
    }
}
