@php
    $perPage = (int) ($shortcode->per_page ?? 6);
    $currentPage = (int) request()->get('page', 1);
    $offset = ($currentPage - 1) * $perPage;
    $totalPosts = $posts->count();
    $totalPages = ceil($totalPosts / $perPage);
    $paginatedPosts = $posts->slice($offset, $perPage);
    $showNavigation = ($shortcode->show_navigation ?? 'yes') === 'yes';
    $showPagination = ($shortcode->show_pagination ?? 'yes') === 'yes';
    $gridColumns = $shortcode->grid_columns ?? '3';
@endphp

<div class="blog-posts-style-8">
    @if($showNavigation)
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="posts-count">
                <span class="text-muted small">
                    Showing {{ $offset + 1 }} to {{ min($offset + $perPage, $totalPosts) }} of {{ $totalPosts }} posts
                </span>
            </div>
            <div class="view-controls">
                <div class="btn-group btn-group-sm" role="group">
                    <button type="button" class="btn btn-outline-purple grid-view active" data-view="grid">
                        <i class="ti ti-layout-grid"></i> Grid
                    </button>
                    <button type="button" class="btn btn-outline-purple list-view" data-view="list">
                        <i class="ti ti-list"></i> List
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="posts-grid" data-columns="{{ $gridColumns }}">
        <div class="row gy-4 posts-container grid-layout" id="posts-container-{{ $shortcode->style }}">
            @foreach($paginatedPosts as $post)
                <div class="col-lg-{{ 12 / (int)$gridColumns }} col-md-6 post-item" data-post-id="{{ $post->id }}">
                    <article class="post-card">
                        <div class="post-image-wrapper">
                            <a href="{{ $post->url }}" title="{{ $post->name }}" class="image-link">
                                <div class="image-container">
                                    {{ RvMedia::image($post->image, $post->name, 'medium', attributes: ['class' => 'post-image']) }}
                                </div>
                            </a>
                            @if($post->firstCategory)
                                <div class="category-tag">
                                    {{ $post->firstCategory->name }}
                                </div>
                            @endif
                        </div>
                        
                        <div class="post-content">
                            <div class="post-meta-wrapper">
                                {!! Theme::partial('blog.post-meta', ['post' => $post, 'wrapperClass' => '']) !!}
                            </div>

                            <h3 class="post-title">
                                <a href="{{ $post->url }}" title="{{ $post->name }}">{{ $post->name }}</a>
                            </h3>

                            @if ($description = $post->description)
                                <p class="post-excerpt">{!! Str::limit(BaseHelper::clean($description), 120) !!}</p>
                            @endif
                            
                            <div class="post-footer">
                                <a href="{{ $post->url }}" class="read-more">
                                    Read More <i class="ti ti-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>

    @if($showPagination && $totalPages > 1)
        <nav class="pagination-wrap mt-30">
            <ul class="pagination list-wrap justify-content-center">
                @if ($currentPage > 1)
                    <li class="page-item">
                        <a class="page-link page-prev" href="{{ request()->fullUrlWithQuery(['page' => $currentPage - 1]) }}">
                            <x-core::icon name="ti ti-chevron-left"/>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <span class="page-link page-prev prev-page" aria-disabled="true">
                            <x-core::icon name="ti ti-chevron-left"/>
                        </span>
                    </li>
                @endif
                
                @for($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++)
                    @if ($i == $currentPage)
                        <li class="page-item active">
                            <a class="page-link" href="#" aria-current="page">{{ $i }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ request()->fullUrlWithQuery(['page' => $i]) }}">{{ $i }}</a>
                        </li>
                    @endif
                @endfor
                
                @if ($currentPage < $totalPages)
                    <li class="page-item">
                        <a class="page-link page-next" href="{{ request()->fullUrlWithQuery(['page' => $currentPage + 1]) }}">
                            <x-core::icon name="ti ti-chevron-right"/>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <span class="page-link page-next disabled" aria-disabled="true">
                            <x-core::icon name="ti ti-chevron-right"/>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>

<style>
/* Blog Posts Style 8 - Purple Theme with Aesthetic Cards */
.blog-posts-style-8 {
    --purple-primary: #460372;
    --purple-dark: #7c3aed;
    --purple-light: #a78bfa;
    --gray-50: #f9fafb;
    --gray-100: #f3f4f6;
    --gray-200: #e5e7eb;
    --gray-300: #d1d5db;
    --gray-600: #4b5563;
    --gray-700: #374151;
    --gray-900: #111827;
}

/* Toggle Buttons - Purple Theme */
.blog-posts-style-8 .btn-outline-purple {
    color: var(--purple-primary);
    border-color: var(--purple-primary);
    background-color: white;
    font-weight: 500;
    transition: all 0.3s ease;
}

.blog-posts-style-8 .btn-outline-purple:hover {
    color: white;
    background-color: var(--purple-primary);
    border-color: var(--purple-primary);
    transform: translateY(-1px);
}

.blog-posts-style-8 .btn-outline-purple.active {
    color: white;
    background-color: var(--purple-primary);
    border-color: var(--purple-primary);
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
}

/* Aesthetic Post Cards */
.blog-posts-style-8 .post-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    height: 100%;
    display: flex;
    flex-direction: column;
    border: 1px solid var(--gray-200);
}

.blog-posts-style-8 .post-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    border-color: var(--purple-light);
}

/* Image Wrapper */
.blog-posts-style-8 .post-image-wrapper {
    position: relative;
    overflow: hidden;
    background: var(--gray-100);
}

.blog-posts-style-8 .image-container {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.blog-posts-style-8 .post-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.blog-posts-style-8 .image-link:hover .post-image {
    transform: scale(1.05);
}

.blog-posts-style-8 .category-tag {
    position: absolute;
    top: 12px;
    left: 12px;
    background: var(--purple-primary);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    z-index: 2;
}

/* Post Content */
.blog-posts-style-8 .post-content {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.blog-posts-style-8 .post-meta-wrapper {
    margin-bottom: 12px;
}

.blog-posts-style-8 .post-meta-wrapper .post-meta {
    margin: 0;
}

.blog-posts-style-8 .post-title {
    margin: 0 0 12px 0;
    font-size: 1.125rem;
    font-weight: 700;
    line-height: 1.4;
    color: var(--gray-900);
}

.blog-posts-style-8 .post-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
}

.blog-posts-style-8 .post-title a:hover {
    color: var(--purple-primary);
}

.blog-posts-style-8 .post-excerpt {
    color: var(--gray-600);
    line-height: 1.6;
    margin: 0 0 16px 0;
    flex: 1;
    font-size: 0.9rem;
}

.blog-posts-style-8 .post-footer {
    margin-top: auto;
    padding-top: 16px;
    border-top: 1px solid var(--gray-100);
}

.blog-posts-style-8 .read-more {
    color: var(--purple-primary);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.875rem;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: all 0.3s ease;
}

.blog-posts-style-8 .read-more:hover {
    color: var(--purple-dark);
    transform: translateX(2px);
}

.blog-posts-style-8 .read-more i {
    font-size: 0.75rem;
    transition: transform 0.3s ease;
}

.blog-posts-style-8 .read-more:hover i {
    transform: translateX(2px);
}

/* Purple Pagination */
.blog-posts-style-8 .pagination .page-item.active .page-link {
    background-image: none;
    background-color: var(--purple-primary);
    border-color: var(--purple-primary);
    color: white;
}

.blog-posts-style-8 .pagination .page-link:hover {
    background-color: var(--purple-light);
    border-color: var(--purple-light);
    color: white;
}

.blog-posts-style-8 .pagination .page-link {
    color: var(--purple-primary);
    border-color: var(--gray-300);
    transition: all 0.3s ease;
}

/* List Layout Styles */
.blog-posts-style-8 .posts-container.list-layout .post-item {
    margin-bottom: 24px;
}

.blog-posts-style-8 .posts-container.list-layout .post-card {
    flex-direction: row;
    height: auto;
}

.blog-posts-style-8 .posts-container.list-layout .post-image-wrapper {
    flex: 0 0 280px;
}

.blog-posts-style-8 .posts-container.list-layout .image-container {
    height: 180px;
}

.blog-posts-style-8 .posts-container.list-layout .post-content {
    flex: 1;
    padding: 24px;
}

.blog-posts-style-8 .posts-container.list-layout .post-title {
    font-size: 1.25rem;
    margin-bottom: 16px;
}

.blog-posts-style-8 .posts-container.list-layout .post-excerpt {
    margin-bottom: 20px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .blog-posts-style-8 .d-flex {
        flex-direction: column;
        gap: 16px;
        text-align: center;
    }
    
    .blog-posts-style-8 .view-controls {
        align-self: center;
    }
    
    .blog-posts-style-8 .posts-container.list-layout .post-card {
        flex-direction: column;
    }
    
    .blog-posts-style-8 .posts-container.list-layout .post-image-wrapper {
        flex: none;
    }
    
    .blog-posts-style-8 .posts-container.list-layout .image-container {
        height: 200px;
    }
    
    .blog-posts-style-8 .posts-container.list-layout .post-content {
        padding: 20px;
    }
}

@media (max-width: 576px) {
    .blog-posts-style-8 .post-content {
        padding: 16px;
    }
    
    .blog-posts-style-8 .post-title {
        font-size: 1rem;
    }
    
    .blog-posts-style-8 .posts-container.list-layout .post-content {
        padding: 16px;
    }
}

/* Loading State */
.blog-posts-style-8 .posts-container {
    transition: opacity 0.3s ease;
}

.blog-posts-style-8 .posts-container.loading {
    opacity: 0.6;
}

/* Smooth Animations */
.blog-posts-style-8 .post-card {
    animation: fadeInUp 0.6s ease forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Stagger animation for cards */
.blog-posts-style-8 .post-item:nth-child(1) .post-card { animation-delay: 0.1s; }
.blog-posts-style-8 .post-item:nth-child(2) .post-card { animation-delay: 0.2s; }
.blog-posts-style-8 .post-item:nth-child(3) .post-card { animation-delay: 0.3s; }
.blog-posts-style-8 .post-item:nth-child(4) .post-card { animation-delay: 0.4s; }
.blog-posts-style-8 .post-item:nth-child(5) .post-card { animation-delay: 0.5s; }
.blog-posts-style-8 .post-item:nth-child(6) .post-card { animation-delay: 0.6s; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const blogContainer = document.querySelector('.blog-posts-style-8');
    if (!blogContainer) return;

    // Grid/List view toggle
    const gridBtn = blogContainer.querySelector('.grid-view');
    const listBtn = blogContainer.querySelector('.list-view');
    const postsContainer = blogContainer.querySelector('.posts-container');
    
    if (gridBtn && listBtn && postsContainer) {
        // Load saved preference
        const savedView = localStorage.getItem('blog-view-preference-style8') || 'grid';
        if (savedView === 'list') {
            switchToListView();
        }

        gridBtn.addEventListener('click', function() {
            switchToGridView();
            localStorage.setItem('blog-view-preference-style8', 'grid');
        });
        
        listBtn.addEventListener('click', function() {
            switchToListView();
            localStorage.setItem('blog-view-preference-style8', 'list');
        });

        function switchToGridView() {
            gridBtn.classList.add('active');
            listBtn.classList.remove('active');
            postsContainer.classList.remove('list-layout');
            postsContainer.classList.add('grid-layout');
            
            // Reset grid columns
            const columns = postsContainer.closest('.posts-grid').dataset.columns || '3';
            postsContainer.querySelectorAll('.post-item').forEach(item => {
                item.className = item.className.replace(/col-lg-\d+/, `col-lg-${12 / parseInt(columns)}`);
            });
        }

        function switchToListView() {
            listBtn.classList.add('active');
            gridBtn.classList.remove('active');
            postsContainer.classList.remove('grid-layout');
            postsContainer.classList.add('list-layout');
            
            // Set to single column for list view
            postsContainer.querySelectorAll('.post-item').forEach(item => {
                item.className = item.className.replace(/col-lg-\d+/, 'col-lg-12');
            });
        }
    }

    // Smooth scroll to top on pagination
    blogContainer.querySelectorAll('.pagination a').forEach(link => {
        link.addEventListener('click', function(e) {
            // Add loading state
            postsContainer.classList.add('loading');
            
            setTimeout(() => {
                blogContainer.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'start' 
                });
            }, 100);
            
            // Remove loading state after navigation
            setTimeout(() => {
                postsContainer.classList.remove('loading');
            }, 1000);
        });
    });

    // Add stagger animation on load
    const postCards = blogContainer.querySelectorAll('.post-card');
    postCards.forEach((card, index) => {
        card.style.animationDelay = `${(index % 6) * 0.1}s`;
    });
});
</script>