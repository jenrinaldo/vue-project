<template id="archive"> 
<div>
    <header-component></header-component>
    <div class="container clear">
    
    
    <div class="row">       
        <div class="col-lg-8">
        <div class="rvads">
                    <h1><span>{{$route.params['name']}}</span></h1>
                </div>  
            <the-loop 
                v-bind:posts="posts" 
                v-bind:pagers="pagers">
            </the-loop>  
        </div>
        <sidebar></sidebar>
    </div>

    </div><!--end container-->
    <footer-component></footer-component>
</div>


</template>