<template>
    <div>
        <label :for="id" class="bot-input-label flex items-center space-x-1">{{ label }} <v-required-dot :v-if="required" /> </label>
        <div class="mt-1">
            <input :id="id" :name="name" :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" class="bot-base-input" :placeholder="placeholder" :disabled="disabled" :required="required" />
        </div>
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