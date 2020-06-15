<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    //Relationship
    public function author(){
        return $this->belongsTo(User::class);
    }
    
    
    
    // Methods
    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";
        if( !is_null($this->image))
        {
            if(file_exists(public_path()))
            {
                $imagePath = public_path() ."/img/" .$this->image;
                $imageUrl = asset("img/".$this->image);
            }
        }  
        return $imageUrl;  
    }

    public function getDateAttribute($value)
    {
        return $this->created_at->diffForHumans();
    }

    public function scopeLatestFirst()
    {
        return $this->orderBy('created_at','desc');
    }
}
