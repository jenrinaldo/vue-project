<template id="footer"><footer>
	<div class="footer">
		<!-- Footer Widget -->
		<!-- Start About -->
		<div class="about">
			<h5>
				<span class="fas fa-question"></span> About 
			</h5>
			<p>
				<?php echo bloginfo('name'); ?> - Sebuah 
				<b>Fanshare</b> tempat download anime gratis subtitle indonesia. Disini kami menyediakan anime dengan format mkv dan mp4. Ada banyak ukuran anime yang dishare disini, yaitu 480p, 720p, 360p, dan kadang kadang 240p.
			</p>
		</div>
		<!-- End About -->
		<div class="footerwidget">
			<h3>
				<span class="fas fa-cog"></span> Recent Anime TV
			</h3>
			<?php $query = new WP_Query( array( 'posts_per_page' => 7,'tax_query' => array ( array ( 'taxonomy' => 'tipe', 'terms' => 'tv', 'field' => 'slug' ) ) ) ); while($query->have_posts()) : $query->the_post(); ?>
			<li>
				<a href="
					<?php the_permalink(); ?>">
					<?php if (( $meta = get_post_meta( get_the_ID(), 'title', true ))) { echo $meta; }else { echo the_title();} ?>
				</a>
			</li>
			<?php endwhile; ?>
		</div>
		<!-- End Footer Widget -->
		<!-- Footer Widget -->
		<div class="footerwidget">
			<h3>
				<span class="fas fa-cog"></span> Recent Anime Movie
			</h3>
			<?php $query = new WP_Query( array( 'posts_per_page' => 7,'tax_query' => array ( array ( 'taxonomy' => 'tipe', 'terms' => 'movie', 'field' => 'slug' ) ) ) ); while($query->have_posts()) : $query->the_post(); ?>
			<li>
				<a href="
					<?php the_permalink(); ?>">
					<?php if (( $meta = get_post_meta( get_the_ID(), 'title', true ))) { echo $meta; }else { echo the_title();} ?>
				</a>
			</li>
			<?php endwhile; ?>
		</div>
		<!-- End Footer Widget -->
		<!-- Footer Widget -->
		<div class="footerwidget">
			<h3>
				<span class="fas fa-cog"></span> Recent Anime OVA
			</h3>
			<?php $query = new WP_Query( array( 'posts_per_page' => 7,'tax_query' => array ( array ( 'taxonomy' => 'tipe', 'terms' => 'ova', 'field' => 'slug' ) ) ) ); while($query->have_posts()) : $query->the_post(); ?>
			<li>
				<a href="
					<?php the_permalink(); ?>">
					<?php if (( $meta = get_post_meta( get_the_ID(), 'title', true ))) { echo $meta; }else { echo the_title();} ?>
				</a>
			</li>
			<?php endwhile; ?>
		</div>
		<!-- End Footer Widget -->
    </div>
    <div class="credit">
	<div class="credit2">Copyright 
		<span class="fas fa-copyright"></span>
		<a href="
			<?php echo home_url('/'); ?>">
			<?php bloginfo('name'); ?>
		</a> - Design Template By 
		<?php bloginfo('name'); ?>
	</div>
</div>
</footer>
</template>
 