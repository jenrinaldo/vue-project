<template id="the-loop">
    <div v-if="posts.length > 0">
    <!--loop starts here-->
    <ul class="the-loop">
      <li v-for="post in posts" class="list">
      <div class="grid-thumb">
        <router-link v-bind:to="{ name: 'post', params: { slug: post.slug }}">
        <div class="grid-thumbz">
            <div class="darken"></div>
            <img v-if="post._embedded['wp:featuredmedia'][0].source_url " :src="post._embedded['wp:featuredmedia'][0].source_url">
            <div v-else><img :src="'http://127.0.0.1/wp-content/uploads/2018/04/bg-footer.png'"></div>
            <svg viewBox="0 0 24 24"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path></svg>
        </div>
        </router>
        </div>
        <div class="text">
          <router-link class="judul" v-bind:to="{ name: 'post', params: { slug: post.slug }}">
            <h2 class='grid-tl' v-html="post.title.rendered"> </h2>
          </router>
        </div>
        <div class="info">
          <ul>
            <li><span class="fas fa-calendar-alt"></span> Date : 	{{ Date(post.date_gmt)}}</li>
            <li><span class="fas fa-comments"></span> Comment  : 	
	    		
          <?php comments_number( __( '0', 'blank' ), __( '1', 'blank' ), __( '%', 'blank' ), 'comments-link', __('-', 'blank')); ?></li>
            <li class="category" ><span class="fas fa-tags"></span> Category : 
              <router-link v-for="(cat, index) in post.genre" v-bind:to="{name:'genre', params: { genre: cat.slug, name: cat.name }}">{{cat.name}}<span v-if="index < post.genre.length - 1">,&nbsp;</span></router-link>
            </li>
		    <li class="status" >
				    <span class="fas fa-info-circle"></span> Status : {{post.meta_box.jensan_status}}	
		    </li>
		    <li class="series" v-if="post.series">
				    <span class="fas fa-th-list"></span> Series : 	 
            <router-link v-for="(cat, index) in post.series" v-bind:to="{name:'series', params: { series: cat.slug, name: cat.name }}">{{cat.name}}<span v-if="index < post.series.length - 1">,&nbsp;</span></router-link>
		    </li>
        <li class="statusBD" v-if="post.meta_box.jensan_bd == 1"><span>BD</span></li>
        </ul>
    </div>
      </li>
    </ul>
    <!--the loop ends-->
    <!--paging starts here-->
    <ul v-if="pagers.length > 1" class="pagination">   
      <li v-for="(pager,index) in pagers" class="page-item">    
        <router-link class="page-link" 
          v-bind:to="{path:$route.fullPath, query: {page : pager}}">
          {{pager}}
        </router-link>
      </li>    
    </ul>
    <!--paging ends-->
    </div><!--end v-if-->
    <div v-else>
      <nopost></nopost>
    </div>

</template>