<template>
    <div :class="classes">
        <slot />
    </div>
</template>
<script>
import {defineComponent} from "vue"

export default defineComponent({
    props: {
        active: {
            type: Boolean,
            default: false
        }
    },
    computed: {
        classes() {
            return (this.active ?? false)
                ? 'cursor-pointer block py-2 text-base px-4 text-white font-semibold bg-tertiary-500 transition'
                : 'cursor-pointer block py-2 text-base px-4 text-gray-600 dark:text-gray-300 hover:text-gray-800 hover:bg-primary-500 dark:hover:text-gray-800 dark:hover:bg-primary-500 dark:bg-gray-800 hover:border-gray-300 transition'
        }
    }
})
</script>