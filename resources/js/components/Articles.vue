<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Articles</div>

                    <div class="card-body">
                        <post v-for="(article) in articles" v-bind:article="article"></post>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
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
                        // handle success
                        this.articles = response.data.data
                       // this.meta = response.body.meta
                        console.log(response);
                        console.log(response.data.data);
                    })
                    .catch( (error) => {
                        // handle error
                        console.log(error);
                    })
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.getArticles(1);
        }
    }
</script>
