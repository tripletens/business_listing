<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    //Primary key
    public $primarykey = 'id';
    //timestamps
    public $timestamps = true;

    protected $fillable = [
        'title'
    ];

    public function bridge()
    {
        $this->hasMany('App\Bridge', 'category_id', 'id');
    }
}
