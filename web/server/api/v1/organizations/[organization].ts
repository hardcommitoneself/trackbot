export default defineEventHandler(event => $fetch(`http://localhost:8000/api/v1/organizations/${event.context.params.organization}`));
