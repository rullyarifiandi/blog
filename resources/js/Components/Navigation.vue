<template>
    <div class="flex items-center justify-between px-10 py-4 mx-auto lg:w-1/2 sm:w-full">
        <div class="flex flex-row items-end gap-1">
            <div class="text-xl font-bold text-left text-gray-800 focus:outline-none">
                <div v-if="title != null"  class="flex flex-row items-center justify-start gap-2">
                    <Link :href="route('posts.index')" class="mr-1 font-mono text-gray-800 hover:text-purple-600">
                        <ChevronLeftIcon class="w-8 h-8 p-1 text-white bg-purple-600 rounded hover:bg-gray-800"/>
                    </Link>
                    <div >{{ title }}</div>
                </div>
                <div v-else  class="flex flex-row items-center justify-start gap-2">
                    <Link :href="route('posts.index')" class="text-gray-800 hover:text-purple-600">
                        <HomeIcon class="w-8 h-8 p-1 mr-1 text-white bg-purple-600 rounded hover:bg-gray-800"/>
                    </Link>
                    <div  class="cursor-default+">Posts</div>
                </div>
            </div>
        </div>
        <div v-if="$page.props.auth.user">
            <NavigationDropMenu :name="$page.props.auth.user.name"/>
        </div>
        <!-- <div v-else class="text-sm font-medium leading-loose tracking-wide text-right text-gray-800 cursor-pointer focus:outline-none hover:text-purple-600 hover:underline">
            <Link :href="route('login')">Login</Link>
        </div> -->
    </div>
</template>
<script>
    import { ChevronLeftIcon, HomeIcon } from '@heroicons/vue/solid'
    import NavigationDropMenu from './NavigationDropMenu.vue'
    export default {
        components:{
            ChevronLeftIcon, HomeIcon, NavigationDropMenu
        },
        props: {
            title: String,
        }
    }
</script>
