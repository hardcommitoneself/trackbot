<template>
    <nav>
        <!-- Primary Navigation Menu -->
        <div class="px-4" >
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="#">
                            <v-logo-type class="hidden sm:block h-9"></v-logo-type>
                            <v-logo class="block sm:hidden h-9"></v-logo>
                        </a>
                        <!-- SEARCH -->
                        <div class="pt-1 ml-4" >
                            <span class="inline-block relative" >
                                <button 
                                    aria-label="Search for anything" 
                                    aria-haspopup="true" 
                                    class="py-1.5 px-1 text-gray-600 bg-white hover:bg-gray-100 border border-gray-300 dark:hover:bg-gray-800 dark:border-gray-600 dark:bg-gray-700 text-xs rounded-lg transition"
                                    @click="openSearchModal = true" >
                                    <i class="fa-solid fa-lg fa-magnifying-glass text-gray-400 px-1 pt-px" ></i >
                                </button >
                            </span >


                            <!-- Background overlay -->
                            <div v-if="openSearchModal" class="fixed inset-0 transition-opacity" >
                                <div class="absolute inset-0 bg-gray-500 opacity-50" ></div >
                            </div >
                            <transition name="bot-transition-seach-modal">
                                <div v-if="openSearchModal" class="fixed z-10 inset-0 overflow-y-auto" >
                                    <div
                                        class="relative flex items-end justify-center m-auto py-4 px-4 text-center sm:block" >
                                        <div id="search-modal" class="absolute top-14 inset-x-0 p-2 mx-auto lg:w-3/4 origin-center z-50" >
                                            <v-card-base class="border dark:border-none border-gray-300 px-4">
                                                <div class="flex items-center justify-between" >
                                                    <v-h4 >Search</v-h4 >
                                                    <div >
                                                        <button @click="openSearchModal = false" type="button"
                                                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" >
                                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor" >
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M6 18L18 6M6 6l12 12" >
                                                                </path >
                                                            </svg >
                                                        </button >
                                                    </div >
                                                </div >
                                                <div >
                                                    <main-command-palette />
                                                </div >
                                                <div class="text-sm py-2 my-2" >Schools by name, mascot, or city</div >
                                            </v-card-base>
                                        </div >
                                    </div >
                                </div >
                            </transition>
                        </div >
                        <v-mode-toggle class="ml-3 pt-1" />
                        <div>
                            <!-- TODO: distances in selector -->
                        </div>
                    </div >
                </div >
                <div class="flex items-center space-x-3" >
                    <div class="flex items-center space-x-3" >
                        <div >
                            <!-- TODO: Org selector -->
                        </div >

                        <div class="hidden sm:flex sm:items-center" >
                            <!-- TODO: guest mode -->
                            <NuxtLink class="bot-href">Login</NuxtLink>

                            <!-- TODO: settings dropdown(auth) -->
                        </div >
                    </div >

                    <!-- Hamburger -->
                    <div class="mt-1 -mr-2 flex items-center sm:hidden" >
                        <button @click="openDropdownMenu = !openDropdownMenu"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 dark:hover:bg-gray-800 hover:bg-gray-100 transition" >
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24" >
                                <path :class="{'hidden': openDropdownMenu, 'inline-flex': !openDropdownMenu}"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': !openDropdownMenu, 'inline-flex': openDropdownMenu}"
                                        stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg >
                        </button >
                    </div >
                </div >
            </div >
        </div >
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': openDropdownMenu, 'hidden': !openDropdownMenu}" class="sm:hidden" >
            <div class="py-1 border-t border-b border-gray-300 bg-gray-200 dark:border-gray-700 dark:bg-gray-800" >
                <jet-responsive-nav-link :active="false">Login</jet-responsive-nav-link>
            </div >
            <!-- TODO: settings options -->
        </div >
    </nav>
</template>
<script>
import { defineComponent } from "vue"

import VH4 from "../core/header/H4.vue"
import VLogo from "../core/VLogo.vue"
import VLogoType from "../core/VLogoType.vue"
import VCardBase from "../core/cards/VCardBase.vue"
import VModeToggle from "../core/VModeToggle.vue"
import JetResponsiveNavLink from "../jet/JetResponsiveNavLink.vue"
import MainCommandPalette from "../main/CommandPalette.vue"

export default defineComponent({
    data() {
        return {
            openSearchModal: false,
            openDropdownMenu: false
        }
    },
    components: {
        VH4,
        VLogo,
        VLogoType,
        VCardBase,
        VModeToggle,
        JetResponsiveNavLink,
        MainCommandPalette
    }
})
</script>