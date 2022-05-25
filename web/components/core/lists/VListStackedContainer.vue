<template>
    <v-card-list>
        <template v-if="hasHeaderSlot" #header>
            <slot name="header"/>
        </template>
        <ul role="list" class="divide-y bot-divide" >
            <slot />
        </ul >
    </v-card-list>
</template>
<script>
import { defineComponent } from "vue"
import VCardList from "../cards/VCardList.vue"

export default defineComponent({
    computed: {
        hasHeaderSlot() {
            return !!this.$slots.header
        }
    },
    components: {
        VCardList
    }
})
</script>