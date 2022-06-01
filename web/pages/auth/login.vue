<template>
    <NuxtLayout name="guest">
        <JetAuthenticationCard>
            <template #logo>
                <CoreVLogoType class="h-16 sm:h-18 md:h-20" />
            </template>

            <form method="POST" action="/api/v1/login" >
                <CoreInputsVInput id="email" class="block mt-1 w-full" type="email" name="email" label="Email" placeholder="Enter your email" required />
                
                <CoreInputsVInput id="password" class="block mt-4 w-full" type="password" name="password" label="Password" placeholder="Enter your password" required/>
                
                <div class="block mt-4" >
                    <label for="remember_me" class="flex items-center" >
                        <JetCheckbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm" >Remember me</span >
                    </label >
                </div >

                <div class="flex items-center justify-end mt-4" >
                    <NuxtLink class="bot-href">Forgot your password?</NuxtLink>

                    <NuxtLink class="bot-button ml-4">Log in</NuxtLink>
                </div >
            </form >
        </JetAuthenticationCard>
    </NuxtLayout>
</template>
<script setup>
definePageMeta({
    layout: false
})
</script>