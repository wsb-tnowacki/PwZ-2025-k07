<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posty";
    protected $fillable = [
        "tytul",
/*         "autor",
        "email", */
        'user_id',
        "tresc"
    ];
    //definicja relcji do modelu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
