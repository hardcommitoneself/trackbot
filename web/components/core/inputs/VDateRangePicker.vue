<template>
    <client-only>
        <label class="bot-input-label flex items-center space-x-1"> {{ label }} </label>
        <v-date-picker class="w-full" v-model="range" is-range :is-dark="$colorMode.preference === 'dark'">
            <template v-slot="{ inputValue, togglePopover }">
                <div class="flex w-full items-center">
                    <button
                    class="p-2 bg-secondary-100 border border-secondary-200 hover:bg-secondary-200 text-secondary-600 rounded-l focus:bg-secondary-500 focus:text-white focus:border-secondary-500 focus:outline-none"
                    @click="togglePopover()"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            class="w-4 h-4 fill-current"
                        >
                            <path
                            d="M1 4c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm2 2v12h14V6H3zm2-6h2v2H5V0zm8 0h2v2h-2V0zM5 9h2v2H5V9zm0 4h2v2H5v-2zm4-4h2v2H9V9zm0 4h2v2H9v-2zm4-4h2v2h-2V9zm0 4h2v2h-2v-2z"
                            ></path>
                        </svg>
                    </button>
                    <input
                        :value="[inputValue.start, inputValue.end].join('-')"
                        class="bg-white text-gray-700 w-full py-1 px-2 appearance-none border rounded-r focus:outline-none focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600"
                        readonly
                    />
                </div>
            </template>
        </v-date-picker>
    </client-only>
</template>
<script>
import { defineComponent } from "vue"

export default defineComponent({
    date() {
        return {
            range: {
                start: "",
                end: ""
            }
        }
    },
    props: {
        label: {
            type: String,
            default: ""
        }
    }
})
</script>