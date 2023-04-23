<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'poster'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('poster')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('poster')->store("images/{$folder}");
        }
        return null;
    }

    public function getImage(): string
    {
        if (!$this->poster) {
            return asset("uploads/no-image.png");
        }
        return asset("uploads/{$this->poster}");
    }

}
