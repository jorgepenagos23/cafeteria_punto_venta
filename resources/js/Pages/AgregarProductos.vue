<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <div>
        <Estadisticas />
        <!-- Contenido de tu vista -->
        <div class="max-w-7xl mx-auto p-6 lg:p-8">

            <Head title="Cedac" />
            <AuthenticatedLayout>
                <template #header>
                    <v-toolbar title="Registrar Nuevos Productos" color="light-green-darken-4
          ">
                        <v-toolbar-items>
                            <v-btn>Administracion</v-btn>
                        </v-toolbar-items>

                        <v-divider class="mx-2" vertical></v-divider>

                        <v-btn icon="mdi-dots-vertical"></v-btn>
                    </v-toolbar>

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
                    <v-container>
                        <div class="leading-loose">
                            <form @submit.prevent="agregarProducto"
                                class="max-w-7xl m-4 p-10 bg-white rounded shadow-xl">
                                <p class="text-gray-800 font-medium">Captura el producto</p>
                                <div class="">
                                    <label class="block text-sm text-gray-00" for="cus_name"></label>
                                    <v-text-field v-model="nombre_producto" label="Nombre"></v-text-field>
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="tipo_producto">Tipo de
                                        Producto</label>
                                    <select id="tipo_producto" v-model="tipo_producto"

                                    :key="tipo_producto_key"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" disabled selected>Elige el tipo</option>
                                        <option value="Snack">Snack</option>
                                        <option value="Comida">Comida</option>
                                        <option value="Cafe">Cafe</option>
                                        <option value="Bebida">Bebida</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="cus_email">Proveedor</label>
                                    <v-text-field v-model="Proveedor" label="Proveedor"></v-text-field>

                                </div>
                                <div class="mt-2">
                                    <v-text-field v-model="cantidad_almacen" label="Cantidad Almacen"></v-text-field>
                                </div>
                                <div class="mt-2">
                                    <v-text-field v-model="descripcion" label="Descripcion"></v-text-field>
                                </div>
                                <div class="mt-2">
                                    <v-text-field v-model="imagen" label="Imagen"></v-text-field>
                                </div>

                                <div class="mt-6">
                                    <v-text-field label="Fecha de Caducidad" required v-model="fecha_caducidad"
                                        type="date" variant="solo" class="w-full px-4 py-2"></v-text-field>


                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="cus_email">Precio de Venta al
                                        publico</label>
                                    <v-text-field v-model="precio" label="Precio"></v-text-field>
                                </div>


                                <div class="mt-4">
                                    <button
                                        class="middle none center mr-4 rounded-lg bg-green-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        data-ripple-light="true">
                                        Agregar
                                    </button>
                                    <button
                                        @click="vaciarProducto"
                                        class="middle none center mr-4 rounded-lg bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        data-ripple-light="true">
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
    },

    components: {
    },

    methods: {

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


        agregarProducto() {
            const producto = {
                nombre_producto: this.nombre_producto,
                tipo_producto: this.tipo_producto,
                Proveedor: this.Proveedor,
                imagen: this.imagen,
                cantidad_almacen: this.cantidad_almacen,
                descripcion: this.descripcion,
                disponibilidad: true,
                codigo_barras: 'codigo',
                precio: this.precio,
                fecha_caducidad: this.fecha_caducidad,

            }

            console.log(producto);

            axios.post('/api/v1/crear-producto', producto)
                .then(res => {
                    console.log(res)

                    alert('Producto Agregado con exito');
                })
                .catch(err => {
                    alert(err);
                    console.error(err);
                })

        },

    },

    data() {
        return {
            tipo_producto_key: 0,
            nombre_producto: null,
            tipo_producto: '',
            Proveedor: null,
            imagen: '',
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
