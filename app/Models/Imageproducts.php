<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imageproducts extends Model
{

    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    public function ProductImage(){

        if($image==null)
            return env('DEFAULT_IMAGE_LOGO');
        else
            return env('STORAGE_URL').'/uploads/website/'.$image;
    }
    public function product_id() {
		return $this->hasOne('App\Models\Products', 'id', 'product_id');
	}
}
