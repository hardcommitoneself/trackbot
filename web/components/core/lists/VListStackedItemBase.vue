<template>
  <li>
    <a :href="href" class="block bot-row-hover">
      <div class="px-4 py-3 sm:px-6">
        <slot />
      </div>
    </a>
  </li>
</template>
<script>
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    href: {
      type: String,
      default: "",
    },
  },
});
</script>
