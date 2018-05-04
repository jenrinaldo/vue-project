<template id="sidebar">
<div class="col-lg-4 sidebar">
    <div class="sidebar-section">
        <h3>Genres List</h3>
        <ul class="list-group">
        <li v-for="genres in genre" class="list-group-item"><router-link v-bind:to="{name:genres.taxonomy, params: { genre: genres.slug }}" v-html="genres.name"></router-link></li>
</ul>
 </div>
 <div class="sidebar-section">
        <h3>Season List</h3>
        <ul class="list-group">
        <li v-for="seasons in season" class="list-group-item"><router-link v-bind:to="{name:seasons.taxonomy, params: { season: seasons.slug }}" v-html="seasons.name"></router-link></li>
</ul>
 </div>
 <div class="sidebar-section">
        <h3>Type List</h3>
        <ul class="list-group">
        <li v-for="tipes in tipe" class="list-group-item"><router-link v-bind:to="{name:tipes.taxonomy, params: { tipe: tipes.slug }}" v-html="tipes.name"></router-link></li>
</ul>
 </div>
</div><!--end sidebar-->
</template>