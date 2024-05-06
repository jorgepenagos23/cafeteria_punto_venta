<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
  <Head title="Dashboard" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Listado de Productos de KFE
      </h2>
      <v-container>
        <v-row align="center" justify="center">
          <v-col cols="auto">
            <v-btn
              link
              href="/agregar-productos"
              color="green"
              append-icon="mdi-plus-circle-outline"
              >Agregar Producto</v-btn
            >
          </v-col>
        </v-row>
      </v-container>
    </template>
    <v-card> </v-card>

    <v-card color="blue-grey-lighten-5 " flat>
      <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
          <v-card title="Barra de Busqueda">
            <template v-slot:text>
              <v-text-field
                v-model="search"
                label="Buscar productos"
                prepend-inner-icon="mdi-magnify"
                variant="outlined"
                hide-details
                single-line
              ></v-text-field>
            </template>
          </v-card>

          <v-data-table :items="productos" :search="search">
            <template v-slot:thead>
              <tr></tr>
            </template>

            <template #item="{ item }">
              <tr>
                <td>{{ item.id }}</td>
                <td>{{ item.Nombre }}</td>
                <td>{{ item.Tipo }}</td>
                <td>{{ item.Proveedor }}</td>
                <td>{{ item.Stock }}</td>
                <td>{{ item.Descripcion }}</td>
                <td>{{ item.Disponibilidad }}</td>
                <td>{{ item.Codigo }}</td>
                <td>{{ item.Precio }}</td>
                <td>{{ item.Caducidad }}</td>
                <td>
                  <v-btn color="blue" 
                  @click="showProducto(item.id)">Editar</v-btn>
                </td>
                <td>
                  <v-btn color="error" @click="eliminarProducto(item.id)">Eliminar</v-btn>
                </td>
              </tr>

            </template>
          </v-data-table>
        </div>
      </div>
    </v-card>
  </AuthenticatedLayout>
</template>

<style>
.v-data-table .v-data-table__cell {
  color: black; /* Cambia el color del texto a negro */
}
</style>
<script>
import axios from "axios";

export default {
  data() {
    return {
      search: "",
    editarDialog1:false,
      productos: [],
    };
  },

  created() {
    this.obtenerConsultaProductos();
  },

  methods: {
    obtenerConsultaProductos() {
      axios
        .get("/api/v1/productos/")
        .then((response) => {
          this.productos = response.data.productos;
          console.log(this.productos);
        })
        .catch((err) => {
          console.error(err);
        });
    },



    showProducto(id){

        axios.get(`api/v1/editar/${id}`)

        .then(res => {
            const idProducto = res.data.ProductoMostrar.id;
            console.log('Id del producto',idProducto)
            this.$inertia.visit(`/editar/productos/${id}`);

            console.log(res)
        })
        .catch(err => {
            console.error(err); 
        })
    },


    editarProducto(id){

    
    },

    eliminarProducto(id){

      
        console.log(id)
        
        axios.delete(`api/v1/eliminar-producto/${id}`)
        .then(function (response) {
            alert('Me has eliminado',response);
            console.log(response)
        })
        .catch(function (error) {
            alert('Hubo un error Producto no encontrado',error);
        })

    },

  },
};
</script>
