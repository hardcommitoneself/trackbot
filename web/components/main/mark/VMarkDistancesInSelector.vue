<template>
    <div class="mt-1 ml-3 relative" >
        <jet-dropdown align="right" width="flex" dropdownClassese="">
            <template #trigger>
                <div class="flex items-center hover:text-primary-500 focus:outline-none cursor-pointer" >
                    <span class="inline-flex rounded-md" >
                        <span class="relative inline-block">
                            <i class="fa-lg fa-solid fa-ruler-combined" ></i >
                            <span :class="['absolute top-0 right-0', distancesIn === 'Imperical' ? 'px-1':'', 'text-xs font-bold leading-none transform text-indigo-500']">
                                {{ distancesIn === 'Imperical' ? 'I':'M' }}
                            </span>
                        </span>
                    </span>
                    <svg class="-mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" >
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" ></path >
                    </svg >
                </div>
            </template>

            <template #content>
                <jet-dropdown-link v-for="(option, key) in options" :key="key" class="cursor-pointer" @click="distancesIn = option.name" :active="distancesIn === option.name">
                    <div class="flex items-center space-x-2 justify-between" >
                        <p >{{ option.name }}</p >
                        <p class="text-xs italic" >({{ option.example }})</p >
                    </div >
                </jet-dropdown-link>
            </template>
        </jet-dropdown>
    </div>
</template>
<script>
import { defineComponent } from "vue";

import JetDropdown from "../../jet/JetDropdown.vue";
import JetDropdownLink from "../../jet/JetResponsiveNavLink.vue"

export default defineComponent({
    data() {
        return {
            distancesIn: 'Imperical',
            options: [
                {
                    name: "Imperical",
                    example: "18-02.50"
                },
                {
                    name: "Metric",
                    example: "5.55"
                }
            ]
        }
    },
    components: {
        JetDropdown,
        JetDropdownLink
    }
})
</script>