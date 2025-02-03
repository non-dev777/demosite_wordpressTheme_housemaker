<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="サイトディスクリプションが入ります。">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Shippori+Mincho:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
	<?php wp_body_open(); ?>
	<header class="py-3 bg-dark text-white shadow-sm fixed-top">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark">
				<h1 class="navbar-brand m-0">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_theme_file_uri('img/logo.svg'); ?>" alt="" class="img-fluid" style="max-height: 50px;">
					</a>
				</h1>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
					<ul class="navbar-nav gap-lg-4">
						<li class="nav-item">
							<a href="<?php echo home_url(); ?>" class="nav-link text-white hover-underline hover-underline-white">ホーム</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo home_url(); ?>/company" class="nav-link text-white hover-underline hover-underline-white">会社概要</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo home_url(); ?>/post" class="nav-link text-white hover-underline hover-underline-white">お知らせ</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo home_url(); ?>/service" class="nav-link text-white hover-underline hover-underline-white">サービス</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo home_url(); ?>/works" class="nav-link text-white hover-underline hover-underline-white">施工事例</a>
						</li>
						<li class="nav-item d-md-block d-none">
							<a href="<?php echo home_url(); ?>/contact" class="btn btn-light px-4">お問い合わせ</a>
						</li>
						<li class="nav-item d-md-none">
							<a href="<?php echo home_url(); ?>/contact" class="nav-link text-white hover-underline hover-underline-white">お問い合わせ</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<main>
		<?php if (!is_front_page()) : ?>
		<section class="position-relative pt-4">
			<div class="header-image-container">
				<?php if (has_post_thumbnail() && !is_home() && !is_archive()) : ?>
					<?php the_post_thumbnail('full', array('class' => 'w-100 object-fit-cover', 'style' => 'height: 300px;')); ?>
				<?php else : ?>
					<img src="<?php echo get_theme_file_uri('img/header.jpg'); ?>" alt="" class="w-100 object-fit-cover" style="height: 300px;">
				<?php endif; ?>
				<div class="title-container">
					<h1 class="text-white fw-bold display-4 page-title animate-fade-in">
						<span>
						<?php
						if (is_singular('post')) {
							echo get_the_category()[0]->name;
						} elseif (is_home()) {
							echo '投稿一覧';
						} elseif (is_singular('works')) {
							echo '施工事例';
						} elseif (is_archive()) {
							if (is_post_type_archive('works')) {
								echo '施工事例';
							} elseif (is_category()) {
								single_cat_title();
							} else {
								echo get_post_type_object(get_post_type())->label;
							}
						} elseif (is_404()) {
							echo 'ページが見つかりませんでした';
						} else {
							the_title();
						}
						?>
						</span>
					</h1>
				</div>
			</div>
		</section>
		<?php endif; ?>