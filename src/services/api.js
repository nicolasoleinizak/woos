import axios from "axios";

export const api = axios.create({
  baseURL: "http://localhost/woos/public/api",
  headers: {
    "Access-Control-Allow-Origin": "*",
    "Content-Type": "application/json",
    Accept: "application/json",
  },
});
