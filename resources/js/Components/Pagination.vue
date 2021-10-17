<template>
    <div class="flex justify-between items-top" v-if="pagination.last_page > 1">
        <button :disabled="noPreviousPage" :class="{'opacity-50': noPreviousPage}" @click="loadPage(pagination.current_page - 1)"
        class="flex items-center px-5 py-1 text-gray-800 bg-white border border-gray-400 hover:bg-purple-600 hover:text-white hover:border-purple-600 focus:ring-2 focus:ring-purple-600 focus:border-transparent focus:outline-none">Previous</button>

        <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 md:items-center md:space-x-1">
            <div class="px-2 text-gray-600 lg:text-sm">{{ pagination.current_page }} of {{ pagination.last_page }}</div>
        </div>

        <button :disabled="noNextPage" :class="{'opacity-50': noNextPage}" @click="loadPage(pagination.current_page + 1)"
        class="flex items-center px-5 py-1 text-gray-800 bg-white border border-gray-400 hover:bg-purple-600 hover:text-white hover:border-purple-600 focus:ring-2 focus:ring-purple-600 focus:border-transparent focus:outline-none">Next</button>
    </div>
</template>

<script>
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/solid';
    export default {
        name: 'Pagination',
        props: {
            pagination: Object,
        },
        components:{
            ChevronLeftIcon, ChevronRightIcon
        },
        data() {
            return {
                page: this.pagination.current_page
            }
        },
        watch: {
            'pagination.current_page': function(page) {
                this.page = page;
            }
        },
        methods: {
            loadPage(page) {
                this.$inertia.get(this.$page.url, {page: page}, {
                    preserveState: true
                });
            }
        },
        computed: {
            noPreviousPage() {
                return this.pagination.current_page - 1 <= 0;
            },
            noNextPage() {
                return this.pagination.current_page + 1 > this.pagination.last_page;
            }
        }
    };
</script>
