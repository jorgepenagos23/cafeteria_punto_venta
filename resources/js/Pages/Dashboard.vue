<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">Bienvenido al Punto de Venta</div>
        </div>

        <div class="menu">
          <v-card class="" color="indigo">
            <v-card-title> Punto de Venta </v-card-title>
          </v-card>


          <v-row dense>
            <v-col>
                <v-card color="white
                ">
                    <div class="d-flex flex-no-wrap justify-space-between">
                      <div>
                        <v-card-title class="text-h5"></v-card-title>

                        <v-card-subtitle>Operativa</v-card-subtitle>

                        <v-btn
                        class="text-none text-subtitle-3"
                        color="#5865f2"
                        size="x-large"
                        variant="tonal"
                        link href="/modulo_punto_venta"
                      >
                        Entrar
                      </v-btn>

                      </div>

                      <v-avatar class="ma-3" rounded="0" size="125">
                        <v-img
                          src="https://cdn3.iconfinder.com/data/icons/point-of-interest-1/96/cafe-1024.png"
                        ></v-img>
                      </v-avatar>
                    </div>
                  </v-card>


              <br />
            </v-col>
          </v-row>


        </div>

        <div>
          <v-card class="" color="purple-darken-4          ">
            <v-card-title> Administracion </v-card-title>
          </v-card>

          <br />
          <v-row dense>
            <v-col>
                <v-card color="white
                ">
                    <div class="d-flex flex-no-wrap justify-space-between">
                      <div>
                        <v-card-title class="text-h5"></v-card-title>

                        <v-card-subtitle>Administracion</v-card-subtitle>


                        <v-btn
                        class="text-none text-subtitle-3"
                        color="#5865f2"
                        size="x-large"
                        variant="tonal"
                        link href="/productos"
                      >
                        Entrar
                      </v-btn>
                      </div>

                      <v-avatar class="ma-3" rounded="0" size="125">
                        <v-img
                          src="https://th.bing.com/th/id/OIP.Z8HqFHhn2fvgIxUhS4UsUAHaHa?rs=1&pid=ImgDetMain"
                        ></v-img>
                      </v-avatar>
                    </div>
                  </v-card>


              <br />
            </v-col>
          </v-row>

        </div>

        <div class="menu-gerencia">
          <v-card
            class=""
            color="blue-grey lighten-4
                  "
          >
            <v-card-title> Gerencia </v-card-title>
          </v-card>

          <br />
          <v-row dense>
            <v-col>
                <v-card color="white
                ">
                    <div class="d-flex flex-no-wrap justify-space-between">
                      <div>
                        <v-card-title class="text-h5"> </v-card-title>

                        <v-card-subtitle>Gerencia</v-card-subtitle>
                        <v-btn
                        class="text-none text-subtitle-3"
                        color="#5865f2"
                        size="x-large"
                        variant="tonal"
                        link href="/gerencia"
                      >
                        Entrar
                      </v-btn>
                      </div>

                      <v-avatar class="ma-3" rounded="0" size="125">
                        <v-img
                          src="https://th.bing.com/th/id/OIP.IfZ0tayzbVuwCfxceflhIwHaHa?rs=1&pid=ImgDetMain"
                        ></v-img>
                      </v-avatar>
                    </div>
                  </v-card>


              <br />
            </v-col>
          </v-row>

        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style>
.menu {
  background-color: rgb(248, 248, 234);
}
.menu-administracion {
  background-color: rgb(1, 233, 98);
}

.menu-gerencia {
  background-color: rgb(236, 228, 229);
}
</style>

<script>
export default {
  methods: {},
};
</script>
