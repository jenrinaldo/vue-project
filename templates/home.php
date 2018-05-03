<template id="home">

<div class="home">
    <header-component></header-component>   
    
    <div class="container">

    <div class="row">
        <div class="col-lg-8">
            <h5 class="latest-title">Latest from the <router-link v-bind:to="{path:'/blog/',name:'blog'}" >Blog</router-link></h5> 
            <the-loop v-bind:posts="posts" v-bind:pagers="pagers"></the-loop>      
        </div>
        <sidebar></sidebar>
    </div>


</div>
<footer-component></footer-component>
<div>


</template>   