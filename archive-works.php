<?php get_header(); ?>

<?php // archive-works.php?>
<section class="py-5 bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<h2 class="fw-bold mb-4 text-center">施工事例</h2>
			</div>
		</div>
		<?php if (have_posts()) : ?>
			<div class="row g-4">
				<?php while (have_posts()) : the_post(); ?>
					<div class="col-lg-4 col-md-6">
						<a href="<?php the_permalink(); ?>" class="text-decoration-none">
							<div class="card h-100 border-0 shadow-sm hover-shadow transition">
								<div class="card-img-wrapper" style="height: 240px;">
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('large', array('class' => 'card-img-top w-100 h-100 object-fit-cover')); ?>
									<?php else : ?>
										<img src="<?php echo get_theme_file_uri('img/noimg.jpg'); ?>" alt="No Image" class="card-img-top w-100 h-100 object-fit-cover">
									<?php endif; ?>
								</div>
								<div class="card-body p-4 bg-dark text-white">
									<?php if(get_field('works-complete')): ?>
										<p class="border-bottom pb-2 mb-3">完成日：<?php echo get_field('works-complete'); ?></p>
									<?php endif; ?>
									<h3 class="h5 mb-0"><?php the_title(); ?></h3>
								</div>
							</div>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination(array(
				'prev_text' => '前へ',
				'next_text' => '次へ',
				'class' => 'mt-4'
			)); ?>
		<?php else : ?>
			<div class="text-center text-muted">
				<p>施工事例がまだ公開されていません</p>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>