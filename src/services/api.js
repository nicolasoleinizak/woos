import axios from "axios";

/* Creating an axios instance with the baseURL and headers. */
export const api = axios.create({
  baseURL: "http://localhost:81/woos/public/api",
  headers: {
    "Access-Control-Allow-Origin": "*",
    "Content-Type": "application/json",
    'Accept': "application/json",
  },
});
