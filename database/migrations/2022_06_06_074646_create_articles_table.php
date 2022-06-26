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
            // Jetbrains 사이트에서 제공하는 정보를 저장한다.
            $table->integer('post_id')->unique()->comment('웹 페이지의 고유 id');
            $table->string('href')->comment('웹사이트에서의 글 주소');
            $table->string('thumbnail')->nullable()->comment("썸네일 이미지");
            $table->unsignedSmallInteger('width')->comment('width');
            $table->unsignedSmallInteger('height')->comment('height');
            $table->string('sizes')->nullable()->comment('css sizes');
            $table->string('title')->comment("제목");
            $table->string('description')->comment("설명");
            $table->date('publish_date')->comment("작성일");
            // 작성자 정보
            $table->string('author')->comment("작성자");
            $table->string('author_avatar')->nullable()->comment("작성자 아바타 URL");
            // 구분을 위한 정보
            $table->enum('category', ['news', 'tutorials', 'videos', 'php-annotated-monthly','features', 'eap'])->index()->comment('카테고리');
            // 번역 정보를 제공
            $table->string("slug")->nullable()->comment("슬러그");
            $table->string("translated_title")->nullable()->comment("번역된 제목");
            $table->string("translated_url")->nullable()->comment("번역된 파일 URL");
            $table->string("translated_description")->nullable()->comment("번역된 설명");
            $table->boolean('is_translation')->default(false)->comment("번역 상태");
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
