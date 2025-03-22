<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
            $table->string('product_name');
            $table->string('product_sku')->unique();
			$table->integer('company_id')->unsigned()->index();
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);
			$table->text('product_fetures')->nullable();
            $table->boolean('publication_status')->default(1);
            $table->boolean('is_featured')->default(0);
			$table->string('featured_image')->nullable();
            $table->string('youtube_video_url')->nullable();
            $table->text('product_details')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('products');
	}
}
