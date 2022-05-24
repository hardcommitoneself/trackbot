import { defineNuxtConfig } from "nuxt";

// https://v3.nuxtjs.org/api/configuration/nuxt.config
export default defineNuxtConfig({
  modules: [
    // https://tailwindcss.nuxtjs.org/
    "@nuxtjs/tailwindcss",
  ],

  css: [
    "~/assets/css/main.css", 
    '@fortawesome/fontawesome-free/css/all.css'
  ],
});
