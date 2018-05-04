<template id="sidebar">
<div id="sidebar">
  <div class="section">
    <div class="area">
        <h3><span>Genre List</span><span style="float: right;"><i class="flaticon-prize-badge-with-star-and-ribbon"></i></span></h3>
        <div class="seasonswidget">
            <ul>
            <li v-for="genres in genre" ><router-link v-bind:to="{name:genres.taxonomy, params: { genre: genres.slug, name: genres.name }}" v-html="genres.name"></router-link></li>
            </ul>
        </div>
    </div>
</div>
<div class="section">
    <div class="area">
        <h3><span>Season</span><span style="float: right;"><i class="flaticon-prize-badge-with-star-and-ribbon"></i></span></h3>
        <div class="seasonswidget">
            <ul>
                <li v-for="seasons in season">
                    <router-link v-bind:to="{name:seasons.taxonomy, params: { season: seasons.slug , name: seasons.name }}" v-html="seasons.name"></router-link>
            </li>
            </ul>
        </div>
    </div>
</div>
 <div class="section">
    <div class="area">
        <h3><span>Type List</span><span style="float: right;"><i class="flaticon-prize-badge-with-star-and-ribbon"></i></span></h3>
        <div class="seasonswidget">
            <ul>
            <li v-for="tipes in tipe" ><router-link v-bind:to="{name:tipes.taxonomy, params: { tipe: tipes.slug, name: tipes.name }}" v-html="tipes.name"></router-link></li>
            </ul>
        </div>
    </div>
</div>
</div><!--end sidebar-->
</template>