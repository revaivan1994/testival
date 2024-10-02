<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package testival
 */

?>


<a href="<?php the_permalink() ?>" class="blog-item w-inline-block">
	<div class="blog-image-wrap">
		<?php echo get_the_post_thumbnail(get_the_ID(), 'post-front') ?>
	</div>
	<div class="blog-content">
		<h3 class="heading-h2"><?php echo esc_html_e(the_title(), 'testival'); ?></h3>
		<div class="paragraph-detials-medium"><?php esc_html_e(the_excerpt(), 'testival'); ?></div>
		<div class="tags-block">
			<?php
			$post_id = get_the_ID();
			$post_tags = get_the_tags($post_id);
			if ($post_tags) {
				foreach ($post_tags as $post_tag) {
					echo '<section class="categories-pill"><div class="title-small pink">' . $post_tag->name . '</div></section>';
				}
			}
			?>
		</div>
	</div>
</a>
