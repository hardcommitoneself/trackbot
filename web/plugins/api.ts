import axios from "axios"

export default defineNuxtPlugin(() => {
    const config = useRuntimeConfig();
    
    const api = axios.create({
        baseURL: "http://localhost:8000",
        withCredentials: true
    })

    return {
        provide: {
            api: () => api
        }
    }
})