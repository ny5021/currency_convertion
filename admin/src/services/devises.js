import axiosClient from "../axios";

export async function devisesFetchAll() {
    const response = await axiosClient.get('/devises');
    return response.data;
}


export async function pairesFetchAll() {
    const response = await axiosClient.get('/paires');
    return response.data;
}

export async function pairesFetchOne(from_devise, to_devise) {
    const response = await axiosClient.get(`/paires/${from_devise}/${to_devise}`);
    return response.data
}

export async function paireCreate(from_devise, to_devise, value) {
    const response = await axiosClient.post('/paires', {
        from_devise: from_devise,
        to_devise: to_devise,
        value: value
    });
    return response.data
}

export async function paireUpdate(from_devise, to_devise, value) {
    const response = await axiosClient.put(`/paires/${from_devise}/${to_devise}`, {
        value
    });
    return response.data
}

export async function paireRemove(paire) {
    const response = await axiosClient.delete(`/paires/${paire.from_devise}/${paire.to_devise}`);
    return response.data
}