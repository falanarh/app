<?php
/**
 * Title: Hidden 404
 * Slug: daily-news-blog/hidden-404
 * Inserter: no
 */
?>

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"bottom":"80px","top":"0px"}}},"layout":{"type":"constrained","contentSize":"800px"}} -->
<main class="wp-block-group" style="margin-top:0px;margin-bottom:80px"><!-- wp:heading {"textAlign":"center","level":1,"align":"wide","style":{"typography":{"fontSize":"9rem"}}} -->
<h1 class="wp-block-heading alignwide has-text-align-center" style="font-size:9rem"><?php esc_html_e( '404', 'daily-news-blog' ); ?>
</h1>
<!-- /wp:heading -->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"5px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide" style="margin-top:5px"><!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e( 'This page could not be found.', 'daily-news-blog' ); ?>
</p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search...","width":100,"widthUnit":"%","buttonText":"Search","buttonUseIcon":true,"align":"center"} /--></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dspacing\u002d\u002d70)"} -->
<div style="height:var(--wp--preset--spacing--70)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></main>
<!-- /wp:group -->