package com.example.nauan;

public class food {
    private String foodname;
    private String description;
    private String foodimage;
    private String ingredient;

    private String category;


    public food(String foodname,String foodimage) {
        this.foodname = foodname;
        this.foodimage = foodimage;
    }
    public food(String foodname,String foodimage,String ingredient,String description,String category) {
        this.foodname = foodname;
        this.foodimage = foodimage;
        this.ingredient = ingredient;
        this.description = description;
        this.category = category;
    }
    public String getFoodname() {
        return foodname;
    }

    public void setFoodname(String foodname) {
        this.foodname = foodname;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }
    public String getFoodimage() {
        return foodimage;
    }

    public void setFoodimage(String foodimage) {this.foodimage = foodimage;}
    public String getIngredient() {
        return ingredient;
    }

    public void setIngredient(String ingredient) {this.ingredient = ingredient;}

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {this.category = category;}
}
