<template>
  <div class="p-4">
    <NuxtLink class="bot-button" to="/_dev">Development Resources</NuxtLink>
    <div class="pt-4">
      <h1 class="text-2xl">Dev Guidelines</h1>
      <ul>
        <li>
          No external resources. The app must function in offline-mode so we
          want all assets (fonts, svgs, etc) to be local as much as possible.
        </li>
      </ul>
    </div>
    <div>
      <h1 class="pt-4 text-2xl">Style Guide</h1>
      <ul>
        <li>
          Font -
          <a
            target="_blank"
            href="https://fonts.google.com/specimen/Titillium+Web"
            >Titillium Web</a
          >
        </li>
        <li>Tailwind CSS - use {primary, secondary, tertiary} for colors.</li>
        <li>
          Icons - <a target="_blank" href="https://heroicons.com">heroicons</a>
        </li>
        <li>Paddings - x = evens, y = odds</li>
      </ul>
    </div>
    <div class="flex pt-8">
      <div class="w-1/2 bg-gray-900 p-4">
        <!-- dark mode -->
        <p class="text-primary-500">Welcome to trackbot</p>
        <p class="text-secondary-500">
          2022 Utah UHSAA State T&F Championships
        </p>
        <p class="text-tertiary-500">Jan 1, 2022</p>
      </div>

      <!-- light mode -->
      <div class="w-1/2 bg-white p-4">
        <p class="text-primary-500">Welcome to trackbot</p>
        <p class="text-secondary-500">
          2022 Utah UHSAA State T&F Championships
        </p>
        <p class="text-tertiary-500">Jan 1, 2022</p>
      </div>
    </div>
  </div>
</template>
