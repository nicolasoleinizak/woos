<template>
  <div class="table-loader">
    <vue-element-loading
      class="table-loader-spinner"
      :active="true"
      spinner="spinner"
      background-color="rgba(255,255,255,0.5)"
    ></vue-element-loading>
    <div class="table-loader-table" style="grid-template-columns: 3fr 1fr">
      <template v-for="n in rows" v-bind:key="n">
        <div
          class="table-loader-cell"
          v-for="m in columns"
          v-bind:key="m"
        ></div>
      </template>
    </div>
  </div>
</template>

<script>
import VueElementLoading from "vue-element-loading";

export default {
  components: {
    VueElementLoading,
  },
  props: ["rows", "columnsTemplate", "columns"],
};
</script>

<style>
.table-loader {
  width: 100%;
  height: 100%;
  position: relative;
}
.table-loader-table {
  height: 100%;
  width: 100%;
  display: grid;
  grid-gap: 5px;
  margin: 20px auto;
  opacity: 0.4;
}
.table-loader-cell {
  display: inline-block;
  width: 100%;
  height: 20px;
  border-radius: 5px;
  background-color: rgb(200, 200, 200);
}
</style>
