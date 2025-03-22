<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	protected $fillable = [
		'user_id',
		'product_name',
		'product_sku',
		'company_id',
		'price',
		'stock',
		'product_fetures',
		'publication_status',
		'is_featured',
		'featured_image',
		'youtube_video_url',
		'product_details',
		'meta_title',
		'meta_keywords',
		'meta_description',
	];

	public function company() {
		return $this->belongsTo(Company::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function images() {
		return $this->hasMany(ProductImage::class);
	}
}
