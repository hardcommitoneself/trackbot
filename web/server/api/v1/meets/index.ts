export default defineEventHandler(event => {
    const config = useRuntimeConfig();
    const query = useQuery(event);
    return $fetch(`/meets?filter[name]=${query.name}&filter[is_sanctioned]=${query.is_sanctioned}`, { baseURL: config.API_BASE_URL });
});
