<template>
    <div class="bg-gray-200 dark:bg-gray-900/25 border-gray-300 dark:border-gray-700 whitespace-nowrap rounded-full text-xs sm:text-sm text-gray-700 dark:text-gray-400 text-center w-18 border px-2 py-0.5" >
        {{ sport }}
    </div>
</template>
<script>
import { defineComponent } from "vue"

export default defineComponent({
    props: {
        sport: {
            type: String,
            default: ""
        }
    }
})
</script>