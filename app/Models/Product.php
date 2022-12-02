<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model{
    use HasFactory;
    protected $fillable = ['title', 'description','category_id'];
     /**
     * Get the category for the blog post.
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

}
