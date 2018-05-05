<template id="footer"><footer>
	<div class="footer">
		<!-- Footer Widget -->
		<!-- Start About -->
		<div class="about">
			<h5>
				<span class="fas fa-question"></span> About 
			</h5>
			<p>
				<router-link to="/">{{this.$root.bloginfo.name}}</router-link> - Sebuah 
				<b>Fanshare</b> tempat download anime gratis subtitle indonesia. Disini kami menyediakan anime dengan format mkv dan mp4. Ada banyak ukuran anime yang dishare disini, yaitu 480p, 720p, 360p, dan kadang kadang 240p.
			</p>
		</div>
		<!-- End About -->
		<div class="footerwidget">
			<h3>
				<span class="fas fa-cog"></span> Recent Anime TV
			</h3>
			<li v-for="tvs in tv">
            <router-link v-bind:to="{ name: 'post', params: { slug: tvs.slug }}" v-html="tvs.title.rendered"></router>
			</li>
		</div>
		<!-- End Footer Widget -->
		<!-- Footer Widget -->
		<div class="footerwidget">
			<h3>
				<span class="fas fa-cog"></span> Recent Anime Movie
			</h3>
            <li v-for="movies in movie">
            <router-link v-bind:to="{ name: 'post', params: { slug: movies.slug }}" v-html="movies.title.rendered"></router>
			</li>
		</div>
		<!-- End Footer Widget -->
		<!-- Footer Widget -->
		<div class="footerwidget">
			<h3>
				<span class="fas fa-cog"></span> Recent Anime OVA
			</h3>
            <li v-for="ovas in ova">
            <router-link v-bind:to="{ name: 'post', params: { slug: ovas.slug }}" v-html="ovas.title.rendered"></router>
			</li>
		</div>
		<!-- End Footer Widget -->
    </div>
    <div class="credit">
	<div class="credit2">Copyright 
		<span class="fas fa-copyright"></span>
		<router-link to="/">{{this.$root.bloginfo.name}}</router-link> - Design Template By 
		<router-link to="/">{{this.$root.bloginfo.name}}</router-link>
	</div>
</div>
</footer>
</template>
 