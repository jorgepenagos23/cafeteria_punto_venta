<template>
  <v-app>
    <!-- Barra de herramientas -->
    <v-app-bar color="teal darken-4">Software de Venta </v-app-bar>

    <div style="display: flex">
      <!-- Div izquierdo -->
      <div style="flex: 1">
        <div class="max-w-6xl mx-0.5 sm:px-2 lg:px-4">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">Bienvenido al Punto de Venta</div>
          </div>
          <div class="bg-white p-10">
            <v-container>
              <v-combobox
                clearable
                chips
                label="Tipo de Pago"
                v-model="metodo_pago"
                :items="['DEBITO', 'SPEI', 'Oxxo', 'Credito']"
              ></v-combobox>
            </v-container>

            <v-text-field
              v-model="search"
              label="Buscar"
              hide-details
              prepend-inner-icon="mdi-magnify"
            ></v-text-field>
          </div>
        </div>

        Contenido del lado izquierdo
        <v-container fluid>
          <v-row>
            <v-col
              cols="8"
              md="6"
              lg="4"
              v-for="(item, index) in filtrarBusqueda"
              :key="index"
            >
              <v-card class="mb-12">
                <v-img src="https://picsum.photos/200" alt="Product Image"></v-img>
                <v-card-text>
                  <h3 class="text-lg font-semibold">Nombre: {{ item.Nombre }}</h3>
                  <p class="text-sm mt-2 text-gray-700">Tipo: {{ item.Tipo }}</p>
                  <p class="text-sm mt-2 text-gray-700">Precio: {{ item.Precio }}</p>
                  <p class="text-sm mt-2 text-gray-700">Stock :{{ item.Stock }}</p>

                  <div class="mt-4 flex justify-between items-center">
                    <BR></BR>
                    <br />
                    <v-btn
                      @click="agregarCarrito(item)"
                      append-icon="mdi mdi-cart"
                      color="yellow"
                      dark
                      >Agregar al pedido</v-btn
                    >
                  </div>
                </v-card-text>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
      </div>

      <!-- Div derecho -->
      <div style="flex: 1">
        Contenido del lado derecho
        <div class="max-w-5xl mx-0.5 sm:px-2 lg:px-4">
          <div class="bg-white p-20">
            <v-container> </v-container>
          </div>
        </div>

        <v-sheet class="mx-auto align-self-start" max-width="600" rounded="xl" border>
          <v-card subtitle="Cajero"> {{ $page.props.auth.user.name }}</v-card>

          <div class="pa-4">
            <div class="text-h6">Resumen de Pedido</div>
            <div class="text-subtitle-1">Hacer Pedido</div>

            <v-responsive class="overflow-y-auto" max-height="280">
              <v-chip-group class="mt-3" column>
                <v-btn color="grey" v-for="(item, index) in carrito" :key="index">
                  Producto: {{ item.Nombre }}
                  <v-btn size="x-small" color="green">
                    Cantidad : {{ item.cantidad }}
                  </v-btn>
                </v-btn>
              </v-chip-group>

              <v-text-field label="Detalles" v-model="detalles"> </v-text-field>
            </v-responsive>
          </div>

          <v-divider></v-divider>

          <div class="pa-2">
            <v-btn
              @click="RealizarPedido"
              color="orange-darken-1"
              rounded="t-0 b-xl"
              size="x-large"
              text="Realizar Pedido"
              variant="elevated"
              block
            ></v-btn>
            <br />
            <div class="boton-vaciar">
              <v-btn
                color="red"
                prepend-icon=" mdi-trash-can-outline"
                @click="vaciarPedido"
              >
                Vaciar Carro</v-btn
              >
            </div>
          </div>
        </v-sheet>
      </div>
    </div>

    <div class="py-12 mt-auto"></div>
    <div class="mt-auto grid grid-cols-2 gap-2">
      <div></div>
    </div>
  </v-app>
</template>

<style>
.boton-vaciar {
  text-align: center;
}
</style>

<script>
import axios from "axios";
import { parse } from "vue/compiler-sfc";

export default {
  data() {
    return {
      search: "",
      metodo_pago: null,
      detalles: null,
      carrito: [], //Proudctos seleccionados para el carrito
      items: [],
      topics: ["🌮 Food", "😂 Funny"],
      productos: [], // mi lista de productos
    };
  },
  created() {
    this.productos = this.obtenerProductos(); //llamar productos
  },

  computed: {
    filtrarBusqueda() {
      if (!this.search) return this.productos;
      return this.productos.filter((producto) =>
        producto.Nombre.toLowerCase().includes(this.search.toLowerCase())
      );
    },
  },
  methods: {
    RealizarPedido() {
      // Verificar si hay productos en el carrito
      if (this.carrito.length === 0) {
        alert("No hay productos seleccionados");
        return;
      }

      const idProducto = this.carrito.reduce(
        (total, item) => total + parseInt(item.id),
        0
      );

      const cantidad_requerida = this.carrito.reduce(
        (total, item) => total + parseInt(item.cantidad),
        0
      );

      const pedido = {
        nombre_cajero: this.$page.props.auth.user.name,
        fecha: "2001-11-28 03:28:44",
        detalles: this.detalles,
        metodo_pago: this.metodo_pago,
        cantidad_requerida: cantidad_requerida,
        idProducto: idProducto,
      };

      console.log("idProducto", idProducto);
      console.log("cantidad requerida", cantidad_requerida);

      console.log("pedido es ", pedido);
      // Enviar el pedido al servidor
      axios
        .post("/api/v1/crear-venta/", pedido)
        .then((res) => {
          alert("Pedido realizado con éxito", res.data);
        })
        .catch((err) => {
          console.log(err);
        });
    },

    agregarCarrito(producto) {
      const index = this.carrito.findIndex((item) => item.id == producto.id);
      if (index !== -1) {
        this.carrito[index].cantidad++;
      } else {
        this.carrito.push({ ...producto, cantidad: 1 });
      }
    },

    vaciarPedido() {
      this.carrito = [];
      this.detalles = [];
    },

    obtenerProductos() {
      axios
        .get("/api/v1/productos")
        .then((response) => {
          this.productos = response.data.productos;
          console.log(this.productos);
        })
        .catch((err) => {
          console.error(err);
        });
    },

    calculateTotal(item) {
      return (item.precio * item.cantidad).toFixed(2);
    },

    generarProductos() {
      const productos = [];
      for (let i = 0; i <= 10; i++) {
        productos.push({
          id: i,
          name: `Producto ${i}`,
          description: `Descripcion del producto  ${i}`,
          price: (Math.random() * (100 - 1) + 1).toFixed(2),
          quantity: 1,
        });
      }
      return productos;
    },
  },
};
</script>

<style></style>
