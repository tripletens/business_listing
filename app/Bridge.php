<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bridge extends Model
{
    //
    protected $table = 'bridge';
    //Primary key
    public $primarykey = 'id';
    //timestamps
    public $timestamps = true;

    protected $fillable = [
        'business_id', 'category_id'
    ];
    public function business(){
        $this->belongsTo('App\Business','business_id','id');
    }
    public function category()
    {
        $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
