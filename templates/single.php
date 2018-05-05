<template id="single">
<div>
    <header-component></header-component>
    <div class="container clear">

        <div class="wrapper">
                <div v-if="post[0]">
                <div class="bgg">
<div class="bg-big" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject" v-bind:style="{ backgroundImage: 'url(' + post[0].meta_box.jensan_bgcover + ')' }">
<div class='dbinfo'>
<div class='dbtab'>
<h1 itemprop="name">{{post[0].title.rendered}}
<a class="minjs" :href="'#'" v-on:click='isOpen = !isOpen'><i class="fas fa-caret-left" aria-hidden="true"></i></a></h1>

<div id="alt-title" v-show="isOpen">{{post[0].meta_box.jensan_english}}<span v-if="post[0].meta_box.jensan_synonyms">,&nbsp;</span>{{post[0].meta_box.jensan_synonyms}}<span v-if="post[0].meta_box.jensan_japanese">,&nbsp;</span>{{post[0].meta_box.jensan_japanese}}
</div>


</div>

<div class="genre">
<router-link v-for="(cat, index) in post[0].genre" v-bind:to="{name:'genre', params: { genre: cat.slug, name: cat.name }}">{{cat.name}}</router-link>
</div>

</div>
<div class="overlay"></div>
<a :href="'#'" data-value="'Watch trailer'" class="trailer" v-on:click='isShowing = !isShowing'>
  <svg viewBox="0 0 24 24" class="n-m"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path></svg>
</a>
</div>
<div class="dbcov">
<img :src="post[0].meta_box.jensan_thcover" v-if="post[0].meta_box.jensan_thcover" v-bind:title="post[0].title.rendered" v-bind:alt="post[0].title.rendered">
<div v-else><img :src="'https://www.masterani.me/static/img/placeholder/default_background.jpg'" v-bind:title="post[0].title.rendered" class="img-responsive" v-bind:alt="post[0].title.rendered" width='auto' height='auto' /></div>
<a :href="'#'" v-on:click='isShowing = !isShowing' data-value="'Watch trailer'" class="trailer" >
  <svg viewBox="0 0 24 24" class="n-m"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path></svg>
</a>
</div>
<div class="bottomnav">
    
<div class="l"><span class="typ">
<router-link v-for="(cat, index) in post[0].tipe" v-bind:to="{name:'tipe', params: { tipe: cat.slug, name: cat.name }}">{{cat.name}}</router-link>
</span>
<span class="ssn">
<router-link v-for="(cat, index) in post[0].season" v-bind:to="{name:'season', params: { season: cat.slug, name: cat.name }}">{{cat.name}}</router-link>
</span></div>
        
<div class="r">
<a :href="'https://www.facebook.com/sharer/sharer.php?u='+ post[0].link" target="_blank" class="btn facebook">Facebook</a>
<a :href="'https://twitter.com/share?url=' + post[0].link" target="_blank" class="btn twitter"> Twitter</a>
<a :href="'https://plus.google.com/share?url=' + post[0].link" target="_blank" class="btn google">Google+</a>
</div>
</div>
</div>


<div class="venser">
<div id="lights" v-show="isShowing">
<i class="close" v-on:click='isShowing = !isShowing' aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></i>
 <iframe class="pv" :src="post[0].meta_box.jensan_pv" frameborder="0"></iframe>
</div>
<div class='dbnime'>
<div class='dbsp' v-html="post[0].content.rendered">
</div>
<div class="info2" id="Info">
<h5><span class="fas fa-info-circle"></span> Info</h5><table><tbody>
<tr v-if="post[0].meta_box.jensan_episodes"><td class="tablex">Episode <span>:</span></td><td>{{post[0].meta_box.jensan_episodes}}</td></tr>
<tr v-if="post[0].meta_box.jensan_status"><td class="tablex">Status <span>:</span></td><td>{{post[0].meta_box.jensan_status}}</td></tr>
<tr v-if="post[0].meta_box.jensan_aired"><td class="tablex">Aired / Tayang <span>:</span></td><td>{{post[0].meta_box.jensan_aired}}</td></tr>
<tr v-if="post[0].meta_box.jensan_broadcast"><td class="tablex">Broadcast <span>:</span></td><td>{{post[0].meta_box.jensan_broadcast}}</td></tr>
<tr v-if="post[0].meta_box.jensan_licensors"><td class="tablex">Licensors <span>:</span></td><td>{{post[0].meta_box.jensan_licensors}}</td></tr>
<tr v-if="post[0].meta_box.jensan_studios"><td class="tablex">Studios <span>:</span></td><td>{{post[0].meta_box.jensan_studios}}</td></tr>
<tr v-if="post[0].meta_box.jensan_source"><td class="tablex">Source <span>:</span></td><td>{{post[0].meta_box.jensan_source}}</td></tr>
<tr v-if="post[0].meta_box.jensan_duration"><td class="tablex">Duration <span>:</span></td><td>{{post[0].meta_box.jensan_duration}}</td></tr>
<tr v-if="post[0].meta_box.jensan_rating"><td class="tablex">Rating <span>:</span></td><td>{{post[0].meta_box.jensan_rating}}</td></tr>
<tr v-if="post[0].meta_box.jensan_score"><td class="tablex">Score <span>:</span></td><td>{{post[0].meta_box.jensan_score}}</td></tr>
</tbody></table>

</div>
<div class="download" id="LinkDownload"><h5><span class="fas fa-cloud-download-alt"></span> Download Links</h5>
<?php $link = get_post_meta(get_the_ID(),'jensan_link',true);
$cekMovie = get_post_meta(get_the_ID(),'jensan_movie',true);
foreach($link as $links){
  $namaFinal = '';
  $namaBatch = '';
  if($links['Episode']=='Batch'){
    $namaBatch = 'Batch';
  } else if($links['Episode']!=='Movie'){
    $namaFinal = ' Episode '.$links['Episode'];
  };
  echo '<h4>';the_title(); echo $namaFinal.' Subtitle Indonesia '.$namaBatch.'</h4>';
  echo '<ul>';
  if($links['720p']!==''){
    $i=0;
    echo '<li><strong>720p</strong>';
    $pecah = explode(" ",$links['720p']);
    $var1 = '//';
    $var2 = '.';
    $var3 = 'www.';
    foreach($pecah as $petjah){
      $temp = strpos($petjah, $var3) + strlen($var3);
      if ($temp != ''){
        $temp = strpos($petjah, $var3) + strlen($var3);
      } else {
        $temp = strpos($petjah, $var1) + strlen($var1);
      }
      $result = substr($petjah, $temp, strlen($petjah));
      $dd = strpos($result, $var2);
      if ($dd == 0) {
        $dd = strlen($result);
      }
      $name = substr($result, 0, $dd);
      $name = str_replace('s://', '', $name);
      $name = ucfirst($name);
      $nama[$i] = $name;
      $i++;
    };
    $i=0;
    foreach($pecah as $petjah){
      echo '<a href='.$petjah.' data-wpel-link="external" target="_new" rel="nofollow noopener noreferrer">'.$nama[$i].'</a>';
      $i++;
    }
    echo '</li>';
  }
  if($links['480p']!==''){
    $i=0;
    echo '<li><strong>480p</strong>';
    $pecah = explode(" ",$links['480p']);
    foreach($pecah as $petjah){
      echo '<a href='.$petjah.' data-wpel-link="external" target="_new" rel="nofollow noopener noreferrer">'.$nama[$i].'</a>';
      $i++;
    }
    echo '</li>';
  }
  if($links['360p']!==''){
    $i=0;
    echo '<li><strong>360p</strong>';
    $pecah = explode(" ",$links['360p']);
    foreach($pecah as $petjah){
      echo '<a href='.$petjah.' data-wpel-link="external" target="_new" rel="nofollow noopener noreferrer">'.$nama[$i].'</a>';
      $i++;
    }
    echo '</li>';
  }
  if($links['240p']!==''){
    $i=0;
    echo '<li><strong>240p</strong>';
    $pecah = explode(" ",$links['240p']);
    foreach($pecah as $petjah){
      echo '<a href='.$petjah.' data-wpel-link="external" target="_new" rel="nofollow noopener noreferrer">'.$nama[$i].'</a>';
      $i++;
    }
    echo '</li>';
  }
  echo '</ul>';
};
?>
</div>
<div class="keyword" itemscope itemtype="http://schema.org/CreativeWork">
<h5><span class="fas fa-key"></span> Keyword</h5>
<div class="keying" v-if="post[0].title.rendered">
<span itemprop="keywords">{{post[0].title.rendered}} Sub Indo</span> , 
<span itemprop="keywords">{{post[0].title.rendered}} Batch</span> , 
<span itemprop="keywords">{{post[0].title.rendered}} 480p 720p 360p</span> , 
<span itemprop="keywords">{{post[0].title.rendered}} Mp4 Sub Indo</span> , 
<span itemprop="keywords">{{post[0].title.rendered}} MKV Sub Indo</span> , 
<span itemprop="keywords">{{post[0].title.rendered}} Subtitle Indonesia</span> , 
<span itemprop="keywords">Download Anime {{post[0].title.rendered}} Subtitle Indonesia
</div>
</div>
<?php
$seri = get_the_terms($post->ID, 'series');
$postid = $post->ID;
if($seri[0]->count>1){
?>
<div class='recomx'>
<h5><span class="fas fa-link"></span> Related Series</h5>
<ul class='recomendedanime'>

</ul></div>
<?php } ?>
</div>
<comments v-bind:comments="comments"></comments>
<comment-form></comment-form>
<div style="margin-top:10px;"></div>
</div>
<sidebar></sidebar>
</div><!--end v-if-->
<div v-else>
<nopost></nopost>           
</div>
</div><!--end single-->
</div><!--end container-->
<footer-component></footer-component>
</div>
</template>