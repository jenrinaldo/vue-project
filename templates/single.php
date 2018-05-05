<template id="single">
<div>
    <header-component></header-component>
    <div class="container clear">

        <div class="wrapper">
                <div v-if="post[0]">
                <div class="bgg">
<?php  
$season = get_the_term_list($post->ID, 'season', '', ', ', '');
$episodes = get_post_meta( get_the_ID(), 'jensan-episodes', true );
$status = get_post_meta( get_the_ID(), 'jensan-status', true );
$duration = get_post_meta( get_the_ID(), 'jensan-duration', true );
$score = get_post_meta( get_the_ID(), 'jensan-score', true );
$aired = get_post_meta( get_the_ID(), 'jensan-aired', true );
$studios = get_post_meta( get_the_ID(), 'jensan-studios', true );
$producers = get_post_meta( get_the_ID(), 'jensan-producers', true );
$licensors = get_post_meta( get_the_ID(), 'jensan-licensors', true );
$broadcast = get_post_meta( get_the_ID(), 'jensan-broadcast', true );
$source = get_post_meta( get_the_ID(), 'jensan-soruce', true );
$rating = get_post_meta( get_the_ID(), 'jensan-rating', true );
$video = get_post_meta(get_the_ID(),'jensan-pv',true);
$rep = '&autoplay=1';
$video = str_replace($rep,'',$video);
?>

<div class="bg-big" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
<div class='dbinfo'>
<div class='dbtab'>
<h1 itemprop="name">{{post[0].title.rendered}}<a class="minjs" href="#" onclick="toggle_visibility('alt-title');"><i class="fas fa-caret-left" aria-hidden="true"></i></a></h1>

<div id="alt-title">
			    <?php $english = get_post_meta( get_the_ID(), 'jensan-english', true ); if($english!==""){ echo $english." , ";}; ?>
			    <?php $synonim = get_post_meta( get_the_ID(), 'jensan-synonyms', true ); if($synonim!==""){ echo $synonim." , ";}; ?>
			    <?php $japan = get_post_meta( get_the_ID(), 'jensan-japanese', true ); if($japan!==""){ echo $japan;}; ?>
</div>


</div>

<div class="genre">
<router-link v-for="(cat, index) in post[0].genres" v-bind:to="{name:'genre', params: { genre: cat.slug, name: cat.name }}">{{cat.name}}<span v-if="index < post[0].genres.length - 1">,&nbsp;</span></router-link>
</div>

</div>
<div class="overlay"></div>
<a href="#" data-value="'Watch trailer'" class="trailer" >
  <svg viewBox="0 0 24 24" class="n-m"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path></svg>
</a>
</div>
<div class="dbcov">
<img :src="post[0].meta_box.thcover" v-if="post[0].meta_box.thcover">
<div v-else><img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" class="img-responsive" alt=" "width='350' height='180' /></div>
<a href="#" data-value="'Watch trailer'" class="trailer" >
  <svg viewBox="0 0 24 24" class="n-m"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path></svg>
</a>
</div>
<div class="bottomnav">
    
<div class="l"><span class="typ">
<router-link v-for="(cat, index) in post[0].tipes" v-bind:to="{name:'tipe', params: { tipe: cat.slug, name: cat.name }}">{{cat.name}}<span v-if="index < post[0].tipes.length - 1">,&nbsp;</span></router-link>
</span>
<span class="ssn">
        <?php echo $season;?></span></div>
        
<div class="r">
<a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="btn facebook">Facebook</a>
<a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" class="btn twitter"> Twitter</a>
<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" class="btn google">Google+</a>
</div>
</div>
</div>
                    <h1 class="post-title">{{post[0].title.rendered}}</h1>
                    <div class="content" v-html="post[0].content.rendered"></div>
                    <comments v-bind:comments="comments"></comments>
                    <comment-form></comment-form>
                </div><!--end v-if-->
                <div v-else>
                    <nopost></nopost>           
                </div>
            <sidebar></sidebar>
        </div><!--end single-->

    </div><!--end container-->
    <footer-component></footer-component>
</div>
</template>