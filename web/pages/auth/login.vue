<template>
    <NuxtLayout name="guest">
        <JetAuthenticationCard>
            <template #logo>
                <CoreVLogoType class="h-16 sm:h-18 md:h-20" />
            </template>
            <form>
                <CoreInputsVInput v-model="email" id="email" class="block mt-1 w-full" type="email" name="email" label="Email" placeholder="Enter your email" required />
                
                <CoreInputsVInput v-model="password" id="password" class="block mt-4 w-full" type="password" name="password" label="Password" placeholder="Enter your password" required/>
                
                <div class="block mt-4" >
                    <label for="remember_me" class="flex items-center" >
                        <JetCheckbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm" >Remember me</span >
                    </label >
                </div >

                <div class="flex items-center justify-end mt-4" >
                    <NuxtLink class="bot-href">Forgot your password?</NuxtLink>

                    <button type="submit" class="bot-button ml-4" @click="login">Log in</button>
                </div >
            </form >
        </JetAuthenticationCard>
    </NuxtLayout>
</template>
<script setup>
const { $api } = useNuxtApp();
const auth = useAuth();

const email = ref("");
const password = ref("");

const login = async (e) => {
    if(document.querySelector('form').checkValidity()) {
        e.preventDefault();
        try {
            await $api().post("/login", { email: email.value, password: password.value });
            
            const response = await $api().get("/user");
            auth.value = response.data;
            
            navigateTo("/meets");
        } catch (error) {
            throw error;
        }
    }
}

definePageMeta({
    layout: false,
})
</script>