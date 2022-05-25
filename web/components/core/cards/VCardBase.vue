<template>
    <div class="bg-white dark:bg-gray-800 rounded-lg" >
        <div v-if="hasHeaderSlot" class="border-b border-gray-200 dark:border-gray-700 px-4 py-3" >
            <slot name="header" />
        </div >
        <div class="px-4 py-3" >
            <slot />
        </div >
        <div v-if="hasFooterSlot" class="border-t border-gray-200 dark:border-gray-700 dark:bg-gray-800 px-4 py-2" >
            <slot name="footer" />
        </div >
    </div >
</template>
<script>
import {defineComponent} from "vue"
export default defineComponent({
    computed: {
        hasHeaderSlot() {
            return !!this.$slots.header
        },
        hasFooterSlot() {
            return !!this.$slots.footer
        }
    }
})
</script>