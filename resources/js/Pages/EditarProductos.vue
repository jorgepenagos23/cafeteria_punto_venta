<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref, onMounted } from 'vue';

// Define una variable reactiva para almacenar el ID del producto

</script>

<template>
  <div>
    <Estadisticas />

    <!-- Contenido de tu vista -->
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
      <Head title="Cedac" />

      <AuthenticatedLayout>
        <template #header>
          <v-toolbar title="Edita el  Productos" color="light-green-darken-4  ">
            <v-toolbar-items>
              <v-btn>Administracion 
                {{ $page.props.producto.id }}
              </v-btn>
            </v-toolbar-items>

            <v-divider class="mx-2" vertical></v-divider>

            <v-btn icon="mdi-dots-vertical"></v-btn>
          </v-toolbar>

          <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
          <v-container>
            <div class="leading-loose">
              <form
                @submit.prevent="UpdateProducto"
                class="max-w-7xl m-4 p-10 bg-white rounded shadow-xl"
              >
                <p class="text-gray-800 font-medium">Captura el producto</p>
                <div class="">
                  <label class="block text-sm text-gray-00" for="cus_name"></label>
                  <v-text-field
                    v-model="nombre_producto"
                    :label="$page.props.producto.nombre_producto"
                  ></v-text-field>
                </div>
                <div class="mt-2">
                  <v-text-field
                    v-model="tipo_producto"
                    :label="$page.props.producto.tipo_producto"
                  ></v-text-field>
                </div>

                <div class="mt-2">
                  <label class="block text-sm text-gray-600" for="cus_email"
                    >Proveedor</label
                  >
                  <v-text-field
                    v-model="Proveedor"
                    :label="$page.props.producto.Proveedor"
                  ></v-text-field>
                </div>
                <div class="mt-2">
                  <v-text-field
                    v-model="cantidad_almacen"
                    :label="$page.props.producto.cantidad_almacen"
                  ></v-text-field>
                </div>
                <div class="mt-2">
                  <v-text-field
                    v-model="descripcion"
                    :label="$page.props.producto.descripcion"
                  ></v-text-field>
                </div>

                <div class="mt-6">
                  <v-text-field
                    :label="$page.props.producto.fecha_caducidad"
                    required
                    v-model="fecha_caducidad"
                    type="date"
                    variant="solo"
                    class="w-full px-4 py-2"
                  ></v-text-field>
                </div>
                <div class="mt-2">
                  <label class="block text-sm text-gray-600" for="cus_email"
                    >Precio de Venta al publico</label
                  >

                  <v-text-field
                    v-model="precio"
                    :label="$page.props.producto.precio"
                  ></v-text-field>
                </div>

                <div class="mt-4">
                  <button
                    @click="Update"
                    class="middle none center mr-4 rounded-lg bg-green-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    data-ripple-light="true"
                  >
                    Agregar
                  </button>
                  <button
                    @click="vaciarProducto"
                    class="middle none center mr-4 rounded-lg bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    data-ripple-light="true"
                  >
                    Vaciar
                  </button>
                </div>
              </form>
            </div>
          </v-container>
        </template>
        <v-card> </v-card>
      </AuthenticatedLayout>
    </div>
  </div>
</template>

<style>
.mycard {
  /* width: 1400px; Eliminado */
  justify-content: center;
  text-align: center;
  position: absolute;
  top: 30%;
  left: 0;
  right: 0;
  transform: translateY(-50%);
  background-color: rgba(255, 255, 255, 0.9);
  z-index: -2;
}
</style>
<script>

export default {
  created() {
    this.showProducto();

  },

  components: {},

  methods: {

    showProducto(id) {

      console.log("Desde crud edicion");
    },

    vaciarProducto() {
      // Vaciar los campos asignándoles valores nulos o vacíos
      this.nombre_producto = null;
      this.tipo_producto = null;
      this.Proveedor = null;
      this.cantidad_almacen = null;
      this.descripcion = null;
      this.fecha_caducidad = null;
      this.precio = null;
      this.tipo_producto_key += 1;
    },

    UpdateProducto() {
        const currentURL = window.location.pathname;

// Dividir la URL en partes usando "/" como separador
const parts = currentURL.split("/");

// El ID del producto es el último segmento de la URL
const idProducto = parts[parts.length - 1];

console.log("ID del producto:", idProducto);
      const producto = {
        nombre_producto: this.nombre_producto,
        tipo_producto: this.tipo_producto,
        Proveedor: this.Proveedor,
        cantidad_almacen: this.cantidad_almacen,
        descripcion: this.descripcion,
        disponibilidad: true,
        codigo_barras: "codigo",
        precio: this.precio,
        fecha_caducidad: this.fecha_caducidad,
      };

      console.log(producto);

      axios
  .put(`/api/v1/editar-producto/${idProducto}`, producto) // Usar ${} para interpolar el valor de idProducto
  .then((res) => {
    console.log(res);
    alert("Producto Actualizado con éxito");
  })
  .catch((err) => {
    alert(err);
    console.error(err);
  });


    },
  },

  data() {
    return {
      ProductoMostrar: [],

      tipo_producto_key: 0,
      nombre_producto: null,
      tipo_producto: "",
      Proveedor: null,
      imagen: "",
      cantidad_almacen: null,
      descripcion: null,
      disponibilidad: true,
      codigo_barras: null,
      precio: null,
      fecha_caducidad: null,
    };
  },
};
</script>

<style scoped></style>
