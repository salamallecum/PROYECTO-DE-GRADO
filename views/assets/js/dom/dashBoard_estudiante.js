//Script que carga los graficos del dashboard del estudiante
import "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js";

//FUNCION QUE DIBUJA EL GRAFICO DE PERFILAMIENTO PANDORA EN EL EPORTAFOLIO
function dibujarGraficoPerfilamientoPandora(){

    var ctx = document.getElementById("grafPerfPandora");
    var myChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ["Noble lider", "Virtuoso tecnológico", "Explorador", "Maestro de los procesos"],
            datasets: [{
                label: 'Estudiante',
                data: [25, 80, 40, 70],
                backgroundColor: 'rgba(87,35,100, .6)',
                borderColor: [
                    'rgba(87,35,100, 1)',
                ],
                borderWidth: 3
            }]
        },
    });
}

//INVOCACION DE FUNCIONES
dibujarGraficoPerfilamientoPandora();
