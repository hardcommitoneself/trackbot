export default defineEventHandler(event => {
    const config = useRuntimeConfig();
    const query = useQuery(event);
    return $fetch(`/meets/${event.context.params.meet}`, { baseURL: config.API_BASE_URL });
});
