//Script que carga los graficos del dashboard del profesor
import "https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js";

//FUNCION QUE DIBUJA EL GRAFICO DE COMP GENERALES VS NUMERO DE ESTUDIANTES QUE LAS HAN ALCANZADO
function compGeneralVsEstudiantes(){

    //Obtenemos la referencia del canvas
    const $graficaActivYCompGenerales = document.getElementById("graficaCompGeneralVsEstudiantes");
    //Etiquetas del eje X
    const etiquetas = ["CG-1", "CG-2", "CG-3", "CG-4", "CG-5", "CG-6", "CG-7", "CG-8", "CG-9", "CG-10", "CG-11", "CG-12"]
    //Podemos tener varios conjuntos de datos
    const datosEstudiantes = {
        label: "N° de estudiantes",
        data: [50, 15, 80, 51, 33, 16, 70, 45, 25, 90, 11, 6],
        backgroundColor: '#005e6e',
        borderColor: '#005e6e',
        borderWidth: 1,
    };

    new Chart($graficaActivYCompGenerales, {
        type: 'bar',
        data: {
            labels: etiquetas,
            datasets: [
                datosEstudiantes
               
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

//FUNCION QUE DIBUJA EL GRAFICO DE COMP ESPECÍFICAS VS NUMERO DE ESTUDIANTES QUE LAS HAN ALCANZADO
function compEspecificasVsEstudiantes(){

    //Obtenemos la referencia del canvas
    const $graficaActivYCompGenerales = document.getElementById("graficaCompEspecificaVsEstudiantes");
    //Etiquetas del eje X
    const etiquetas = ["CE-2.1", "CE-2.2", "CE-2.3", "CE-2.4"]
    //Podemos tener varios conjuntos de datos
    const datosEstudiantes = {
        label: "N° de estudiantes",
        data: [5, 25, 36, 11, 6],
        backgroundColor: '#87cb16',
        borderColor: '#87cb16',
        borderWidth: 1,
    };  

    new Chart($graficaActivYCompGenerales, {
        type: 'bar',
        data: {
            labels: etiquetas,
            datasets: [
                datosEstudiantes
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

//FUNCION QUE DIBUJA EL GRAFICO DEL PROMEDIO DE ESTUDIANTES QUE HAN OBTENIDO CADA UNO DE LOS NIVELES DE CONTRIBUCIÓN DE UNA COMPETENCIA GENERAL DETERMINADA
function nivelesDeContribucionCompGeneral(){

    const $graficaContribucionCompgenerales = document.getElementById("graficaContribucionCompetenciaGeneral");
    const etiquetas = ["Bajo", "Medio", "Alto"]
    const datosEstudiantes = {
        label: "Promedio de estudiantes",
        data: [500, 340, 103],

        backgroundColor: [
            '#BE6C30',
            '#6D6B6B',
            '#FCE203'
        ], //Color de fondo

        borderColor: [
            '#BE6C30',
            '#6D6B6B',
            '#FCE203'
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

//FUNCION QUE DIBUJA EL GRAFICO DEL PROMEDIO DE ESTUDIANTES QUE HAN OBTENIDO CADA UNO DE LOS NIVELES DE CONTRIBUCIÓN DE UNA COMPETENCIA ESPECIFICA DETERMINADA
function nivelesDeContribucionCompEspecifica(){

    const $graficaContribucionCompgenerales = document.getElementById("graficaContribucionCompetenciaEspecifica");
    const etiquetas = ["Bajo", "Medio", "Alto"]
    const datosEstudiantes = {
        label: "Promedio de estudiantes",
        data: [300, 70, 800],

        backgroundColor: [
            '#BE6C30',
            '#6D6B6B',
            '#FCE203'
        ], //Color de fondo

        borderColor: [
            '#BE6C30',
            '#6D6B6B',
            '#FCE203'
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

//FUNCION QUE DIBUJA EL GRAFICO DE COMP GENERALES VS ACTIVIDADES
function compGeneralesVsActividades(){

    //Obtenemos la referencia del canvas
    const $graficaActivYCompGenerales = document.getElementById("graficaCompGeneralVsActividades");
    //Etiquetas del eje X
    const etiquetas = ["CG-1", "CG-2", "CG-3", "CG-4", "CG-5", "CG-6", "CG-7", "CG-8", "CG-9", "CG-10", "CG-11", "CG-12"]
    //Podemos tener varios conjuntos de datos
    const datosDesafios = {
        label: "Desafíos",
        data: [50, 15, 80, 51, 33, 16, 70, 45, 25, 90, 11, 6],
        backgroundColor: '#005e6e',
        borderColor: '#005e6e',
        borderWidth: 1,
    };

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
                datosDesafios,
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
    const datosDesafios = {
        label: "Desafíos",
        data: [45, 25, 90, 11, 6],
        backgroundColor: '#005e6e',
        borderColor: '#005e6e',
        borderWidth: 1,
    };

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
                datosDesafios,
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

//INVOCACION DE FUNCIONES
compGeneralVsEstudiantes();
compEspecificasVsEstudiantes();
nivelesDeContribucionCompGeneral();
nivelesDeContribucionCompEspecifica();
compGeneralesVsActividades();
compEspecificasVsActividades();