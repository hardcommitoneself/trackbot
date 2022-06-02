<template>
  <div>
    <NuxtPage />
  </div>
</template>

<script setup>
  const { $api } = useNuxtApp();
  const auth = useAuth();

  // Check current user is authenticated.
  try {
    await $api().get("/sanctum/csrf-cookie");

    const response = await $api().get("/user");
    auth.value = response.data;
    auth.value.isAuthenticated = true;
  } catch (error) {
    auth.value.id = 0;
    auth.value.uuid = "";
    auth.value.first_name = "";
    auth.value.last_name = "";
    auth.value.email = "";
    auth.value.email_verified_at = null;
    auth.value.timezone = "";
    auth.value.profile_photo_path = "";
    auth.value.default_organization_id = null;
    auth.value.distance_system = "";
    auth.value.isAuthenticated = false;
  }

  useHead({
    bodyAttrs: {
      class: "font-sans bot-bg-and-text antialiased min-h-screen bot-page-max-w"
    }
  })
</script>
