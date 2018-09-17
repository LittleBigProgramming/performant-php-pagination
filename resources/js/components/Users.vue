<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <div class="media" v-for="user in users">
                            <a href="#">
                                <img class="mr-3" v-bind:src="user.avatar" alt="">
                            </a>
                            <div class="media-body">
                                <h5 class="mt-0"><a href="#">{{ user.name }}</a></h5>
                            </div>
                        </div>
                        <pagination v-if="meta && users.length" for="users" :pagination="meta.pagination"></pagination>
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
                users: [],
                meta: null,
            }
        },
        methods: {
            getUsers (page) {
                axios.get('http://laravel-pagination.test//users?page=' + page)
                    .then((response) => {
                        this.users = response.data.data
                        this.meta = response.data.meta
                        console.log(this.users);
                        console.log(this.meta)
                    })
                    .catch( (error) => {
                        console.log(error);
                    })
            }
        },
        mounted() {
            this.getUsers(1);

            eventHandler.$on('users.switched-page', this.getUsers);
        }
    }
</script>

<style scoped>
    .container {
        margin-top: 40px;
    }
    .media {
        padding: 0 0 10px 0;
    }

    nav {
        display: block;
        width: 90%;
        margin: auto;
    }
</style>