import { createRouter, createWebHistory } from "vue-router";
import ProductsList from "../views/ProductsList.vue";
import CreateOrder from "../views/CreateOrder.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/products",
      name: "products",
      component: ProductsList,
    },
    {
      path: "/create_order",
      name: "create order",
      component: CreateOrder,
    },
  ],
});

export default router;
