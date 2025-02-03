<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="container">
			<h1 class="fw-bold mb-1"><?php the_title(); ?></h1>
			<div class="small mb-4 text-muted">
				<div class="mt-2">
					<i class="bi bi-calendar"></i> 投稿日: <?php the_time('Y年n月j日'); ?>
					<?php if (get_the_time('Y-m-d') != get_the_modified_time('Y-m-d')) : ?>
						<i class="bi bi-pencil ms-3"></i> 更新日: <?php the_modified_date('Y年n月j日'); ?>
					<?php endif; ?>
				</div>
			</div>
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th class="table-light" style="width: 30%">場所</th>
						<td><?php echo get_field('works-location'); ?></td>
					</tr>
					<tr>
						<th class="table-light" style="width: 30%">間取り</th>
						<td><?php echo get_field('works-plan'); ?></td>
					</tr>
					<tr>
						<th class="table-light" style="width: 30%">完成日</th>
						<td><?php echo get_field('works-complete'); ?></td>
					</tr>
				</tbody>
			</table>
			<div class="post-content">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>