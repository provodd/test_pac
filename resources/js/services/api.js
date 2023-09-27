import api from "./axios";

export async function getShips() {
    const response = await api.post('/api/ships/get');
    return response;
}
export async function getShip(id) {
    const response = await api.post(`/api/ships/get/${id}`);
    return response;
}
export async function getCabins(id) {
    const response = await api.post(`/api/ships/getCabins/${id}`);
    return response;
}
export async function getGallery(id) {
    const response = await api.post(`/api/ships/getGallery/${id}`);
    return response;
}
export async function updateSpecifications(id, object) {
    const response = await api.post(`/api/ships/updateSpecifications/${id}`, object);
    return response;
}
export async function updateDescription(id, object) {
    const response = await api.post(`/api/ships/updateDescription/${id}`, object);
    return response;
}
export async function getCabin(id) {
    const response = await api.post(`/api/cabins/get/${id}`);
    return response;
}
export async function updateCabin(id, object) {
    const response = await api.post(`/api/cabins/update/${id}`, object);
    return response;
}
