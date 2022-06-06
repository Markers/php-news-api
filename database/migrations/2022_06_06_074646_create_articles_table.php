<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 크롤링을 통해 blog.jetbrains.com/phpstorm 정보를 저장한다.
        // 파일 데이터는 md와 mdx 파일로 관리
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id')->unique();
            $table->enum('category', ['news', 'tutorials', 'videos', 'php-annotated-monthly','features', 'eap'])->index();
            $table->string('thumbnail')->nullable();
            $table->string('title');
            $table->string('url');
            $table->string('description');
            $table->date('publish_date');
            $table->boolean('is_translation')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
