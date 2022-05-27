<template>
    <div>
        <div class="bot-page-px" >
            <v-core-h-1 class="pt-4" >Upcoming Meets</v-core-h-1>
        </div >
        <div class="mt-4 flex items-center justify-between space-x-4 bot-page-px" >
            <div class="flex-auto" >
                <div class="relative h-9 w-full md:w-1/2 flex-shrink-0" searchable="true" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20"
                        height="24" class="inline-block absolute ml-2 text-gray-400" role="presentation"
                        style="top: 6px;" >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" ></path >
                    </svg >
                    <input
                        v-model="userSearchString"
                        class="bot-base-input bot-lead-icon pr-10"
                        placeholder="Search" type="text" spellcheck="false" aria-label="Search" />
                    <button class="px-1" v-if="userSearchString !== ''" @click="userSearchString = ''">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             viewBox="0 0 24 24" stroke="currentColor"
                             class="w-7 inline-block absolute mt-px right-1 text-gray-400" role="presentation"
                             style="top: 6px;" >
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                  clip-rule="evenodd" />
                        </svg >
                    </button >
                </div >
            </div >
            <div >
                <!-- TODO: My Register for meet -->
            </div >
        </div >
        <div class="mt-8 bot-page-px-list" >
            <v-list-stacked-container>
                <template #header>
                    <div class="flex items-center justify-between" >
                        <v-core-h-3 >Meets ({{ meets.length }})</v-core-h-3 >

                        <div class="flex justify-end" >
                            <div class="ml-3 relative" >
                                <v-dropdown align="right" :width="72" contentClasses="bot-bg-and-text border bot-border" :closeOnClick="false">
                                    <template #trigger>
                                        <button >
                                            <div
                                                class="block px-2 py-1 rounded-md items-center space-x-0.5 hover:bg-gray-200 dark:hover:bg-gray-700" >
                                                <i class="fa-solid fa-lg fa-filter" ></i >
                                                <i class="fa-solid fa-sm fa-chevron-down" ></i >
                                            </div >
                                        </button >
                                    </template>

                                    <template #content>
                                        <div>
                                            <!-- TODO: Add sort by -->
                                            <div class="uppercase text-sm font-semibold" > Filters</div >

                                            <div class="mt-1" >
                                                <label for="genders"
                                                    class="block text-xs font-medium text-gray-500" >Sanctioned</label >
                                                <div class="mt-1" >
                                                    <div class="w-32" >
                                                        <select class="bot-input" >
                                                                <option v-for="option in options" :key="option">{{ option }}</option >
                                                        </select >
                                                    </div >
                                                </div >
                                            </div >
                                        </div>
                                    </template>
                                </v-dropdown>
                            </div >
                        </div >
                    </div>
                </template>
                <v-card-no-results v-if="!meets.length"/>
                <div v-else>
                    <v-meeet-list-item v-for="(meet, key) in meets" :key="key" :meet="meet"/>
                </div>
            </v-list-stacked-container>
        </div >
    </div>
</template>
<script setup>
const { pending, data: meets } = await $fetch("/api/v1/meets");
</script>

<script>
import { defineComponent } from "vue"

import VCoreH1 from "../../core/header/H1.vue"
import VCoreH3 from "../../core/header/H3.vue"
import VListStackedContainer from "../../core/lists/VListStackedContainer.vue"
import VDropdown from "../../core/VDropdown.vue"
import VCardNoResults from "../../core/cards/VCardNoResults.vue"
import VMeeetListItem from "../../core/meet/VMeetListItem.vue"

export default defineComponent({
    data() {
        return {
            userSearchString: "",
            options: ["All", "Sanctioned", "Not Sanctioned"]
        }
    },
    components: {
        VCoreH1,
        VCoreH3,
        VDropdown,
        VListStackedContainer,
        VCardNoResults,
        VMeeetListItem
    }
})
</script>