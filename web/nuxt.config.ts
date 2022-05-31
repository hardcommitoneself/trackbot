import { defineNuxtConfig } from "nuxt";

// https://v3.nuxtjs.org/api/configuration/nuxt.config
export default defineNuxtConfig({
  modules: [
    // https://tailwindcss.nuxtjs.org/
    "@nuxtjs/tailwindcss",
    '@nuxtjs/color-mode'
  ],

  css: [
    "~/assets/css/main.css",
  ],

  colorMode: {
    classSuffix: '',
  },

  app: {
  head: {
    title: 'trackbot',
    script: [
        {
            src: "https://kit.fontawesome.com/82fac68b65.js",
            crossorigin: "anonymous",
        }
    ],
    }
}
});
