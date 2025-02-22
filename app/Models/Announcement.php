<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    /** @use HasFactory<\Database\Factories\AnnouncementFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titre',
        'description',
        'prix',
        'image',
        'user_id',
        'category_id',
        'status',
    ];
    
    /**
     * Relation avec la catégorie.
     */
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    /**
     * Relation avec l'utilisateur.
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Relation avec les commentaires.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
