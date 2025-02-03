<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="container">
			<h1 class="fw-bold mb-1"><?php the_title(); ?></h1>
			<div class="small mb-4 text-muted">
				<?php if (is_singular('post')) : ?>
					<!-- パンくず -->
					<div>
						<i class="bi bi-house-door"></i>
						<a href="<?php echo home_url(); ?>" class="text-decoration-none text-muted">ホーム</a>
						<i class="bi bi-chevron-right"></i>
						<?php
						$categories = get_the_category();
						if ($categories) :
							$category = $categories[0];
						?>
							<a href="<?php echo get_category_link($category->term_id); ?>" class="text-decoration-none text-muted"><?php echo $category->name; ?></a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<div class="mt-2">
					<i class="bi bi-calendar"></i> 投稿日: <?php the_time('Y年n月j日'); ?>
					<?php if (get_the_time('Y-m-d') != get_the_modified_time('Y-m-d')) : ?>
						<i class="bi bi-pencil ms-3"></i> 更新日: <?php the_modified_date('Y年n月j日'); ?>
					<?php endif; ?>
				</div>
			</div>
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>