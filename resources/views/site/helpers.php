<?php

use App\Models\Language;
use App\Models\Page;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Schema;

function getBaseURL()
{
    $root = '//' . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

    return $root;
}
function getFileBaseURL()
{
    if (env('FILESYSTEM_DRIVER') == 's3') {
        return env('AWS_URL') . '/';
    } else {
        return getBaseURL() . 'public/';
    }
}


function addTablePages()
{
    Schema::create('pages', function (Blueprint $table) {
        $table->id();
        $table->text('title');
        $table->string('slug');
        $table->text('body');
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->timestamps();
    });
}

function addTablesettingswebsite(){
    Schema::create('settings', function (Blueprint $table) {
        $table->id();
        $table->text('title_website');
        $table->string('logo');
        $table->string('favicon');
        $table->text('facebook_link');
        $table->text('twitter_link');
        $table->text('youtube_link');
        $table->text('email');
        $table->text('phone');
        $table->timestamps();
    });
}

function addTablePagesTranslation()
{
    Schema::create('pages_translations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('page_id')->constrained('pages');
        $table->string('lang');
        $table->string('title');
        $table->text('body');
    });
}

function statusPage()
{
    $status = [
        'active' =>  'Active',
        'inactive' =>  'Inactive',
    ];

    return $status;
}

function getLanguages()
{
    return
        Language::where('active', 1)->get();
}

function pagesTypes()
{
    $typs = [
        'pageregister' => 'Page Register Teacher, Student',
        'pagecontactsus' => 'Page ContactsUs',
        'pageabout' => 'Page About',
        'homepage' => 'Home Page',
        'recommendations' =>'Recommendations'
    ];

    return $typs;
}


function pages()
{
    return Page::get();
}
