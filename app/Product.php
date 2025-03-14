<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	protected $fillable = [
		'user_id',
		'product_name',
		'product_sku',
		'category_id',
		'price',
		'stock',
		'publication_status',
		'is_featured',
		'featured_image',
		'youtube_video_url',
		'product_details',
		'meta_title',
		'meta_keywords',
		'meta_description',
	];

	public function category() {
		return $this->belongsTo(Category::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function tags() {
		return $this->belongsToMany(Tag::class);
	}
}
