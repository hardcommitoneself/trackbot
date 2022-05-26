<template>
    <div >
        <div class="w-full pt-2 pb-8" >
            <label for="search" class="sr-only" >Search for anything...</label >
            <div class="relative text-gray-800 focus-within:text-gray-600" >
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none" >
                    <i class="fa fa-search" ></i >
                </div >
                <input
                    v-model="searchString"
                    type="text"
                    id="search-anything-input"
                    class="bot-base-input bot-lead-icon"
                    placeholder="Search for anything..."
                    autocomplete="off" />
            </div >
        </div >

        <div class="overflow-hidden" >
            <ul class="" >
                <!-- TODO: get search results -->
            </ul >
        </div >
    </div >
</template>
<script lang="ts">
import { defineComponent } from "vue"

export default defineComponent({
    data() {
        return {
            searchString: ""
        }
    }
})
</script>
