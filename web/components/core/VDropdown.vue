<template>
    <div class="relative overflow-visible" >
        <div @click="open = !open">
            <slot name="trigger"/>
        </div>
        <transition name="bot-transition-dropdown">
            <div v-if="open" :class="['absolute z-50 mt-1', widthClass, 'rounded-md shadow-lg', alignmentClasses, dropdownClasses]">
                <div :class="['rounded-md p-4', contentClasses]" >
                    <slot name="content"/>
                    <div v-if="!closeOnClick" class="flex mt-4" >
                        <button class="bot-alt-button" @click="open = false">Close</button>
                    </div >
                </div >
            </div>
        </transition>
    </div>
</template>
<script>
import { defineComponent } from "vue"

export default defineComponent({
    props: {
        align: {
            type: String,
            default: 'right'
        },
        width: {
            type: Number,
            default: 48
        },
        contentClasses: {
            type: String,
            default: 'py-1 bot-bg-and-text-accent'
        },
        dropdownClasses: {
            type: String,
            default: ''
        },
        closeOnClick: {
            type: Boolean,
            default: true
        }
    },
    data() {
        return {
            open: false
        }
    },
    computed: {      
        alignmentClasses() {
            switch (this.align) {
                case 'left':
                    return 'origin-top-left left-0';
                    break;
                case 'top':
                    return 'origin-top';
                    break;
                case 'none':
                case 'false':
                    return '';
                    break;
                case 'right':
                default:
                    return 'origin-top-right right-0';
                    break;
            }
        },
        widthClass() {
            switch (this.width) {
                case 48:
                    return 'w-48';
                    break;
                case 64:
                    return 'w-64';
                    break;
                case 72:
                    return 'w-72';
                    break;
            }
        }
    }
})
</script>