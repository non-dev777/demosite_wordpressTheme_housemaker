<?php get_header(); ?>
<section class="position-relative vh-100 overflow-hidden py-4">
	<div class="position-relative h-100">
		<img src="<?php echo get_theme_file_uri('img/header.jpg'); ?>" alt="" class="w-100 h-100 object-fit-cover position-absolute start-50 translate-middle-x" style="min-height: 100vh; min-width: 100vw;">
		<div class="position-absolute top-50 start-50 translate-middle text-center text-white">
			<h2 class="fw-bold mb-3 text-shadow display-4" style="font-family: 'Shippori Mincho', serif;">サンプル工務店</h2>
			<p class="h4 fw-normal text-shadow" style="min-width: 280px;">あなたの理想に寄り添う</p>
		</div>
	</div>
</section>

<section class="py-5 bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<h2 class="display-4 fw-bold mb-2 text-center" style="font-family: 'Montserrat', sans-serif;">NEWS</h2>
				<p class="text-center text-muted mb-4">お知らせ</p>
				<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 5
				);
				$query = new WP_Query($args);
				?>
				<?php if ($query->have_posts()) : ?>
					<div class="list-group shadow-sm">
						<?php while ($query->have_posts()) : $query->the_post(); ?>
							<a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action">
								<div class="d-flex justify-content-between align-items-center">
									<div>
										<div class="d-flex align-items-center gap-2 mb-2">
											<small class="text-muted"><?php echo get_the_date(); ?></small>
											<?php
											$categories = get_the_category();
											if($categories) {
												foreach($categories as $category) {
													$class = $category->slug;
													echo '<span class="category-label ' . $class . '">' . $category->name . '</span>';
												}
											}
											?>
										</div>
										<h6 class="mb-0"><?php the_title(); ?></h6>
									</div>
									<i class="bi bi-chevron-right"></i>
								</div>
							</a>
						<?php endwhile; ?>
					</div>
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<div class="text-center text-muted">
						<p>記事がありません</p>
					</div>
				<?php endif; ?>
				<div class="text-center mt-4">
					<a href="<?php echo home_url('/post'); ?>" class="btn btn-outline-dark">一覧をみる</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<h2 class="display-4 fw-bold mb-2 text-center" style="font-family: 'Montserrat', sans-serif;">WORKS</h2>
				<p class="text-center text-muted mb-4">施工事例</p>
			</div>
			<?php 
			$args = array(
					'post_type' => 'works',
					'posts_per_page' => 3
			);
			$query = new WP_Query($args); 
			?>
			<?php if ($query->have_posts()) : ?>
				<div class="row g-4">
					<?php while ($query->have_posts()) : $query->the_post(); ?>
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
				<div class="text-center mt-4">
					<a href="<?php echo home_url('/works'); ?>" class="btn btn-outline-dark">一覧をみる</a>
				</div>
			<?php else : ?>
				<div class="text-center text-muted">
					<p>施工事例がまだ登録されていません。</p>
				</div>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>