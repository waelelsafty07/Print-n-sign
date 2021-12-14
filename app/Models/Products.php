<?php

namespace App\Models;
use Imageproducts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    public function ProductImage(){
         $this->image =\App\Models\Imageproducts::select('imageproducts_name')->where('product_id',$this->id)->get()->first();
        if($this->image==null)
            return env('DEFAULT_IMAGE_LOGO');
        else
            return env('STORAGE_URL').'/uploads/website/'.$this->image->imageproducts_name;
    }

    public function category_id() {
		return $this->hasOne('App\Models\Categories', 'id', 'category_id');
	}

	public function subcategory_id() {
		return $this->hasOne('App\Models\Subcategories', 'id', 'subCategory_id');
	}
}
