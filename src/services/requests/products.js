import { api } from '../api';

export const getAllProducts = (limit, page) => {
    return api.get(`/products/?limit=${limit}&page=${page}`);
}