<template id="the-loop">
  <div><!--div wrapper-->
    <div v-if="posts.length > 0">
    <!--loop starts here-->
    <ul class="the-loop">
      <li v-for="post in posts">
          <div class="title">
              <router-link v-bind:to="{ name: 'post', params: { slug: post.slug }}">
                  {{post.title.rendered}}
              </router>
          </div>  
          <div class="meta"> Type : 
            <ul id="example-1">
              <li  v-for="(cat, index) in post.cats">
              <router-link v-bind:to="{name:'tipe', params: { tipe: cat.slug }}">{{cat.name}}<span v-if="index < post.cats.length - 1">,&nbsp;</span></router-link>
              </li>
            </ul>
            </div>
            <div class="meta">     
            Categories : 
            <ul id="example-1">
              <li  v-for="(cat, index) in post.gen">
              <router-link v-bind:to="{name:'genre', params: { genre: cat.slug }}">{{cat.name}}<span v-if="index < post.gen.length - 1">,&nbsp;</span></router-link>
              </li>
            </ul>
            </div>
          <div class="excerpt" v-html="post.excerpt.rendered"></div>
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
  </div><!--end div wrapper-->

</template>