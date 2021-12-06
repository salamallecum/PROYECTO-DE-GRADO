//Script que carga los graficos del dashboard del profesor
import "https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js";

//FUNCION QUE DIBUJA EL GRAFICO DE COMP GENERALES VS ACTIVIDADES
function compGeneralesVsActividades(){

    //Obtenemos la referencia del canvas
    const $graficaActivYCompGenerales = document.getElementById("graficaCompGeneralVsActividades");
    //Etiquetas del eje X
    const etiquetas = ["CG-1", "CG-2", "CG-3", "CG-4", "CG-5", "CG-6", "CG-7", "CG-8", "CG-9", "CG-10", "CG-11", "CG-12"]
    //Podemos tener varios conjuntos de datos
    
    const datosEventos = {
        label: "Eventos",
        data: [20, 60, 56, 78, 89, 13, 3, 43, 12, 88, 34, 8],
        backgroundColor: '#87cb16',
        borderColor: '#87cb16',
        borderWidth: 1,
    };

    const datosConvEternas = {
        label: "Convocatorias",
        data: [5, 33, 11, 67, 10, 18, 8, 77, 2, 76, 98, 45],
        backgroundColor: '#f5841f',
        borderColor: '#f5841f',
        borderWidth: 1,
    };    


    new Chart($graficaActivYCompGenerales, {
        type: 'bar',
        data: {
            labels: etiquetas,
            datasets: [
                datosEventos,
                datosConvEternas
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
            },
        }
    });
}

//FUNCION QUE DIBUJA EL GRAFICO DE COMP ESPECIFICAS VS ACTIVIDADES
function compEspecificasVsActividades(){

    //Obtenemos la referencia del canvas
    const $graficaActivYCompGenerales = document.getElementById("graficaCompEspecificaVsActividades");
    //Etiquetas del eje X
    const etiquetas = ["CE-3.1", "CE-3.2", "CE-3.3", "CE-3.4", "CE-3.5"]
    //Podemos tener varios conjuntos de datos
    
    const datosEventos = {
        label: "Eventos",
        data: [43, 12, 88, 34, 8],
        backgroundColor: '#87cb16',
        borderColor: '#87cb16',
        borderWidth: 1,
    };

    const datosConvEternas = {
        label: "Convocatorias",
        data: [77, 2, 76, 98, 45],
        backgroundColor: '#f5841f',
        borderColor: '#f5841f',
        borderWidth: 1,
    };    


    new Chart($graficaActivYCompGenerales, {
        type: 'bar',
        data: {
            labels: etiquetas,
            datasets: [
                datosEventos,
                datosConvEternas
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
            },
        }
    });
}

//FUNCION QUE DIBUJA EL GRAFICO DEL PROMEDIO DE ESTUDIANTES QUE HAN OBTENIDO CADA UNO DE LOS ROLES PANDORA
function rolesPandora(){

    const $graficaContribucionCompgenerales = document.getElementById("graficaPorcentajeRolesPandora");
    const etiquetas = ["Noble lider", "Virt. tecnológico", "Maestro de procesos", "Explorador"]
    const datosEstudiantes = {
        label: "Promedio de estudiantes",
        data: [500, 340, 103, 73],

        backgroundColor: [
            '#03FCDE',
            '#12FC03',
            '#9203FC',
            '#BE6C30'
        ], //Color de fondo

        borderColor: [
            '#03FCDE',
            '#12FC03',
            '#9203FC',
            '#BE6C30'
        ],
        borderWidth: 1,
    };

    new Chart($graficaContribucionCompgenerales, {
        type: 'pie', //Tipo de gráfica
        data: {
            labels: etiquetas,
            datasets: [
                datosEstudiantes
            ]
        },
    });
}

//FUNCION QUE DIBUJA EL GRAFICO DEL BALANCE DE EPORTAFOLIOS PUBLICADOS EN PANDORA
function balanceDeEportafolios(){

    //Obtenemos la referencia del canvas
    const $ctx = document.getElementById("graficaBalanceDeEportafolios");
    //Etiquetas del eje X
    const etiquetas = ["0", "13/02/2021", "18/03/2021", "30/04/2021", "08/05/2021", "04/06/2021", "20/07/2021", "18/08/2021", "15/09/2021", "12/10/2021", "05/11/2021"]
    //Podemos tener varios conjuntos de datos
    
    const datosEportafolios = {
        label: "N° e-portafolios",
        data: [3, 8, 12, 13, 20, 34, 56, 60, 78, 88, 89, 112],
        borderColor: '#87cb16',
        borderWidth: 3,
    }; 

    new Chart($ctx, {
        type: 'line',
        data: {
            labels: etiquetas,
            datasets: [
                datosEportafolios
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }],
            },
        }
    });
}

//INVOCACION DE FUNCIONES
compGeneralesVsActividades();
compEspecificasVsActividades();
rolesPandora();
balanceDeEportafolios();