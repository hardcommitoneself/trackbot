export default defineEventHandler(event => {
    const query = useQuery(event);
    return $fetch(`http://localhost:8000/api/v1/meets?filter[name]=${query.name}&filter[is_sanctioned]=${query.is_sanctioned}`);
});