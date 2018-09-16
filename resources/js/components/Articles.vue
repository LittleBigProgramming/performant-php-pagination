<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Articles</div>

                    <div class="card-body">
                        <post v-for="(article) in articles" v-bind:article="article"></post>
                        <pagination v-if="meta && articles.length" :pagination="meta.pagination"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import eventHandler from '../events.js';

    export default {
        data () {
            return {
                articles: [],
                meta: null,
            }
        },
        methods: {
            getArticles (page) {
                axios.get('http://laravel-pagination.test//articles?page=' + page)
                    .then((response) => {
                        this.articles = response.data.data
                        this.meta = response.data.meta
                        console.log(response.data.data);
                        console.log(this.meta)
                    })
                    .catch( (error) => {
                        console.log(error);
                    })
            }
        },
        mounted() {
            this.getArticles(1);

            eventHandler.$on('switched-page', this.getArticles);
        }
    }
</script>
