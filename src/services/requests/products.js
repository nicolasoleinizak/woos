import { api } from "../api";

/**
 * This function will return a promise that will resolve to the response of the API call to the
 * /products endpoint with the limit and page query parameters.
 * @param limit - the number of products to return
 * @param page - The page number to fetch.
 * @returns A promise.
 */
export const getAllProducts = (limit, page) => {
  return api.get(`/products/?limit=${limit}&page=${page}`);
};
