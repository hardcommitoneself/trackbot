<template>
    <NuxtLayout name="app">
        <MainMeetList />
    </NuxtLayout>
</template>
<script setup>
import {defineComponent} from "vue"

definePageMeta({
    layout: false
})
</script>