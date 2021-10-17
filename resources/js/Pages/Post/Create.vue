<template>
    <Head title="Add new post"/>
    <layouts>
        <template v-slot:header>
            <Navigation :title="`Add new post`"/>
        </template>
        <template v-slot:default>
            <form v-on:submit.prevent="savePost">
                <div class="flex flex-col gap-3">
                    <div class="flex flex-col gap-1">
                        <label for="title" class="text-sm font-semibold">Title</label>
                        <input type="text" v-model="post.title" class="text-sm leading-loose tracking-wide text-gray-800 bg-white border border-gray-400 rounded focus:ring-2 focus:ring-purple-600 focus:border-transparent focus:outline-none">
                        <div v-if="errors.title" class="text-xs leading-loose tracking-wide text-left text-gray-400">{{ errors.title }}</div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="content" class="text-sm font-semibold">Content</label>
                        <textarea rows="10" class="text-sm leading-loose tracking-wide text-gray-800 bg-white border border-gray-400 rounded focus:ring-2 focus:ring-purple-600 focus:border-transparent focus:outline-none" v-model="post.content" ></textarea>
                        <div v-if="errors.content" class="text-xs leading-loose tracking-wide text-left text-gray-400">{{ errors.content }}</div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="content" class="text-sm font-semibold">Tags</label>
                        <select type="text" v-model="post.tags" class="text-sm leading-loose tracking-wide text-gray-800 bg-white border border-gray-400 rounded focus:ring-2 focus:ring-purple-600 focus:border-transparent focus:outline-none" multiple>
                                <option v-for="tag in tags" :key="tag.id" :value="tag.id">{{ tag.name }}</option>
                        </select>
                        <div v-if="errors.tags" class="text-xs leading-loose tracking-wide text-left text-gray-400">{{ errors.tags }}</div>
                    </div>
                    <button  class="py-2 mt-2 text-sm font-semibold leading-loose tracking-wide text-gray-800 bg-white border border-gray-400 rounded focus:border-purple-600 hover:border-purple-600 focus:outline-none hover:bg-purple-600 hover:text-white">Submit</button>
                </div>
            </form>
        </template>
    </layouts>
</template>
<script>
    import Layouts from '../../Shared/Layouts.vue'
    import Navigation from '../../Components/Navigation.vue'

    export default {
        props:{
            tags: Object,
            errors: Object,
        },
        components: {
            Layouts, Navigation
        },
        data (){
            return {
                post: {
                    title: null,
                    content: null,
                    tags: null
                }
            }
        },
        methods: {
            savePost () {
                this.$inertia.post(route('posts.store'), this.post)
                // console.log(this.post)
            }
        }
    }
</script>
