<template>
    <div>
        <Menu as="div" class="relative inline-block text-right group">
            <div>
                <MenuButton class="inline-flex justify-center w-full text-sm font-medium text-gray-800 group-focus:outline-none group-hover:text-purple-600 group-hover:underline">
                {{ name }} <ChevronDownIcon class="w-5 h-5 ml-1 -mr-1" aria-hidden="true" /></MenuButton>
            </div>
            <transition enter-active-class="transition duration-100 ease-out" enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
            leave-active-class="transition duration-75 ease-in" leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
                <MenuItems class="absolute right-0 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded shadow-lg w-36 ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="px-1 py-1">
                        <MenuItem>
                            <form @click.prevent="AddNewPost">
                                <button class="items-center w-full px-2 py-2 text-xs text-left text-gray-900 rounded hover:bg-purple-600 hover:text-white">Add new post</button>
                            </form>
                        </MenuItem>
                    </div>
                    <div class="px-1 py-1">
                        <MenuItem>
                            <form @click.prevent="Logout">
                                <button class="items-center w-full px-2 py-2 text-xs text-left text-gray-900 rounded hover:bg-purple-600 hover:text-white">Logout</button>
                            </form>
                        </MenuItem>
                    </div>
                </MenuItems>
            </transition>
        </Menu>
    </div>
</template>

<script>
    import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
    import { ChevronDownIcon } from '@heroicons/vue/solid'

    export default {
        props: {
            name: String
        },
        components: {
            Menu, MenuButton, MenuItems, MenuItem, ChevronDownIcon
        },
        methods: {
            Logout(){
                this.$inertia.post(route('logout'))
            },
            AddNewPost(){
                this.$inertia.get(route('posts.create'))
            }
        }
    }
</script>
