<template>
    <Head title="Random Posts"></Head>
    <layouts>
        <template v-slot:header>
            <Navigation :title="params.tags"/>
        </template>
        <template v-slot:default>
            <div class="flex flex-col">
                <div v-if="$page.props.flash.message">
                    <transition name="fade">
                        <div v-if="alertVisible" class="px-4 py-2 mb-4 text-sm leading-loose tracking-wide text-white bg-purple-600 rounded">
                            {{ $page.props.flash.message }}
                        </div>
                    </transition>
                </div>
                <div class="flex flex-row justify-between py-2">
                    <input type="search" class="text-sm bg-transparent bg-white border-gray-300 rounded md:w-4/12 sm:w-6/12 focus:ring-2 focus:ring-purple-600 focus:border-transparent" v-model="params.search" placeholder="Search...">
                    <div class="flex flex-row text-sm font-medium leading-loose tracking-wide text-right text-gray-800 cursor-pointer focus:outline-none hover:text-purple-600 hover:underline" @click="sort('created_at')">
                        <div v-if="params.direction === 'asc'">
                            <div class="flex flex-row items-center">
                                <div>Older</div>
                                <ArrowSmDownIcon class="w-4 h-4"/>
                            </div>
                        </div>
                        <div v-if="params.direction === 'desc'">
                            <div class="flex flex-row items-center">
                                <div>Latest</div>
                                <ArrowSmUpIcon class="w-4 h-4"/>
                            </div>
                        </div>
                        <div v-if="params.direction == null">
                            <div class="flex flex-row items-center">
                                <div>Latest</div>
                                <ArrowSmUpIcon class="w-4 h-4"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="posts.total" class="flex flex-col divide-y divide-gray-200 divide-opacity-75">
                    <div v-for="post in posts.data" class="flex flex-col gap-2 py-6" :key="post.id">
                        <Link :href="route('posts.show', post.slug)" class="group focus:border-transparent focus:outline-none">
                            <div class="text-xs leading-loose tracking-wide text-gray-500 font-base">{{ post.created_at }}</div>
                            <div class="text-xl font-semibold leading-loose tracking-wide text-gray-800 group-hover:text-purple-600">{{ post.title }}</div>
                            <div class="text-base font-normal leading-loose tracking-wide text-justify text-gray-600" v-html="$options.filters.truncate(post.content)"></div>
                        </Link>
                        <div class="flex flex-row gap-2 mt-2 text-xs">
                            <div v-for="tag in post.tags" :key="tag">
                                <div  class="text-gray-400 cursor-pointer hover:text-purple-600" @click="tags(tag.name)">{{ tag.name }}</div>
                            </div>
                        </div>
                        <div v-if="$page.props.auth.user" class="mt-2">
                            <button @click.prevent="DeletePost(post.slug)" class="px-3 py-2 text-xs bg-white border border-gray-300 rounded cursor-pointer hover:bg-purple-600 hover:text-white hover:border-purple-600">Delete</button>
                        </div>
                    </div>
                </div>
                <div v-else class="flex items-center justify-center w-auto mt-5 text-base tracking-wide text-gray-300 border-t border-b border-gray-200 border-opacity-75 cursor-default h-52">No data found</div>
                <pagination class="mt-5" :pagination="posts"></pagination>
            </div>
        </template>
    </layouts>
</template>

<script>
    import Pagination from '../../Components/Pagination.vue'
    import Navigation from '../../Components/Navigation.vue'
    import Layouts from '../../Shared/Layouts.vue'
    import { pickBy, throttle } from 'lodash'
    import { ArrowSmUpIcon, ArrowSmDownIcon } from '@heroicons/vue/solid'

    export default {
        props: {
            posts: Object,
            filters: Object,
        },
        components: {
            Pagination, Layouts, Navigation, ArrowSmUpIcon, ArrowSmDownIcon
        },
        data() {
            return {
                params: {
                    search: this.filters.search,
                    field: this.filters.field,
                    direction: this.filters.direction,
                    tags: this.filters.tags
                },
                alertVisible: true,
            };
        },
        methods: {
            sort(field) {
                this.params.field = field;
                this.params.direction = this.params.direction === 'asc' ? 'desc' : 'asc';
            },
            tags(field) {
                this.params.tags = field;
            },
            DeletePost(slug) {
                this.$inertia.delete(this.route('posts.destroy', slug));
                this.alertVisible = true;
                setTimeout (() => this.alertVisible = false, 3000);
            }
        },
        watch: {
            params: {
                handler: throttle(function () {
                    let params = pickBy(this.params);
                    this.$inertia.get(this.route('posts.index'), params, { replace: true, preserveState: true });
                }, 150),
                deep: true,
            },
        },
        filters: {
            truncate: function (text) {
                if (text.length > 250) {
                    return text.substring(0, 250) + '...'
                } else {
                    return text
                }
            },
        },
        created () {
            setTimeout (() => this.alertVisible = false, 3000);
        }
    }
</script>
<style >
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
