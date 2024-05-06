<script setup>
import { Head, Link } from "@inertiajs/vue3";

import Icon from "../../../public/imagenes/Logo.svg";
defineProps({
  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
  laravelVersion: {
    type: String,
    required: true,
  },
  phpVersion: {
    type: String,
    required: true,
  },
});
</script>

<template>
  <Head title="Welcome" />

  <div
    class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-gradient-to-r from-emerald-500 to-emerald-900"
  >
    <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
      <Link
        v-if="$page.props.auth.user"
        :href="route('dashboard')"
        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
      >
        Dashboard</Link
      >

      <template v-else>
        <Link
          :href="route('login')"
          class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >
          Punto de Venta</Link
        >

        <Link
          v-if="canRegister"
          :href="route('register')"
          class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >
        </Link>
      </template>
    </div>

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
      <div class="flex justify-center">
        <div>
          <img
            src="https://4.bp.blogspot.com/-7z3MRUAR9FQ/XcSec0rK_AI/AAAAAAAAAFY/bkmrjEVWhb4MPjRxpp8RvSdeOpIs3tZWQCK4BGAYYCw/s1600/Logo.png"
          />
        </div>
      </div>

      <div class="mt-16">
        <div class="container">
          <div
            class="bannerFondo bg-green-800 bg-left-top bg-auto bg-repeat-x"
            style="background-image: url(./img/continuartl_4.png)"
          ></div>
          <div class="container-logo">
            <div class="-mt-64">
              <div class="w-full text-center">
                <p class="text-sm tracking-widest text-white">CAFE</p>
                <h1 class="font-bold text-5xl text-white">
                  DE CHIAPAS PARA EL MUNDO
                </h1>
              </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
              <div class="p-2 sm:p-10 text-center cursor-pointer">
                <div
                  class="py-16 max-w-sm rounded overflow-hidden shadow-lg hover:bg-white transition duration-500 bg-white"
                >
                  <div class="space-y-10">
                    <i class="fa fa-spa" style="font-size: 48px"></i>

                    <div class="px-6 py-4">
                      <div class="space-y-5">
                        <div class="font-bold text-xl mb-2">
                          Cafe 100% de Chiapas
                        </div>
                        <p class="text-gray-700 text-base">Cafe Organico</p>
                        <img
                          src="https://th.bing.com/th/id/R.19fe5bd10c1d1ab474f4e7160ac4517b?rik=Ph3YEu3jjqVwkw&riu=http%3a%2f%2fwww.todochiapas.mx%2fwp-content%2fuploads%2f2012%2f04%2fgranos_de_cafe_con_una_taza-wide.jpg&ehk=aUDgo0ALBJckQseNDyrpF29%2byzQ9ENeSGtgDp%2fVcDHw%3d&risl=&pid=ImgRaw&r=0"
                          alt=""
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="p-2 sm:p-10 text-center cursor-pointer text-white">
                <div
                  class="py-16 max-w-sm rounded overflow-hidden shadow-lg bg-orange-500 hover:bg-orange-600 transition duration-500"
                >
                  <div class="space-y-10">
                    <i class="fa fa-head-side-mask" style="font-size: 48px"></i>
                    <div class="px-6 py-4">
                      <div class="space-y-5">
                        <div class="font-bold text-xl mb-2">
                          Platillos Unicos
                        </div>
                        <p class="text-base">
                          Altos estandares de bioseguridad
                        </p>
                        <img
                          src="https://th.bing.com/th/id/OIP.Sji71YWLfHIKgi4dyRd6MQAAAA?rs=1&pid=ImgDetMain"
                          alt=""
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="p-2 sm:p-10 text-center cursor-pointer translate-x-2">
                <div
                  class="py-16 max-w-sm rounded overflow-hidden shadow-lg hover:bg-white transition duration-500 bg-white"
                >
                  <div class="space-y-10">
                    <i class="fa fa-swimmer" style="font-size: 48px"></i>

                    <div class="px-6 py-4">
                      <div class="space-y-5">
                        <div class="font-bold text-xl mb-2">Ambiente</div>
                        <p class="text-gray-700 text-base">Instalaciones</p>
                        <img
                          src="https://th.bing.com/th/id/OIP.9AAinTB706TFNbp8NimkmwHaFA?rs=1&pid=ImgDetMain"
                          alt=""
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div
        class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between"
      >
        <div class="text-center text-sm sm:text-start">&nbsp;</div>

        <div
          class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-end sm:ms-0"
        >
          Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.container {
  margin-top: 20%;
}

.container-logo {
  margin-top: 30%;
}

.bg-dots-darker {
  background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
  .dark\:bg-dots-lighter {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
  }
}
</style>
<script>
export default {
  data() {
    return {
      Icon: Icon,
    };
  },
};
</script>
