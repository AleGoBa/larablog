<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\PostImage;

class Post extends Model
{
    protected $fillable = ['title','url_clean','description','category_id','posted'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function image () {

        return $this->hasOne(PostImage::class);


}
}
