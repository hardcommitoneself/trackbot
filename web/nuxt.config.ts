import { defineNuxtConfig } from "nuxt";

// https://v3.nuxtjs.org/api/configuration/nuxt.config
export default defineNuxtConfig({
  modules: [
    // https://tailwindcss.nuxtjs.org/
    "@nuxtjs/tailwindcss",
    '@nuxtjs/color-mode',
  ],

  css: [
    "~/assets/css/main.css",
    "v-calendar/dist/style.css"
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
  },

  publicRuntimeConfig: {
      API_BASE_URL: process.env.API_BASE_URL
  },

  plugins: [
    {src: "~/plugins/v-calendar.client.ts", mode: "client"}
  ]
});
