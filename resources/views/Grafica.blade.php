<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Más Vendidos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div class="container">
        <canvas id="graficaProductos" width="900" height="200"></canvas>

    </div>

    <script>
        // Realizar la solicitud a la API
        axios.get('api/v1/productos/masvendidos')
            .then(response => {
                const datosProductos = response.data.ProductoMasVendido;

                // Extraer los nombres de los productos y los totales pagados
                const nombresProductos = datosProductos.map(producto => producto.nombre_producto);
                const totalesPagados = datosProductos.map(producto => producto.TotalPagado);

                // Crear la gráfica de barras
                const ctx = document.getElementById('graficaProductos').getContext('2d');
                const graficaProductos = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: nombresProductos,
                        datasets: [{
                            label: 'Grafica de Ventas de Productos',
                            data: totalesPagados,
                            backgroundColor: 'rgb(192, 57, 43)     ', // Color de las barras
                            borderColor: 'rgb(252, 7, 7 ) ', // Color del borde de las barras
                            borderWidth: 3
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true // Comenzar el eje y desde cero
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Productos Más Vendidos'
                            },
                            animation: {
                                duration: 1500, // Duración de la animación en milisegundos
                                easing: 'easeInOutQuart' // Tipo de animación
                            }
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error al obtener los datos de la API:', error);
            });
    </script>
</body>


</html>
