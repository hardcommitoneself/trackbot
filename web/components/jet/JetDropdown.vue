<template>
    <div class="relative overflow-visible" >
        <div @click="open = ! open" >
            <slot name="trigger"/>
        </div >
        <transition name="bot-transition-dropdown">
            <div v-if="open" v-click-outside="hideDropdown"  :class="['absolute z-50 mt-1', widthClass, 'whitespace-nowrap rounded-md shadow-lg', alignmentClasses, dropdownClasses]">
                <div @click="hideDropdown" :class="['rounded-md', contentClasses]" >
                    <slot name="content"/>
                </div >
            </div>
        </transition>
    </div >
</template>
<script>
import { defineComponent } from "vue";
import VClickOutside from "click-outside-vue3"

export default defineComponent({
    props: {
        align: {
            type: String,
            default: "right"
        },
        width: {
            type: String,
            default: 48
        },
        contentClasses: {
            type: String,
            default: "py-1 bot-bg-and-text-accent dark:border-gray-700 dark:border"
        },
        dropdownClasses: {
            type: String,
            default: ""
        },
        closeOnClick: {
            type: Boolean,
            default: false
        }
    },
    directives: {
      clickOutside: VClickOutside.directive
    },
    data() {
        return {
            open: false
        }
    },
    methods: {
        hideDropdown() {
            this.open = false
        }
    },
    computed: {
        alignmentClasses() {
            switch (this.align) {
                case 'left':
                    return 'origin-top-left left-0';
                case 'top':
                    return 'origin-top';
                case 'none':
                case 'false':
                    return '';
                case 'right':
                default:
                    return 'origin-top-right right-0';
            }
        },
        widthClass() {
            switch (this.width) {
                case '48':
                    return 'w-48';
                case '40':
                    return 'w-40';
                case 'flex':
                    return 'flex';
            }
        }
    }
})
</script>