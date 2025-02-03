<?php get_header(); ?>

<section class="py-5 bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<h2 class="display-4 fw-bold text-center mb-0" style="font-family: 'Montserrat', sans-serif;">NEWS</h2>
				<div class="text-center mb-1"><div class="d-inline-block" style="width: 30px; height: 5px; background-color: #212529;"></div></div>
				<p class="text-center text-muted mb-4">お知らせ</p>
                
                <div class="category-nav text-center">
                    <a href="<?php echo home_url('/post'); ?>" class="btn btn-dark">すべて</a>
                    <a href="<?php echo get_category_link(get_category_by_slug('event')->term_id); ?>" class="btn btn-outline-dark">イベント</a>
                    <a href="<?php echo get_category_link(get_category_by_slug('news')->term_id); ?>" class="btn btn-outline-dark">お知らせ</a>
                    <a href="<?php echo get_category_link(get_category_by_slug('other')->term_id); ?>" class="btn btn-outline-dark">その他</a>
                </div>

				<?php if (have_posts()) : ?>
					<div class="list-group shadow-sm">
						<?php while (have_posts()) : the_post(); ?>
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
					<?php the_posts_pagination(array(
						'prev_text' => '前へ',
						'next_text' => '次へ',
						'mid_size' => 1,
						'class' => 'mt-4'
					)); ?>
				<?php else : ?>
					<div class="text-center text-muted">
						<p>記事がありません</p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
