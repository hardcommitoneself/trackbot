<template>
  <div class="p-4">
    <NuxtLink class="bot-button" to="/_dev">Development Resources</NuxtLink>
    <div class="pt-4">
      <h1 class="text-2xl">Dev Guidelines</h1>
      <ul>
        <li>
          No external resources. The app must function in offline-mode so we
          want all assets (fonts, svgs, etc) to be local.
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
        <li>
          Paddings / Margins - x = evens, y = odds.
          <span class="font-semibold"
            >Apply m*- and p*- on top and on left only.</span
          >
        </li>
        <li>Headings - all are secondary color</li>
        <li>
          Links / buttons - all are primary color or underlined in primary
        </li>
      </ul>
    </div>

    <div>
      <div class="mt-8 flex">
        <div class="dark w-1/2">
          <div class="p-4 bot-bg-color dark bot-text-color">
            <!-- dark mode -->
            <div class="font-mono text-2xl">Dark Mode Preview</div>

            <div class="mt-3 font-mono">Colors</div>
            <div class="mt-3 bg-primary-500 text-white px-2">
              Primary Color (buttons and links)
            </div>
            <div class="mt-3 bg-secondary-500 text-white px-2">
              Secondary Color (titles)
            </div>
            <div class="mt-3 bg-tertiary-500 text-white px-2">
              Tertiary Color (special)
            </div>

            <div class="mt-4 font-mono">Headings</div>
            <div class="space-y-1">
              <H1>Heading 1 (page)</H1>
              <H2>Heading 2 (section)</H2>
              <H3>Heading 3 (sub-section)</H3>
              <H4>Heading 4 (sub-sub-section)</H4>
            </div>

            <div class="mt-4 font-mono">Text</div>
            <div class="space-y-1">
              <p class="font-light">Light text. This is light text.</p>
              <p>Normal text. This is just normal text.</p>
              <p class="font-semibold">
                Semi-bold text should be slightly bolded.
              </p>
              <p class="font-bold">Bold text is bolder</p>
              <NuxtLink class="bot-href">This is a text link</NuxtLink>
            </div>
          </div>
        </div>

        <!-- light mode -->
        <div class="w-1/2 p-4 bot-bg-color dark bot-text-color">
          <div class="font-mono text-2xl">Light Mode Preview</div>
        </div>
      </div>
    </div>
  </div>
</template>
