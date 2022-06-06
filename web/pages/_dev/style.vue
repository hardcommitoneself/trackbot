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
          Icons -
          <a class="bot-href" target="_blank" href="https://heroicons.com"
            >heroicons</a
          >. Use outlines. space-x-1 between icon and text.
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

            <div class="mt-9 font-mono">Colors</div>
            <div class="mt-3 bg-primary-500 text-white px-2">
              Primary Color (buttons and links)
            </div>
            <div class="mt-3 bg-secondary-500 text-white px-2">
              Secondary Color (titles)
            </div>
            <div class="mt-3 bg-tertiary-500 text-white px-2">
              Tertiary Color (selected / special)
            </div>

            <div class="mt-9 font-mono">Headings</div>
            <div class="space-y-1">
              <CoreHeaderH1>Heading 1 (page)</CoreHeaderH1>
              <CoreHeaderH2>Heading 2 (section)</CoreHeaderH2>
              <CoreHeaderH3>Heading 3 (sub-section)</CoreHeaderH3>
              <CoreHeaderH4>Heading 4 (sub-sub-section)</CoreHeaderH4>
            </div>

            <div class="mt-9 font-mono">Text</div>
            <div class="space-y-1">
              <p class="font-light">Light text. This is light text.</p>
              <p>Normal text. This is just normal text.</p>
              <p class="font-semibold">
                Semi-bold text should be slightly bolded.
              </p>
              <p class="font-bold">Bold text is bolder</p>
              <NuxtLink class="bot-href">This is a text link</NuxtLink>
            </div>

            <div class="mt-9 font-mono">Buttons</div>
            <p>
              Use default for all actions. Alt to be use for secondary actions
              like cancel. Danger for data loss operations.
            </p>
            <div class="mt-1 flex items-center space-x-4">
              <NuxtLink class="bot-button">Button</NuxtLink>
              <NuxtLink class="bot-alt-button">Alt Button</NuxtLink>
              <NuxtLink class="bot-danger-button">
                <div class="flex items-center space-x-1">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                    />
                  </svg>
                  <p>Danger</p>
                </div>
              </NuxtLink>
            </div>
            <div class="mt-9 font-mono">Forms</div>
            <!-- Core input component -->
            <CoreInputsVInput id="dark-base-input" name="dark-base-input" label="Form Label" type="text" placeholder="bot-base-input"/>
            <CoreInputsVInput class="mt-3" id="dark-base-input-required" name="dark-base-input-required" label="Form Label(required)" type="text" placeholder="bot-base-input-required" required/>
            <CoreInputsVInput class="mt-3" id="dark-base-input-with-errors" name="dark-base-input-with-errors" label="Form Label(error)" type="text" placeholder="bot-base-input--with-errors" errors="This is test error"/>
            
            <CoreInputsVSelect class="mt-3" v-model="modelOption" label="Form Select" :options="options"/>
            <CoreInputsVSelect class="mt-3" v-model="modelOption" label="Form Select(Required)" :options="options" required/>

            <div class="mt-3">
              <label>FORM DROPDOWN</label>
              <CoreInputsVDropdown :items="items"/>
            </div>

            <CoreInputsVSlider class="mt-3" v-model="modelSliderEnabled" label="Form Slider"/>

            <div class="mt-3">
              Current selected radio: {{ modelRadio1 }}
              <CoreInputsVRadio v-model="modelRadio1" name="dark-base-input-radio" label="Form Radio Group" :options="radios"/>
            </div>
          </div>
        </div>

        <!-- light mode -->
        <div class="w-1/2 p-4 bot-bg-color bot-text-color">
          <div class="font-mono text-2xl">Light Mode Preview</div>
          <div class="mt-9 font-mono">Colors</div>
          <div class="mt-3 bg-primary-500 text-white px-2">
            Primary Color (buttons and links)
          </div>
          <div class="mt-3 bg-secondary-500 text-white px-2">
            Secondary Color (titles)
          </div>
          <div class="mt-3 bg-tertiary-500 text-white px-2">
            Tertiary Color (selected / special)
          </div>

          <div class="mt-9 font-mono">Headings</div>
          <div class="space-y-1">
            <CoreHeaderH1>Heading 1 (page)</CoreHeaderH1>
            <CoreHeaderH2>Heading 2 (section)</CoreHeaderH2>
            <CoreHeaderH3>Heading 3 (sub-section)</CoreHeaderH3>
            <CoreHeaderH4>Heading 4 (sub-sub-section)</CoreHeaderH4>
          </div>

          <div class="mt-9 font-mono">Text</div>
          <div class="space-y-1">
            <p class="font-light">Light text. This is light text.</p>
            <p>Normal text. This is just normal text.</p>
            <p class="font-semibold">
              Semi-bold text should be slightly bolded.
            </p>
            <p class="font-bold">Bold text is bolder</p>
            <NuxtLink class="bot-href">This is a text link</NuxtLink>
          </div>

          <div class="mt-9 font-mono">Buttons</div>
          <p>
            Use default for all actions. Alt to be use for secondary actions
            like cancel. Danger for data loss operations.
          </p>
          <div class="mt-1 flex items-center space-x-4">
            <NuxtLink class="bot-button">Button</NuxtLink>
            <NuxtLink class="bot-alt-button">Alt Button</NuxtLink>
            <NuxtLink class="bot-danger-button">
              <div class="flex items-center space-x-1">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-4 w-4"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                  />
                </svg>
                <p>Danger</p>
              </div>
            </NuxtLink>
          </div>
          <div class="mt-9 font-mono">Forms</div>
          <!-- Core input component -->
          <CoreInputsVInput id="ligth-base-input" name="ligth-base-input" label="Form Label" type="text" placeholder="bot-base-input"/>
          <CoreInputsVInput class="mt-3" id="ligth-base-input-required" name="ligth-base-input-required" label="Form Label(required)" type="text" placeholder="bot-base-input-required" required/>
          <CoreInputsVInput class="mt-3" id="light-base-input-with-errors" name="light-base-input-with-errors" label="Form Label(error)" type="text" placeholder="bot-base-input--with-errors" errors="This is test error"/>

          <CoreInputsVSelect class="mt-3" v-model="modelOption" label="Form Select" :options="options"/>
          <CoreInputsVSelect class="mt-3" v-model="modelOption" label="Form Select(Required)" :options="options" required/>

          <div class="mt-3">
            <label class="bot-input-label flex items-center space-x-1">FORM DROPDOWN</label>
            <CoreInputsVDropdown :items="items"/>
          </div>

          <CoreInputsVSlider class="mt-3" v-model="modelSliderEnabled" label="Form Slider"/>

          Current selected radio: {{ modelRadio2 }}
          <CoreInputsVRadio v-model="modelRadio2" name="light-base-input-radio" label="Form Radio Group" :options="radios"/>

          <CoreInputsVRichEditor class="mt-3" value=""/>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref } from 'vue'

const options = [
  'A', 'B', 'C'
];

const items = [
  'Item A', 'Item B', 'Item C'
]

const radios = [
  'Radio A', 'Radio B', 'Radio C'
];

const modelOption = ref(options[0]);

const modelSliderEnabled = ref(false);

const modelRadio1 = ref(1);
const modelRadio2 = ref(0);

</script>
