<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Post extends Model
{
    protected $dates = ['published_at'];

    
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

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::now());
    }
}
