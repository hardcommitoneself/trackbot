<template>
  <nav>
    <!-- Primary Navigation Menu -->
    <div class="px-4">
      <div class="flex justify-between h-16">
        <div class="flex">
          <!-- Logo -->
          <div class="flex items-center">
            <a href="#">
              <v-logo-type class="hidden sm:block h-9"></v-logo-type>
              <v-logo class="block sm:hidden h-9"></v-logo>
            </a>
            <!-- SEARCH -->
            <div class="pt-1 ml-4">
              <span class="inline-block relative">
                <button
                  aria-label="Search for anything"
                  aria-haspopup="true"
                  class="py-1.5 px-1 text-gray-600 bg-white hover:bg-gray-100 border border-gray-300 dark:hover:bg-gray-800 dark:border-gray-600 dark:bg-gray-700 text-xs rounded-lg transition"
                  @click="openSearchModal = true"
                >
                  <i
                    class="fa-solid fa-lg fa-magnifying-glass text-gray-400 px-1 pt-px"
                  ></i>
                </button>
              </span>

              <div
                :class="{
                  'fixed z-10 inset-0 overflow-y-auto': openSearchModal,
                }"
              >
                <div
                  :class="{
                    'relative flex items-end justify-center m-auto py-4 px-4 text-center sm:block':
                      openSearchModal,
                  }"
                >
                  <!-- Background overlay -->
                  <div
                    v-if="openSearchModal"
                    class="fixed inset-0 transition-opacity"
                  >
                    <div class="absolute inset-0 bg-gray-500 opacity-50"></div>
                  </div>
                  <transition name="bot-transition-seach-modal">
                    <div
                      id="search-modal"
                      v-if="openSearchModal"
                      v-click-outside="closeSearchModal"
                      class="absolute top-14 inset-x-0 p-2 mx-auto lg:w-3/4 origin-center z-50"
                    >
                      <v-card-base
                        class="border dark:border-none border-gray-300 px-4"
                      >
                        <div class="flex items-center justify-between">
                          <v-h4>Search</v-h4>
                          <div>
                            <button
                              @click="openSearchModal = false"
                              type="button"
                              class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            >
                              <svg
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                              >
                                <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"
                                ></path>
                              </svg>
                            </button>
                          </div>
                        </div>
                        <div>
                          <main-command-palette />
                        </div>
                        <div class="text-sm py-2 my-2">
                          Schools by name, mascot, or city
                        </div>
                      </v-card-base>
                    </div>
                  </transition>
                </div>
              </div>
            </div>
            <v-mode-toggle />
            <div>
              <v-mark-distances-in-selector />
            </div>
          </div>
        </div>
        <div class="flex items-center space-x-3">
          <div class="flex items-center space-x-3">
            <div>
              <!-- TODO: Org selector -->
            </div>

            <div class="hidden sm:flex sm:items-center">
              <!-- TODO: Authenticate -->
              <NuxtLink
                v-if="!isAuthenticated"
                class="bot-href"
                @click="isAuthenticated = true"
                >Login</NuxtLink
              >

              <!-- Settings Dropdown -->
              <div v-else class="mt-1 relative">
                <jet-dropdown align="right" width="48">
                  <template #trigger>
                    <div class="flex items-center">
                      <!-- TODO: Check Jetstream mangesProfilePhotos exist -->
                      <button class="flex text-sm rounded-full transition pr-2">
                        <img
                          class="h-8 w-8 rounded-full object-cover"
                          src="~/assets/images/avatar.jpg"
                          alt="Jhon Doe"
                        />
                      </button>
                      <span class="inline-flex rounded-md">
                        <button
                          type="button"
                          class="inline-flex font-semibold hover:text-primary-500 items-center py-2 border border-transparent text-sm leading-4 rounded-md bot-bg-and-text focus:outline-none transition"
                        >
                          Jhon Doe
                          <svg
                            class="-mr-0.5 h-4 w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"
                            />
                          </svg>
                        </button>
                      </span>
                    </div>
                  </template>

                  <template #content>
                    <div class="space-y-1">
                      <jet-dropdown-link
                        href="{{ route('my.home') }}"
                        :active="true"
                      >
                        Home {{ this.$route.name }}
                      </jet-dropdown-link>

                      <!-- TODO: Check auth user id equals 1 -->
                      <jet-dropdown-link href="/nova"> Nova </jet-dropdown-link>

                      <div class="border-t bot-border"></div>

                      <!-- Account Management -->
                      <div
                        class="block px-4 py-2 text-xs font-semibold text-gray-400 uppercase"
                      >
                        Manage Account
                      </div>

                      <jet-dropdown-link href="/profile/view" :active="false">
                        Profile
                      </jet-dropdown-link>

                      <!-- TODO: Check Jetstream hasApiFeatures -->
                      <jet-dropdown-link href="/api-tokens">
                        API Tokens
                      </jet-dropdown-link>

                      <div class="border-t bot-border"></div>

                      <!-- Authentication -->
                      <jet-dropdown-link
                        href="#"
                        @click="isAuthenticated = false"
                      >
                        Log out
                      </jet-dropdown-link>
                    </div>
                  </template>
                </jet-dropdown>
              </div>
            </div>
          </div>

          <!-- Hamburger -->
          <div class="mt-1 -mr-2 flex items-center sm:hidden">
            <button
              @click="openDropdownMenu = !openDropdownMenu"
              class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 dark:hover:bg-gray-800 hover:bg-gray-100 transition"
            >
              <svg
                class="h-6 w-6"
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  :class="{
                    hidden: openDropdownMenu,
                    'inline-flex': !openDropdownMenu,
                  }"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
                <path
                  :class="{
                    hidden: !openDropdownMenu,
                    'inline-flex': openDropdownMenu,
                  }"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <div
      :class="{ block: openDropdownMenu, hidden: !openDropdownMenu }"
      class="sm:hidden"
    >
      <div
        class="py-1 border-t border-b border-gray-300 bg-gray-200 dark:border-gray-700 dark:bg-gray-800"
      >
        <jet-responsive-nav-link :active="false">Login</jet-responsive-nav-link>
      </div>
      <!-- TODO: Autenticate -->
      <!-- Responsive Settings Options -->
      <div
        class="pt-4 pb-1 border-t border-b border-gray-300 bg-gray-200 dark:border-gray-700 dark:bg-gray-800"
      >
        <div class="flex items-center px-4">
          <!-- TODO: Check Jetstream mangesProfilePhotos exist -->
          <div class="shrink-0 mr-3">
            <img
              class="h-10 w-10 rounded-full object-cover"
              src="~/assets/images/avatar.jpg"
              alt="Jhon Doe"
            />
          </div>

          <div>
            <div class="font-semibold text-base">Jhon Doe</div>
            <div class="font-medium text-sm">jhondoe@trackbot.com</div>
          </div>
        </div>

        <div class="mt-3 space-y-1">
          <jet-responsive-nav-link href="/home" :active="true">
            Home
          </jet-responsive-nav-link>

          <!-- TODO: Check auth user id equlas 1 -->
          <jet-responsive-nav-link href="/nova"> Nova </jet-responsive-nav-link>

          <!-- Account Management -->
          <jet-responsive-nav-link href="/profile" :active="false">
            Profile
          </jet-responsive-nav-link>

          <!-- TODO: Check Jetstream hasApiFeatures -->
          <jet-responsive-nav-link href="/api-tokens" :active="false">
            API Tokens
          </jet-responsive-nav-link>

          <!-- Authentication -->
          <jet-responsive-nav-link @click="isAuthenticated = false">
            Log Out
          </jet-responsive-nav-link>

          <!-- Team Management -->
          <!-- TODO: Check Jetstream hasTeamFeatures -->
          <div class="border-t border-gray-200"></div>

          <div class="block px-4 py-2 text-xs text-gray-400">Manage Team</div>

          <!-- Team Settings -->
          <jet-responsive-nav-link
            href="teams/cureentuserteamid"
            :active="false"
          >
            Team Settings
          </jet-responsive-nav-link>

          <!-- TODO: Check Jetstream can create new team modal -->
          <jet-responsive-nav-link href="teams/create" :active="false">
            Create New team
          </jet-responsive-nav-link>

          <div class="border-t border-gray-200"></div>

          <!-- Team Switcher -->
          <div class="block px-4 py-2 text-xs text-gray-400">Switch Team</div>
          <!-- TODO: Add Jet switchable team component -->
        </div>
      </div>
    </div>
  </nav>
</template>
<script>
import { defineComponent } from "vue";
import VClickOutside from "click-outside-vue3";

import VH4 from "../core/header/H4.vue";
import VLogo from "../core/VLogo.vue";
import VLogoType from "../core/VLogoType.vue";
import VCardBase from "../core/cards/VCardBase.vue";
import VModeToggle from "../core/VModeToggle.vue";
import MainCommandPalette from "../main/CommandPalette.vue";
import VMarkDistancesInSelector from "../main/mark/VMarkDistancesInSelector.vue";
import JetResponsiveNavLink from "../jet/JetResponsiveNavLink.vue";
import JetDropdown from "../jet/JetDropdown.vue";
import JetDropdownLink from "../jet/JetDropdownLink.vue";

export default defineComponent({
  directives: {
    clickOutside: VClickOutside.directive,
  },
  data() {
    return {
      openSearchModal: false,
      openDropdownMenu: false,
      isAuthenticated: false,
    };
  },
  methods: {
    closeSearchModal(event) {
      this.openSearchModal = false;
    },
  },
  components: {
    VH4,
    VLogo,
    VLogoType,
    VCardBase,
    VModeToggle,
    MainCommandPalette,
    VMarkDistancesInSelector,
    JetResponsiveNavLink,
    JetDropdown,
    JetDropdownLink,
  },
});
</script>
