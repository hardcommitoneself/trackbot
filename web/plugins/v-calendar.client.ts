import VCalendar from "v-calendar";

export default defineNuxtPlugin((nuxtApp) => {
    if(process.client)
        nuxtApp.vueApp.use(VCalendar);
})