<template>
  <h1>{{ title }}</h1>
  <label
    >Filas por página:
    <select v-model="limit">
      <option value="5">5</option>
      <option value="10">10</option>
      <option value="20">20</option>
      <option value="50">50</option>
      <option value="100">100</option>
    </select></label
  >
  <div class="products-list" template v-if="loadingState == 'ready'">
    <span>Nombre</span><span>Precio</span>
    <template v-for="product in products" v-bind:key="product.id">
      <span>{{ product.name }}</span
      ><span>{{ product.price }}</span>
    </template>
  </div>
  <template v-if="loadingState == 'loading'">
    <table-loader :columns="2" columnsTemplate="3fr 1fr" :rows="limit" />
  </template>
  <div id="page-selector">
    <v-pagination v-model="page" :pages="10" :range-size="1" />
  </div>
</template>

<script>
import { getAllProducts as getAllProductsService } from "../services/requests/products";
import VPagination from "@hennge/vue3-pagination";
import "@hennge/vue3-pagination/dist/vue3-pagination.css";
import TableLoader from "../components/TableLoader.vue";

export default {
  components: {
    VPagination,
    TableLoader,
  },

  data() {
    return {
      title: "Productos",
      products: [],
      limit: 10,
      page: 1,
      loadingState: "loading",
    };
  },

  methods: {
    getAllProducts() {
      this.loadingState = "loading";
      getAllProductsService(this.limit, this.page).then((response) => {
        console.log(response);
        this.products = response.data.content.products.map((items) => {
          return {
            id: items.id,
            name: items.title,
            price: items.price,
          };
        });
        this.loadingState = "ready";
      });
    },
  },

  created() {
    this.getAllProducts();
  },

  watch: {
    page: {
      handler() {
        this.getAllProducts();
      },
    },
    limit: {
      handler() {
        this.getAllProducts();
      },
    },
  },
};
</script>

<style>
.products-list {
  width: 100%;
  display: grid;
  grid-template-columns: 3fr 1fr;
  grid-gap: 3px;
  margin: 20px auto;
}
</style>
