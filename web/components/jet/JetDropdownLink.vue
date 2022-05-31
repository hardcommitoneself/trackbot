<template>
  <a :class="[classes, 'block px-4 py-2 mb-0.5 text-sm leading-5 transition']">
    <slot />
  </a>
</template>
<script>
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    active: {
      type: Boolean,
      defalut: false,
    },
  },
  computed: {
    classes() {
      return this.active
        ? "font-semibold bg-tertiary-500 text-white hover:bg-tertiary-500 hover:bg-tertiary-500"
        : "text-gray-700 dark:text-gray-400 hover:bg-primary-500 hover:text-white hover:dark:text-white";
    },
  },
});
</script>
