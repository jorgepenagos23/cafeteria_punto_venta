<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Grafica from "@/Pages/Grafica.vue";
import Consulta2 from '@/Pages/Consulta2.vue';
import Consulta3 from '@/Pages/Consulta3.vue';
</script>

<template>
  <Head title="Dashboard" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modulo Gerencial</h2>
      <v-container>
        <div class="px-4 mb-2">
            <v-chip-group class="bg-red">
               <v-chip>
                <v-dialog max-width="800">
                    <template v-slot:activator="{ props: activatorProps }">
                      <v-btn
                        v-bind="activatorProps"
                        color="surface-variant"
                        text="3 PrODUCTOS MAS VENDIDOS "
                        variant="flat"
                        prepend-icon=" mdi-coffee-to-go-outline"
                      ></v-btn>
                    </template>

                    <template v-slot:default="{ isActive }">
                      <v-card title=" Consulta de 3 Productos Mas Vendidos">
                        <v-card-text>
                            <Consulta2></Consulta2>
                        </v-card-text>

                        <v-card-actions>
                          <v-spacer></v-spacer>

                          <v-btn text="Cerrar Consulta" @click="isActive.value = false"></v-btn>
                        </v-card-actions>
                      </v-card>
                    </template>
                  </v-dialog>
               </v-chip>


              <v-chip >
                <v-dialog max-width="800">
                    <template v-slot:activator="{ props: activatorProps }">
                      <v-btn
                        v-bind="activatorProps"
                        color="surface-variant"
                        text="Grafica "
                        variant="flat"
                        prepend-icon="mdi-chart-box-multiple-outline"
                      ></v-btn>
                    </template>

                    <template v-slot:default="{ isActive }">
                      <v-card title="Dialog">
                        <v-card-text>

                          <Grafica></Grafica>
                        </v-card-text>

                        <v-card-actions>
                          <v-spacer></v-spacer>

                          <v-btn text="Cerrar Consulta" @click="isActive.value = false"></v-btn>
                        </v-card-actions>
                      </v-card>
                    </template>
                  </v-dialog>


            </v-chip>

            <v-chip>
                <v-dialog max-width="1200">
                    <template v-slot:activator="{ props: activatorProps }">
                        <v-btn
                          v-bind="activatorProps"
                          color="surface-variant"
                          text="Consulta por Fechas "
                          variant="flat"
                          prepend-icon="mdi-chart-box-multiple-outline"
                        ></v-btn>
                      </template>

                      <template v-slot:default="{ isActive }">
                        <v-card title="Dialog">
                          <v-card-text>

                            <Consulta3></Consulta3>
                          </v-card-text>

                          <v-card-actions>
                            <v-spacer></v-spacer>

                            <v-btn text="Cerrar Consulta" @click="isActive.value = false"></v-btn>
                          </v-card-actions>
                        </v-card>
                      </template>

                </v-dialog>


            </v-chip>


            </v-chip-group>
          </div>



          <v-col cols="auto">
            <v-row align="center" justify="center">
                <BR>
                </BR>


            </v-row>
          </v-col>


      </v-container>
    </template>


    <v-card> </v-card>

    <v-card color="blue-grey-lighten-5 " flat>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
          <v-data-table
            :headers="headers"
            :items="VentasconProducto"
            :search="search"
          ></v-data-table>
        </div>
      </div>
    </v-card>
  </AuthenticatedLayout>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      search: "",
      headers: [
        {
          align: "start",
          key: "name",
          sortable: false,
        },
        { key: "Id_Venta", title: "Id Venta" },
        { key: "Nombre del Cajero", title: "Cajero " },
        { key: "fecha", title: "Fecha" },
        { key: "DetallesVenta", title: "Detalles de Venta" },
        { key: "Cantida Comprada", title: "Cantidad Despachada" },
        { key: "Total Pagado", title: "Total pagado" },
        { key: "Metodo de Pago", title: "Metodo de Pago" },
        { key: "nombre_producto", title: "Producto" },
      ],

      VentasconProducto: [],
    };
  },

  created() {
    this.obtenerConsultaProductos();
  },

  methods: {
    obtenerConsultaProductos() {
      axios
        .get("/api/v1/ventaspunto/todo/")
        .then((response) => {
          this.VentasconProducto = response.data.VentasconProducto;
          console.log(this.VentasconProducto);
        })
        .catch((err) => {
          console.error(err);
        });
    },
  },
};
</script>
