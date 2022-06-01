<template>
  <v-list-stacked-item-base :href="`/meets/${meet.id}`">
    <div class="flex items-center justify-between">
      <div class="flex items-center">
        <p class="bot-href-colors bot-href-border-bottom font-semibold">
          {{ meet.attributes.name }}
        </p>
        <i
          v-if="meet.attributes.is_sanctioned"
          class="pl-1 text-sm text-green-500 fa-solid fa-fw fa-seal"
        ></i>
      </div>
      <v-sport-badge :sport="meet.attributes.sport" />
    </div>
    <div class="mt-1 flex items-center justify-between space-x-2">
      <div class="flex text-sm items-center space-x-1 pt-1 truncate">
        <i class="fa-solid fa-fw fa-calendar-day"></i>
        <div v-for="(day, key) in meet.meta.days" :key="key" class="truncate">
          <span v-if="key">&bull;</span>
          {{ day }}
        </div>
      </div>
      <div class="flex items-center text-sm space-x-1">
        <i class="fa-solid fa-fw fa-sitemap"></i>
        <div v-for="(level, key) in meet.meta.levels" :key="key">
          <div class="whitespace-nowrap">
            <span v-if="key">&bull;</span>
            {{ level }}
          </div>
        </div>
      </div>
    </div>
  </v-list-stacked-item-base>
</template>
<script>
import { defineComponent } from "vue";

import VListStackedItemBase from "../lists/VListStackedItemBase.vue";
import VSportBadge from "../badges/VSportBadge.vue";

export default defineComponent({
  props: {
    meet: Object,
  },
  data() {
    return {};
  },
  components: {
    VListStackedItemBase,
    VSportBadge,
  },
});
</script>
