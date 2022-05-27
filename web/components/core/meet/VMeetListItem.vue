<template>
    <v-list-stacked-item-base>
        <div class="flex items-center justify-between" >
            <div class="flex items-center" >
                <p class="bot-href-colors bot-href-border-bottom font-semibold" >{{ meet.attributes.name }}
                    <i v-if="meet.attributes.is_sanctioned" class=" pl-1 text-sm text-green-500 fa-solid fa-fw fa-disease" ></i >
                </p >
            </div >
            <v-sport-badge :sport="meet.attributes.sport"/>
        </div >
        <div class="mt-1 flex items-center justify-between space-x-2" >
            <div class="flex text-sm items-center space-x-1 pt-1 truncate" >
                <i class="fa-solid fa-fw fa-calendar-day" ></i >
                    <div v-for="(day, key) in days" :key="key" class="truncate" >
                        <span v-if="key">&bull;</span>
                        {{ day }}
                    </div >
            </div >
            <div class="flex items-center text-sm space-x-1" >
                <i class="fa-solid fa-fw fa-sitemap" ></i >
                <div v-for="(classification, key) in classifications" :key="key">
                    <div class="whitespace-nowrap" >
                        <span v-if="key">&bull;</span>
                        {{ classification }}
                    </div >
                </div>
            </div >
        </div >
    </v-list-stacked-item-base>
</template>
<script>
import { defineComponent } from "vue";

import VListStackedItemBase from "../lists/VListStackedItemBase.vue"
import VSportBadge from "../badges/VSportBadge.vue"

export default defineComponent({
    props: {
        meet: Object
    },
    data() {
        return {
            days: ["Thu, May 26th, 2022", "Fri, May 27th, 2022"],
            classifications: ["High School"]
        }
    },
    components: {
        VListStackedItemBase,
        VSportBadge
    }
})
</script>