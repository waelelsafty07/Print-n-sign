<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    public function subCategoryImage(){

      if($this->image==null)
          return env('DEFAULT_IMAGE_LOGO');
      else
          return env('STORAGE_URL').'/uploads/website/'.$this->image;
  }
    public function category_id() {
		return $this->hasOne('App\Model\Categories', 'id', 'category_id');
	}
}
