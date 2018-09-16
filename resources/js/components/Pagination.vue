<template>
    <nav class="mx-auto">
        <ul class="pagination mx-auto">
            <li class="page-item" v-bind:class="{ 'disabled': !pagination.links.previous }">
                <a class="page-link" href="#" @click.prevent="switchPage(pagination.current_page - 1)">Previous</a>
            </li>
            <li class="page-item"
                v-for="page in parseInt(pagination.total_pages)"
                v-bind:class="{ 'active': pagination.current_page === page }"
            >
                <a class="page-link" href="#" @click.prevent="switchPage(page)">{{ page }}</a>
            </li>
            <li class="page-item" v-bind:class="{ 'disabled': !pagination.links.next }">
                <a class="page-link" href="#" @click.prevent="switchPage(pagination.current_page + 1)">Next</a>
            </li>
        </ul>
    </nav>
</template>

<script>
    import eventHandler from '../events.js';

    export default {
        props: [
            'pagination'
        ],
        methods: {
            switchPage (page) {
                if (page < 1 || this.pagination.total_pages) {
                    return;
                }

                eventHandler.$emit('switched-page', page);
            }
        }
    }
</script>

<style scoped>
    nav {
        display: block;
        width: 50%;
    }
</style>