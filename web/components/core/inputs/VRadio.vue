<template>
    <div class="space-y-3">
        <label class="bot-input-label flex items-center space-x-1"> {{ label }} </label>
        <div v-for="(option, key) in options" :key="key" class="flex items-center">
            <input id="push-everything" :name="name" type="radio" class="focus:ring-tertiary-500 h-4 w-4 text-tertiary-500 border-gray-300" @click="$emit('update:modelValue', key)" :checked="key === modelValue"/>
            <label for="push-everything" class="ml-3 block text-sm font-medium text-gray-700 dark:text-white"> {{ option }} </label>
        </div>
    </div>
</template>
<script setup>
const props = defineProps({
    name: {
        type: String,
        required: true
    },
    label: {
        type: String,
        required: true
    },
    options: {
        type: Array,
        default: []
    },
    modelValue: {
        type: Number,
        default: 0
    }
})

defineEmits(["update:modelValue"])
</script>
