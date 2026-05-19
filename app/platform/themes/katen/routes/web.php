<?php

use Botble\Base\Http\Middleware\RequiresJsonRequestMiddleware;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Route;
use Theme\Katen\Http\Controllers\KatenController;

Theme::registerRoutes(function (): void {
    Route::group([
        'prefix' => 'ajax',
        'as' => 'public.ajax.',
        'middleware' => RequiresJsonRequestMiddleware::class,
        'controller' => KatenController::class,
    ], function (): void {
        Route::get('posts', 'ajaxGetBlogPosts')
            ->name('posts');
        Route::get('posts/search', 'ajaxGetBlogPostsSearch')
            ->name('posts.search');
        Route::get('posts/shortcode', 'ajaxGetBlogPostsShortcode')
            ->name('posts.shortcode');
    });
});

Theme::routes();
