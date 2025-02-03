	</main>
	<footer class="footer py-4 bg-dark text-white">
		<div class="container">
			<div class="row justify-content-center mb-4">
				<div class="col-md-6">
					<!--ロゴエリア  -->
					<div class="text-center">
						<img src="<?php echo get_theme_file_uri('img/logo.svg'); ?>" alt="" class="img-fluid" style="max-height: 50px;">
					</div>
				</div>
				<div class="col-md-6">
					<!-- メニューエリア -->
					<div class="text-center">
						<div class="row">
							<div class="col-6">
								<ul class="list-unstyled mb-md-0 mb-4">
									<li class="mb-2"><a href="<?php echo home_url(); ?>" class="text-white text-decoration-none hover-underline hover-underline-white">ホーム</a></li>
									<li class="mb-2"><a href="<?php echo home_url(); ?>/company" class="text-white text-decoration-none hover-underline hover-underline-white">会社概要</a></li>
									<li class="mb-2"><a href="<?php echo home_url(); ?>/service" class="text-white text-decoration-none hover-underline hover-underline-white">サービス</a></li>
								</ul>
							</div>
							<div class="col-6">
								<ul class="list-unstyled mb-0">
									<li class="mb-2"><a href="<?php echo home_url(); ?>/works" class="text-white text-decoration-none hover-underline hover-underline-white">施工事例</a></li>
									<li class="mb-2"><a href="<?php echo home_url(); ?>/post" class="text-white text-decoration-none hover-underline hover-underline-white">お知らせ</a></li>
									<li class="mb-2"><a href="<?php echo home_url(); ?>/contact" class="text-white text-decoration-none hover-underline hover-underline-white">お問い合わせ</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<p class="footer-copy m-0 text-center">Copyright © 2025 サンプル工務店</p>
		</div>
		<div>
			<p class="text-center border-top pt-3">
				このサイトはWordPressで作成したデモサイトです。Webサイト制作やシステム開発にお困りごとがございましたら、お気軽にお問い合わせください。<br>
				お仕事のご依頼は<a href="https://official-non.com/contact">運営ブログのお問い合わせ</a>より受け付けております。
			</p>
		</div>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<?php wp_footer(); ?>
</body>
</html>