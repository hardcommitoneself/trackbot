<template>
    <!-- Primary Navigation Menu -->
    <div class="px-4" >
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="#">
                        <LogoType class="hidden sm:block h-9" />
                        <Logo class="block sm:hidden h-9" />
                    </a>
                    <!-- SEARCH -->
                    <div class="pt-1 ml-4" >
                        <span class="inline-block relative" >
                            <button
                                class="py-1.5 px-1 text-gray-600 bg-white hover:bg-gray-100 border border-gray-300 dark:hover:bg-gray-800 dark:border-gray-600 dark:bg-gray-700 text-xs rounded-lg transition"
                                id="search-modal" aria-label="Search for anything" aria-haspopup="true" >
                                <i class="fa-solid fa-lg fa-magnifying-glass text-gray-400 px-1 pt-px" ></i >
                            </button >  
                        </span >

                        <div class="fixed z-10 inset-0 overflow-y-auto hidden" >
                            <div
                                class="relative flex items-end justify-center m-auto py-4 px-4 text-center sm:block" >
                                <!-- Background overlay -->
                                <div class="fixed inset-0 transition-opacity" >
                                    <div class="absolute inset-0 bg-gray-500 opacity-50" ></div >
                                </div >

                                <div id="search-modal"
                                    class="absolute top-14 inset-x-0 p-2 mx-auto transition transform w-full lg:w-3/4 origin-center z-50" >
                                </div >
                            </div >
                        </div >
                    </div >
                </div >
            </div >
        </div >
    </div >
</template>
<script>
import Logo from "../core/logo.vue"
import LogoType from "../core/logoType.vue"
export default {
    components: {
        Logo,
        LogoType
    }
}
</script>