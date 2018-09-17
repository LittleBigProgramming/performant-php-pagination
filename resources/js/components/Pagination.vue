<template>
    <nav class="mx-auto center-block">
        <ul class="pagination">
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
        props: {
            pagination: Object,
            for: {
                type: String,
                default: 'default'
            }
        },
        methods: {
            switchPage (page) {

                if (page < 1 || page > this.pagination.total_pages) {
                    return;
                }

                eventHandler.$emit(this.for + '.switched-page', page);
            }
        }
    }
</script>

<style scoped>

</style>