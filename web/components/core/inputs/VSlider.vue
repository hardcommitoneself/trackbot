<template>
    <div>
        <label class="bot-input-label flex items-center space-x-1">{{ label }} {{ enabled }}</label>
        <Switch
            v-model="enabled"
            :class="enabled ? 'bg-tertiary-500' : 'bg-gray-200'"
            class="relative inline-flex h-[24px] w-[44px] shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
        >
            <span class="sr-only">Use setting</span>
            <span
                aria-hidden="true"
                :class="enabled ? 'translate-x-5' : 'translate-x-0'"
                class="pointer-events-none inline-block h-[20px] w-[20px] transform rounded-full bg-white shadow-lg ring-0 transition duration-200 ease-in-out"
            />
        </Switch>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { Switch } from '@headlessui/vue'

const enabled = ref(false)

const props = defineProps({
    label: {
        type: String,
        required: true
    },
    modelValue: {
        type: Boolean,
        default: true
    }
})
</script>
