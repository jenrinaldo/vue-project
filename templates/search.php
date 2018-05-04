


<template id="search">
<div>
    <header-component></header-component>
    <div class="container clear">

        <div class="row single">
            <div class="col-lg-8">
            <div class="rvads">
                    <h1><span>Search Results</span></h1>
                </div>  
                <the-loop 
                    v-bind:posts="posts" 
                    v-bind:pagers="pagers">
                </the-loop>  
            </div><!--end content-area-->
            <sidebar></sidebar>
        </div><!--end single-->

    </div><!--end container-->
    <footer-component></footer-component>
</div>
</template>