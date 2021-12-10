<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    
    public function category_id() {
		return $this->hasOne('App\Model\Categories', 'id', 'category_id');
	}
}
