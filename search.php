<?php
/**
 * Search Results Template
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Scaffolding
 */

get_header(); ?>

	<div itemscope itemtype="http://schema.org/SearchResultsPage">
		
		<?php if ( have_posts() ) : ?>

			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'scaffolding' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

					<header class="entry-header">

						<h2 class="entry-title search-title h3"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

						<?php if ( "post" == get_post_type() ) : ?>

							<p class="entry-meta"><?php printf( __( 'Posted <time class="updated" datetime="%1$s">%2$s</time> by <span class="author">%3$s</span> <span class="amp">&amp;</span> filed under %4$s.', 'scaffolding' ), get_the_time( 'Y-m-d' ), get_the_time( get_option( 'date_format' ) ), scaffolding_get_the_author_posts_link(), get_the_category_list( ', ' ) ); ?></p>

						<?php endif; ?>

					</header>

					<div class="entry-content" itemprop="description">

						<?php the_excerpt(); ?>

					</div>

				</article>

			<?php endwhile; ?>

			<?php get_template_part( 'template-parts/pager' ); // WordPress template pager/pagination ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/error' ); // WordPress template error message ?>

		<?php endif; ?>

	</div>

<?php get_footer();