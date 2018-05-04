<template id="home">

<div class="home">
    <header-component></header-component>   
    <div class="container clear">

    <div class="wrapper">
        <div class="menu-wrap">
    <div class="rseries">
        <div class="rvads">
            <h1><span>Latest Update</span><span><a href="/anime-list/">View More</a></span></h1>
        </div>
        <div itemtype="//schema.org/Blog">
                <the-loop v-bind:posts="posts" v-bind:pagers="pagers"></the-loop>     
        </div>
    </div>
</div>
        <sidebar></sidebar>
    </div>


</div>
<footer-component></footer-component>
<div>


</template>   