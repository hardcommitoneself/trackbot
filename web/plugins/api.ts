import axios from "axios"

export default defineNuxtPlugin(() => {
    const config = useRuntimeConfig();
    
    const api = axios.create({
        baseURL: config.API_BASE_URL,
        withCredentials: true
    })

    return {
        provide: {
            api: () => api
        }
    }
})