<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Business extends Model
{
    use SoftDeletes;
    protected $table = 'business';
    //Primary key
    public $primarykey = 'id';
    //timestamps
    public $timestamps = true;

    protected $fillable = [
        'name','email','address','description','url','phone','mobile',
        'image1','image2','image3',
    ];
    public function bridge()
    {
        $this->hasMany('App\Bridge', 'business_id', 'id');
    }
}
