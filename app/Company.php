<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id', 'company_name', 'company_slug', 'company_desc','publication_status', 'meta_title', 'meta_keywords', 'meta_description',
    ];

    public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function post()
	{
		return $this->hasMany(Product::class);
	}
}
