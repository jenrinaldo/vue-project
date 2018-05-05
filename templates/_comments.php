<template id="comments">
    <div class="commentar">
    <h5><span><i class="fas fa-comments"></span></i> Comment <span><?php comments_number( __( '0', 'blank' ), __( '1', 'blank' ), __( '%', 'blank' ), 'comments-link', __('-', 'blank')); ?></span></h5>           
        <div v-for="(comment, index) in comments" class="comment">
            <img class="gravatar" v-bind:src="comment.author_avatar_urls[48]" />
            <div class="comment-author">{{comment.author_name}}</div>
            <div class="comment-content" v-html="comment.content.rendered"></div>
        </div>
    </div>
</template>