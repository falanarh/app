<?php

namespace Theme\Katen\Http\Controllers;

use Botble\Base\Facades\BaseHelper;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Base\Models\BaseQueryBuilder;
use Botble\Blog\Models\Post;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Theme\Facades\Theme;
use Botble\Theme\Http\Controllers\PublicController;
use Illuminate\Http\Request;
use Theme\Katen\Support\ThemeHelper;

class KatenController extends PublicController
{
    public function ajaxGetBlogPosts(Request $request): BaseHttpResponse
    {
        $limit = $request->integer('limit', 6);
        $type = $request->input('type');
        $categories = $request->input('categories', []);

        $view = $request->input('template', 'partials.blog.posts');
        $view = Theme::getThemeNamespace($view);

        $posts = ThemeHelper::getBlogPosts($categories, $type, $limit);

        return $this
            ->httpResponse()
            ->setData(view(
                view()->exists($view) ? $view : Theme::getThemeNamespace('widgets.blog-posts.templates.partials.posts'),
                compact('posts')
            )->render());
    }

    public function ajaxGetBlogPostsSearch(Request $request, PostInterface $postRepository): BaseHttpResponse
    {
        $query = BaseHelper::stringify($request->input('q'));

        $posts = collect();

        if (! empty($query)) {
            $posts = $postRepository->getSearch($query);

            $posts = $posts->take(4);
        }

        return $this
            ->httpResponse()
            ->setData(
                view(Theme::getThemeNamespace('partials.blog.search-results'), compact('posts'))->render()
            );
    }

    public function ajaxGetBlogPostsShortcode(Request $request)
    {
        $categoryIds = $request->input('categories', []);

        if (! is_plugin_active('blog') || ! $categoryIds) {
            return collect();
        }

        if (! is_array($categoryIds)) {
            $categoryIds = explode(',', $categoryIds);
        }

        $paginate = $request->integer('paginate', 6);
        $type = $request->input('type');

        $query = Post::query()
            ->whereHas('categories', fn (BaseQueryBuilder $query) => $query->whereIn('id', $categoryIds));

        if ($type) {
            $query = match ($type) {
                'popular' => $query->orderByDesc('views'),
                'featured' => $query->where('is_featured', 1),
                default => $query->orderByDesc('created_at'),
            };
        }

        $posts = $query
            ->wherePublished()
            ->paginate($paginate);

        $nextUrl = null;

        if ($posts->hasMorePages()) {
            $nextUrl = route('public.ajax.posts.shortcode', [
                'categories' => $categoryIds,
                'type' => $type,
                'paginate' => $paginate,
                'page' => $request->integer('page', 1) + 1,
            ]);
        }

        return $this
            ->httpResponse()
            ->setData([
                'html' => view(Theme::getThemeNamespace('partials.blog.shortcode-ajax-posts'), compact('posts'))->render(),
                'nextUrl' => $nextUrl,
            ]);
    }
}
