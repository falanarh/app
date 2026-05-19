// Blog Posts Style 8 - Enhanced JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const blogContainer = document.querySelector('.blog-posts-style-8');
    if (!blogContainer) return;

    // Initialize components
    initViewToggle();
    initLazyLoading();
    initSmoothScrolling();
    initKeyboardNavigation();

    function initViewToggle() {
        const gridBtn = blogContainer.querySelector('.grid-view');
        const listBtn = blogContainer.querySelector('.list-view');
        const postsContainer = blogContainer.querySelector('.posts-container');
        
        if (!gridBtn || !listBtn || !postsContainer) return;

        // Load saved view preference
        const savedView = localStorage.getItem('blog-view-preference') || 'grid';
        if (savedView === 'list') {
            switchToListView();
        }

        gridBtn.addEventListener('click', function() {
            switchToGridView();
            localStorage.setItem('blog-view-preference', 'grid');
        });
        
        listBtn.addEventListener('click', function() {
            switchToListView();
            localStorage.setItem('blog-view-preference', 'list');
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

    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            blogContainer.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }

    function initSmoothScrolling() {
        blogContainer.querySelectorAll('.pagination a').forEach(link => {
            link.addEventListener('click', function(e) {
                // Add smooth scrolling to top when pagination is clicked
                setTimeout(() => {
                    blogContainer.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'start' 
                    });
                }, 100);
            });
        });
    }

    function initKeyboardNavigation() {
        document.addEventListener('keydown', function(e) {
            // Keyboard shortcuts for pagination
            if (e.target.tagName.toLowerCase() === 'input') return;
            
            const currentPage = blogContainer.querySelector('.pagination .page-item.active');
            if (!currentPage) return;

            if (e.key === 'ArrowLeft') {
                const prevLink = currentPage.previousElementSibling?.querySelector('a');
                if (prevLink) {
                    e.preventDefault();
                    prevLink.click();
                }
            } else if (e.key === 'ArrowRight') {
                const nextLink = currentPage.nextElementSibling?.querySelector('a');
                if (nextLink) {
                    e.preventDefault();
                    nextLink.click();
                }
            }
        });
    }

    // Add loading animation for pagination
    blogContainer.querySelectorAll('.pagination a').forEach(link => {
        link.addEventListener('click', function() {
            blogContainer.classList.add('loading');
            
            // Remove loading class after a delay (in case of slow navigation)
            setTimeout(() => {
                blogContainer.classList.remove('loading');
            }, 3000);
        });
    });

    // Add fade-in animation for posts
    const posts = blogContainer.querySelectorAll('.post-item');
    posts.forEach((post, index) => {
        post.style.animationDelay = `${index * 0.1}s`;
        post.classList.add('fade-in');
    });
});

// Add CSS for animations
const style = document.createElement('style');
style.textContent = `
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .blog-posts-style-8.loading::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255,255,255,0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
    }
`;
document.head.appendChild(style);