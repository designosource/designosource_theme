<?php
/**
 * @package WordPress
 * @subpackage designosource-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
 <div id="back">
	<a href="/designoverse" title="Terug naar designosource">
		<i class="red-arrow unit whole" style="transform: rotate(90deg);-webkit-transform: rotate(90deg);left: -61px;"></i>
		<p>designoverse</p>
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
<div id="designoverse-wrap" class="designoverse-post">
<div id="column">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			<h5><?php posted_on(); ?></h5>

			<div class="entry-content">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => __('Pages: '), 'next_or_number' => 'number')); ?>

				<?php the_tags( __('Tags: '), ', ', ''); ?>

			</div>

			<?php edit_post_link(__('Edit this entry'),'','.'); ?>

		</article>

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>

<?php post_navigation(); ?>

</div>
</div>
<div>

<?php get_footer(); ?>
