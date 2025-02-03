<?php get_header(); ?>
<section class="position-relative vh-100 overflow-hidden py-4">
	<div class="position-relative h-100">
		<img src="<?php echo get_theme_file_uri('img/header.jpg'); ?>" alt="" class="w-100 h-100 object-fit-cover position-absolute start-50 translate-middle-x" style="min-height: 100vh; min-width: 100vw;">
		<div class="position-absolute top-50 start-50 translate-middle text-center text-white">
			<h2 class="fw-bold mb-3 text-shadow display-4 animate-fade-in" style="font-family: 'Shippori Mincho', serif; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">サンプル工務店</h2>
			<p class="h4 fw-normal text-shadow animate-fade-in" style="min-width: 280px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">あなたの理想に寄り添う</p>
		</div>
	</div>
</section>

<section class="py-5 bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<h2 class="display-4 fw-bold text-center mb-0" style="font-family: 'Montserrat', sans-serif;">MESSAGE</h2>
				<div class="text-center mb-1"><div class="d-inline-block" style="width: 30px; height: 5px; background-color: #212529;"></div></div>
				<p class="text-center text-muted mb-4">メッセージ</p>
			</div>
			<div class="col-lg-8 text-center fw-bold fs-5">
				<p>私たちサンプル工務店は、あなたの理想に寄り添う建築集団です。</p>
				<p>あなたの夢を叶えるために、私たちは全力で取り組んでいます。</p>
				<p>ここにサンプルテキストが入ります。ここにサンプルテキストが入ります。ここにサンプルテキストが入ります。ここにサンプルテキストが入ります。ここにサンプルテキストが入ります。ここにサンプルテキストが入ります。</p>
			</div>
		</div>
	</div>
</section>

<section class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<h2 class="display-4 fw-bold text-center mb-0" style="font-family: 'Montserrat', sans-serif;">NEWS</h2>
				<div class="text-center mb-1"><div class="d-inline-block" style="width: 30px; height: 5px; background-color: #212529;"></div></div>
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

<section class="py-5 bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<h2 class="display-4 fw-bold text-center mb-0" style="font-family: 'Montserrat', sans-serif;">ABOUT US</h2>
				<div class="text-center mb-1"><div class="d-inline-block" style="width: 30px; height: 5px; background-color: #212529;"></div></div>
				<p class="text-center text-muted mb-4">私たちについて</p>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-lg-6 mb-lg-0 mb-4">
				<img src="<?php echo get_theme_file_uri('img/top/aboutus1.jpg'); ?>" alt="About Us" class="w-100 h-100 object-fit-cover rounded shadow">
			</div>
			<div class="col-lg-6 mb-lg-0">
				<div class="ps-lg-4">
					<h3 class="h2 fw-bold mb-3 border-start border-4 border-dark ps-3">要望が第一</h3>
					<p class="lead text-muted">
						お客様の要望を第一に、お客様の理想に寄り添う建築を提案します。<br>
						サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>
						サンプルテキストサンプルテキストサンプルテキスト
					</p>
				</div>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-lg-6 order-lg-2 mb-lg-0 mb-4">
				<img src="<?php echo get_theme_file_uri('img/top/aboutus2.jpg'); ?>" alt="About Us" class="w-100 h-100 object-fit-cover rounded shadow">
			</div>
			<div class="col-lg-6 order-lg-1 mb-lg-0">
				<div class="pe-lg-4">
					<h3 class="h2 fw-bold mb-3 border-start border-4 border-dark ps-3">ご納得いただける施工</h3>
					<p class="lead text-muted">
						何度も打ち合わせを重ね、ご納得いただける施工を行います。<br>
						サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>
						サンプルテキストサンプルテキストサンプルテキスト
					</p>
				</div>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-lg-6 mb-lg-0 mb-4">
				<img src="<?php echo get_theme_file_uri('img/top/aboutus3.jpg'); ?>" alt="About Us" class="w-100 h-100 object-fit-cover rounded shadow">
			</div>
			<div class="col-lg-6 mb-lg-0">
				<div class="ps-lg-4">
					<h3 class="h2 fw-bold mb-3 border-start border-4 border-dark ps-3">安全な施工を徹底</h3>
					<p class="lead text-muted">
						施工時には安全を徹底し、お客様に安心を届けます。<br>
						サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>
						サンプルテキストサンプルテキストサンプルテキスト
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="position-relative py-5">
	<div class="position-absolute w-100 h-100" style="top: 0; left: 0; z-index: 0;">
		<div class="position-absolute w-100 h-100" style="background: rgba(255, 255, 255, 0.6); z-index: 1;"></div>
		<img src="<?php echo get_theme_file_uri('img/top/concept.jpg'); ?>" alt="" class="w-100 h-100 object-fit-cover">
	</div>
	<div class="container position-relative" style="z-index: 2;">
		<div class="row justify-content-center text-center py-5">
			<div class="col-lg-8">
				<a href="<?php echo home_url('/concept'); ?>" class="btn btn-outline-dark btn-lg px-5">私たちの想い</a>
			</div>
		</div>
	</div>
</section>


<section class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<h2 class="display-4 fw-bold text-center mb-0" style="font-family: 'Montserrat', sans-serif;">WORKS</h2>
				<div class="text-center mb-1"><div class="d-inline-block" style="width: 30px; height: 5px; background-color: #212529;"></div></div>
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