<template id="page">
<div>
    <header-component></header-component>
    <div class="container clear">

        <div class="row"> 
            <div class="col-lg-8">
                <div v-if="post[0]">
                <div class="rvads">
                    <h1><span>{{post[0].title.rendered}}</span></h1>
                </div>    
                    <div class="content" v-html="post[0].content.rendered"></div>
                </div>  
                <div v-else>
                    <nopost></nopost>
                </div>
            </div><!--end col-lg-12-->
            <sidebar></sidebar>
        </div><!--end row-->

    </div><!--end container-->
    <footer-component></footer-component>
</div>

</template> 