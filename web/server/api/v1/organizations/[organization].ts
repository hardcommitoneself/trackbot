export default defineEventHandler(event => {
    const config = useRuntimeConfig();
    const query = useQuery(event);
    return $fetch(`/organizations/${event.context.params.organization}`, { baseURL: config.API_BASE_URL });
});
