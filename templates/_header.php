<template id="header">
        <header>      
        <div class="container">
            <div class="container-fluid top-nav">
                <div class="row">
                    <router-link class="logo" to="/">{{this.$root.bloginfo.name}}</router-link>
                <nav class="nav">
                    <router-link class="nav-link" v-bind:to="{path:'/'}" >Home</router-link>
                    <router-link class="nav-link" v-bind:to="{path:'/blog/',name:'blog'}" >Blog</router-link>
                    <router-link class="nav-link" 
                        v-for="(page, key, index) in pages" 
                        v-bind:to="{ name: 'page', params: { slug: page.slug }}"
                        v-bind:key="key">
                            {{page.title.rendered}}
                    </router-link>
                </nav>
                <div class="search"> 
                    <input class="search_box" type="checkbox" id="search_box"> 
                    <label class="icon-search" for="search_box"><i class="fas fa-search"></i></label>
                    <search-form></search-form>
                </div>
                </div>
            </div>     
</div>    
        </header>
</template>