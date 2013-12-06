<?php
/**
 * @package WordPress
 * @subpackage designosource-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
 <div id="back">
	<a href="/" title="Terug naar designosource">
		<i class="red-arrow unit whole" style="transform: rotate(90deg);-webkit-transform: rotate(90deg);"></i>
		<p>designosource</p>
	</a>
 </div>
 </div>
<div id="stats" class="timeliner">
	<?php
	$args = array( 'post_type' => 'statistiek', 'posts_per_page' => -1);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		?>
		<li title="<?php echo the_title(); ?>" class="statistiek">
			<p><?php echo the_title() . ' : ' . get_field("waarde"); ?></p>
		</li>
		<?php
	endwhile;

?>
</div>
<div id="designoverse-wrap">
<div id="columns">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

			<h5><?php posted_on(); ?></h5>
			<?php the_post_thumbnail(); ?>
			<?php the_excerpt(); ?>
			<?php
				switch(get_post_format())
				{
					case 'video':
						echo '<p>' . get_field("embed_code") . '</p>';
						break;
				}

			?>

			<a class="leesmeer" href="<?php the_permalink() ?>">Lees meer</a>
			<?php /*
			<footer class="postmetadata" class="grid whole">
				<?php the_tags(__('Tags: ','designosource'), ', ', '<br />'); ?>
				<?php _e('Posted in','designosource'); ?> <?php the_category(', ') ?> |
				<?php comments_popup_link(__('No Comments &#187;','designosource'), __('1 Comment &#187;','designosource'), __('% Comments &#187;','designosource')); ?>
			</footer>
			*/ ?>

		</article>

		<?php wp_link_pages(array('before' => __('Pages: '), 'next_or_number' => 'number')); ?>
	<?php endwhile; ?>

	<?php post_navigation(); ?>

	<?php else : ?>

		<h2><?php _e('Nothing Found','designosource'); ?></h2>

	<?php endif; ?>
</div>
</div>
<div>
<?php get_footer(); ?>
