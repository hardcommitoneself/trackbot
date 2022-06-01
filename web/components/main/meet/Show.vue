<template>
  <div>
    <div class="bot-page-px">
      <v-core-h-1 class="pt-4">{{ meet.attributes.name }}</v-core-h-1>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";

import VCoreH1 from "../../core/header/H1.vue";

export default defineComponent({
  components: {
    VCoreH1,
  },
});
</script>

<script setup>
const route = useRoute();
const { data: meet } = await $fetch(`/api/v1/meets/${route.params.meet}`);
</script>
