<template>
  <NuxtLayout name="app">
    <MainIndexShow />
  </NuxtLayout>
</template>
<script setup>
import { defineComponent } from "vue";

definePageMeta({
  layout: false,
});
</script>
