<template>
  <div>
    <div class="bot-page-px">
      <v-core-h-1 class="pt-4">{{ organization.name }}</v-core-h-1>
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
const { data: organization } = await useFetch(() => `/api/v1/organization`);
</script>
