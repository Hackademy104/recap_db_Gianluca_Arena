<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'img',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
