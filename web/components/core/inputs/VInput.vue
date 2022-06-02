<template>
    <div>
        <label :for="id" :class="['bot-input-label flex items-center space-x-1', { 'text-red-600': errors }]">{{ label }} <v-required-dot v-if="required" /> </label>
        <div class="mt-1 relative">
            <input :id="id" :name="name" :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :class="['bot-base-input', { '!border-red-500 focus:!ring-red-500 placeholder-red-300' : errors }]" :placeholder="placeholder" :disabled="disabled" :required="required" />
            <div v-if="errors" class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <i class="fa-solid fa-circle-exclamation text-red-500"></i>
            </div>
        </div>
        <p v-if="errors" class="mt-2 text-sm text-red-600">{{ errors }}</p>
    </div>
</template>
<script>
import { defineComponent } from "vue";

import VRequiredDot from "./VRequiredDot.vue"

export default defineComponent({
    props: {
        id: {
            type: String,
            required: true
        },
        name: {
            type: String,
            required: true
        },
        type: {
            type: String,
            default: "text"
        },
        modelValue: {
            type: String,
            default: ""
        },  
        label: {
            type: String,
            default: "",
            required: true
        },
        placeholder: {
            type: String,
            default: ""
        },
        errors: {
            type: String,
            default: ""
        },
        required: {
            type: Boolean,
            default: false,
        },
        disabled: {
            type: Boolean,
            default: false
        }
    },
    emits: ["update:modelValue"],
    components: {
        VRequiredDot
    }
})
</script>