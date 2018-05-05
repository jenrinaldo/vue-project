<?php
/*
Template Name: Anime List
*/

?>
<div class="venser">
	<div class='jdlr'>
		<h1>
			<?php the_title(); ?>
		</div>
		<div class="rapi">
			<div class="venz">
				<div class="navlist">
					<a v-tooltip.top ="'All'" href="#All" data-id='all'>All</a>
					<a href="#." data-id='.'>#</a>
					<a href="#?" data-id='?'>?</a>
					<a href="#A" data-id='A'>A</a>
					<a href="#B" data-id='B'>B</a>
					<a href="#C" data-id='C'>C</a>
					<a href="#D" data-id='D'>D</a>
					<a href="#E" data-id='E'>E</a>
					<a href="#F" data-id='F'>F</a>
					<a href="#G" data-id='G'>G</a>
					<a href="#H" data-id='H'>H</a>
					<a href="#I" data-id='I'>I</a>
					<a href="#J" data-id='J'>J</a>
					<a href="#K" data-id='K'>K</a>
					<a href="#L" data-id='L'>L</a>
					<a href="#M" data-id='M'>M</a>
					<a href="#N" data-id='N'>N</a>
					<a href="#O" data-id='O'>O</a>
					<a href="#P" data-id='P'>P</a>
					<a href="#Q" data-id='Q'>Q</a>
					<a href="#R" data-id='R'>R</a>
					<a href="#S" data-id='S'>S</a>
					<a href="#T" data-id='T'>T</a>
					<a href="#U" data-id='U'>U</a>
					<a href="#V" data-id='V'>V</a>
					<a href="#W" data-id='W'>W</a>
					<a href="#X" data-id='X'>X</a>
					<a href="#Y" data-id='Y'>Y</a>
					<a href="#Z" data-id='Z'>Z</a>
					<br>
					<a href="#0" data-id='0'>0</a>
					<a href="#1" data-id='1'>1</a>
					<a href="#2" data-id='2'>2</a>
					<a href="#3" data-id='3'>3</a>
					<a href="#4" data-id='4'>4</a>
					<a href="#5" data-id='5'>5</a>
					<a href="#6" data-id='6'>6</a>
					<a href="#7" data-id='7'>7</a>
					<a href="#8" data-id='8'>8</a>
					<a href="#9" data-id='9'>9</a>
				</div>
				<div class="navlist2">
					<span>View By : </span>
					<a v-tooltip ="'Season'" href="#Season" data-id='Season'>Season</a>
					<a v-tooltip ="'Genre'" href="#Genre" data-id='Genre'>Genre</a>
					<div class="clear"></div>
				</div>
				<div class="warnalist">
					<h4>Penjelasan Warna</h4>
					<ul>
						<li v-tooltip ="'TV'" class="initv">TV</li>
						<li v-tooltip ="'OVA'"class="iniova">OVA</li>
						<li v-tooltip ="'Special'"class="inispecial">Special</li>
						<li v-tooltip ="'Movie'"class="inimovie">Movie</li>
						<li v-tooltip ="'TV + OVA'"class="initvova">TV + OVA</li>
						<li v-tooltip ="'TV + Special'"class="initvspecial">TV + Special</li>
					</ul>
				</div>
				<div class="seasonss">
					<ul>
						<?php 
$i = 0;
$taxonomy = 'season';
$tax_terms = get_terms($taxonomy);
$i++;
foreach ($tax_terms as $tax_term) {
echo '
						<li>' . '														
							<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" data-id="season" title="' . sprintf( __( "View all seri in season %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name . '</a>
						</li>';
}
?>
					</ul>
				</div>
				<div class="genres">
					<ul>
						<?php 
$i = 0;
$taxonomy = 'genre';
$tax_terms = get_terms($taxonomy);
$i++;
foreach ($tax_terms as $tax_term) {
echo '															
						<li>' . '																	
							<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" data-id="genre"  title="' . sprintf( __( "View all seri in genre %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name . '</a>
						</li>';
}
?>
					</ul>
				</div>
				<div class = "content">
					<form class = "post-list">
						<input type = "hidden" value = "" />
					</form>
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<article class="entry-content clear">
							<?php the_content(); ?>
						</article>
					</article>
					<?php endwhile; ?>
					<div class = "animelist_page_loading">
						<div class = "animelist_container">
							<div class="animelist_content"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>


