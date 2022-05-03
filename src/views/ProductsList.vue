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
  <div class="shopping-area">
    <div id="products-list" template v-if="loadingState == 'ready'">
      <span class="table-title">Nombre</span><span class="table-title">Precio</span><span class="table-title">Agregar</span>
      <template v-for="product in products" v-bind:key="product.id">
        <span>{{ product.name }}</span>
        <span>{{ product.price }}</span>
        <button @click="() => { addToCart(product.id) }">+</button>
      </template>
    </div>
    <template v-if="loadingState == 'loading'">
      <table-loader :columns="3" columnsTemplate="3fr 1fr 1fr" :rows="limit" />
    </template>
    <div id="page-selector">
      <v-pagination v-model="page" :pages="10" :range-size="1" />
    </div>
  </div>

  <div id="order-area" class="shopping-area" v-if="shoppingList.length > 0">
    <h2>Tu compra</h2>
    <ul id="order-menu">
      <li @click="activeOrderTab = 'items'">Carrito</li>
      <li @click="activeOrderTab = 'personalData'">Datos</li>
      <li @click="activeOrderTab = 'paymentAndShipping'">Opciones de pago y envío</li>
    </ul>
    <div id="cart-items-list" class="order-tab" v-if="activeOrderTab == 'items'">
      <span class="table-title">Cantidad</span><span class="table-title">Producto</span><span class="table-title">Precio unitario</span><span class="table-title">Precio total</span>
      <template v-for="product in shoppingList" v-bind:key="product.id">
        <input type="number" v-model="product.quantity"/>
        <span>{{ product.name }}</span>
        <span>{{ product.price }}</span>
        <span>{{ product.price * product.quantity }}</span>
      </template>
    </div>
    <div id="cart-personal-data" class="order-tab" v-if="activeOrderTab == 'personalData'">
      <h3>Facturación</h3>
      <label>Nombre: <input type="text" v-model="order.billing.firstName"/></label>
      <label>Apellido: <input type="text" v-model="order.billing.lastName"/></label>
      <label>Dirección 1:<input type="text" v-model="order.billing.address1"/></label>
      <label>Dirección 2:<input type="text" v-model="order.billing.address2"/></label>
      <label>Ciudad:<input type="text" v-model="order.billing.city"/></label>
      <label>Estado:<input type="text" v-model="order.billing.state"/></label>
      <label>Código postal:<input type="text" v-model="order.billing.postcode"/></label>
      <label>País:<input type="text" v-model="order.billing.country"/></label>
      <label>Email:<input type="text" v-model="order.billing.email"/></label>
      <label>Número de teléfono:<input type="text" v-model="order.billing.phone"/></label>
      <h3>Datos de envío</h3>
      <label>Nombre: <input type="text" v-model="order.shipping.firstName"/></label>
      <label>Apellido: <input type="text" v-model="order.shipping.lastName"/></label>
      <label>Dirección 1:<input type="text" v-model="order.shipping.address1"/></label>
      <label>Dirección 2:<input type="text" v-model="order.shipping.address2"/></label>
      <label>Ciudad:<input type="text" v-model="order.shipping.city"/></label>
      <label>Estado:<input type="text" v-model="order.shipping.state"/></label>
      <label>Código postal:<input type="text" v-model="order.shipping.postcode"/></label>
      <label>País:<input type="text" v-model="order.shipping.country"/></label>
    </div>
  </div>
  <div id="payment-and-shipping-data" class="order-tab" v-if="activeOrderTab == 'paymentAndShipping'">

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
      shoppingList: [],
      activeOrderTab: 'items',
      order: {
        billing: {
          firstName: '',
          lastName: '',
          address1: '',
          address2: '',
          city: '',
          state: '',
          postcode: '',
          country: '',
          email: '',
          phone: ''
        },
        shipping: {
          firstName: '',
          lastName: '',
          address1: '',
          address2: '',
          city: '',
          state: '',
          postcode: '',
          country: ''
        }
      }
    };
  },


  methods: {
    addToCart(id){
      let selectedProduct =  this.products.find( item => {
        return item.id = id;
      });
      console.log(selectedProduct);
      this.shoppingList.push({quantity: 0,...selectedProduct});
    },
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
.shopping-area{
  width: 100%;
  border-radius: 20px;
  padding: 20px;
  background-color: rgb(255,255,200);
  margin: 20px auto;
}
#products-list {
  width: 100%;
  display: grid;
  grid-template-columns: 8fr 4fr 1fr;
  grid-gap: 3px;
  margin: 20px auto;
}
#order-menu{
  width: 100%;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
}
#order-menu li{
  list-style: none;
  padding: 10px;
  text-align: center;
}
#order-menu li:hover{
  background-color: rgba(0,0,0,0.2);
}
#cart-items-list{
  width: 100%;
  display: grid;
  grid-template-columns: 1fr 4fr 2fr 2fr;
  grid-gap: 3px;
  margin: 20px auto;
}
.table-title{
  font-weight: 800;
}
</style>
