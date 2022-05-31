<template>
    <div>
        <label :for="id" class="bot-input-label">{{ label }}</label>
        <div class="mt-1">
        <input :type="type" :name="name" :id="id" class="bot-base-input" :placeholder="placeholder" />
        </div>
    </div>
</template>
<script>
import { defineComponent } from "vue";

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
    }
})
</script>