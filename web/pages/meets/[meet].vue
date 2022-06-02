<template>
  <NuxtLayout name="app">
    <MainMeetShow />
  </NuxtLayout>
</template>
<script setup>
definePageMeta({
  middleware: "auth"
})
</script>
