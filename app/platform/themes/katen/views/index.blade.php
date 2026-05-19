@php Theme::layout('no-sidebar'); @endphp

<div class="container">
    <div class="mt-4">
        <h4 class="text-danger">You need to setup your homepage first!</h4>

        <p><strong>1. Go to Admin -> Plugins then activate all plugins.</strong></p>
        <p><strong>2. Go to Admin -> Pages and create a page:</strong></p>

        <div class="mt-2">
            <div>- Content:</div>
            <pre class="my-2 bg-black text-light p-2 rounded"><code>[blog-posts style="style-1" category_ids="1,4,6" limit="1"][/blog-posts]
[blog-posts style="style-2" category_ids="2,6,7" title="Editor’s Pick" limit="5"][/blog-posts]
[blog-posts style="style-3" category_ids="2,4,5,6,7" title="Trending" limit="6"][/blog-posts]
[blog-posts style="style-4" category_ids="2,4,5,6,7" title="Inspiration" limit="6"][/blog-posts]
[blog-posts style="style-5" category_ids="2,4,6,7" title="Latest Posts" limit="6"][/blog-posts]</code></pre>
            <br>
            <div>- Template: <strong>Homepage</strong>.</div>
        </div>

        <p><strong>3. Then go to Admin -> Appearance -> Theme options -> Page to set your homepage.</strong></p>
    </div>
</div>
