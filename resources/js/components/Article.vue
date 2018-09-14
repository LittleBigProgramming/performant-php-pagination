<template>
    <div class="media article">
            <a href="#">
                <img class="mr-3" v-bind:src="article.user.data.avatar" alt="">
            </a>
        <div class="media-body">
            <h5 class="mt-0"><a href="#">{{ article.title }}</a></h5>
            by {{ article.title }}
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'article'
        ]
    }
</script>

<style scoped>
 .article {
     padding: 0 0 10px 0;
 }
</style>