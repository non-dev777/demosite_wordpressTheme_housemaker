<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<section class="py-5">
		<div class="container">
			<h2 class="fw-bold mb-4 text-center"><?php the_title(); ?></h2>
			<div class="post-content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>