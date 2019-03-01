/*------------------------------------------------------
    Author : www.webthemez.com
    License: Commons Attribution 3.0
    http://creativecommons.org/licenses/by/3.0/
---------------------------------------------------------  */
$(function() {
/*(function ($) {*/
    "use strict";
    var mainApp = {

        initFunction: function () {
            /*MENU 
            ------------------------------------*/
            $('#main-menu').metisMenu();
			
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

            /* MORRIS BAR CHART
			-----------------------------------------*/
            Morris.Bar({
                element: 'morris-bar-chart',
                data: [{
                    y: '2006',
                    a: 100,
                    b: 90
                }, {
                    y: '2007',
                    a: 75,
                    b: 65
                }, {
                    y: '2008',
                    a: 50,
                    b: 40
                }, {
                    y: '2009',
                    a: 75,
                    b: 65
                }, {
                    y: '2010',
                    a: 50,
                    b: 40
                }, {
                    y: '2011',
                    a: 75,
                    b: 65
                }, {
                    y: '2012',
                    a: 100,
                    b: 90
                }],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Series A', 'Series B'],
                hideHover: 'auto',
                resize: true
            });

            /* MORRIS DONUT CHART
			----------------------------------------*/
            Morris.Donut({
                element: 'morris-donut-chart',
                data: [{
                    label: "Download Sales",
                    value: 12
                }, {
                    label: "In-Store Sales",
                    value: 30
                }, {
                    label: "Mail-Order Sales",
                    value: 20
                }],
                resize: true
            });

            /* MORRIS AREA CHART
			----------------------------------------*/

            Morris.Area({
                element: 'morris-area-chart',
                data: [{
                    period: '2010 Q1',
                    iphone: 2666,
                    ipad: null,
                    itouch: 2647
                }, {
                    period: '2010 Q2',
                    iphone: 2778,
                    ipad: 2294,
                    itouch: 2441
                }, {
                    period: '2010 Q3',
                    iphone: 4912,
                    ipad: 1969,
                    itouch: 2501
                }, {
                    period: '2010 Q4',
                    iphone: 3767,
                    ipad: 3597,
                    itouch: 5689
                }, {
                    period: '2011 Q1',
                    iphone: 6810,
                    ipad: 1914,
                    itouch: 2293
                }, {
                    period: '2011 Q2',
                    iphone: 5670,
                    ipad: 4293,
                    itouch: 1881
                }, {
                    period: '2011 Q3',
                    iphone: 4820,
                    ipad: 3795,
                    itouch: 1588
                }, {
                    period: '2011 Q4',
                    iphone: 15073,
                    ipad: 5967,
                    itouch: 5175
                }, {
                    period: '2012 Q1',
                    iphone: 10687,
                    ipad: 4460,
                    itouch: 2028
                }, {
                    period: '2012 Q2',
                    iphone: 8432,
                    ipad: 5713,
                    itouch: 1791
                }],
                xkey: 'period',
                ykeys: ['iphone', 'ipad', 'itouch'],
                labels: ['iPhone', 'iPad', 'iPod Touch'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true
            });

            /* MORRIS LINE CHART
			----------------------------------------*/
            Morris.Line({
                element: 'morris-line-chart',
                data: [{
                    y: '2006',
                    a: 100,
                    b: 90
                }, {
                    y: '2007',
                    a: 75,
                    b: 65
                }, {
                    y: '2008',
                    a: 50,
                    b: 40
                }, {
                    y: '2009',
                    a: 75,
                    b: 65
                }, {
                    y: '2010',
                    a: 50,
                    b: 40
                }, {
                    y: '2011',
                    a: 75,
                    b: 65
                }, {
                    y: '2012',
                    a: 100,
                    b: 90
                }],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Series A', 'Series B'],
                hideHover: 'auto',
                resize: true
            });
           
     
        },

        initialization: function () {
            mainApp.initFunction();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.initFunction();
    });

	//OrangeSoft//
	
	var habitacion = document.querySelector('#room');
	var cama = document.querySelector('#bed');
	var comida = document.querySelector('#meal');
	var ingreso = document.querySelector('#entry');
	var salida = document.querySelector('#exit');
	var resumen = document.querySelector('.total');
	var btnCalcular = document.querySelector('#calculate');
	var btnReservar = document.querySelector('#reservate');
	
	btnReservar.disabled = true;
	
	$('#calculate').on('click', calcularServicios);
		
	
	function calcularServicios(e) {
		e.preventDefault();
		var room = habitacion.value;
		var bed = cama.value;
		var meal = comida.value;
		var entry = new Date(ingreso.value);
		var exit = new Date(salida.value);
		console.log(entry);
		var vlrRoom = 0;
		console.log(room);
		
		switch(room){
			case 'Superior Room': vlrRoom = 320;
				break;
			case 'Deluxe Room': vlrRoom = 220;
				break;
			case 'Guest House': vlrRoom = 180;
				break;
			case 'Single Room': vlrRoom = 150;
				break;
			default: vlrRoom = 0;
		}
		console.log(vlrRoom);
		
		console.log(bed);
		
		switch(bed){
			case 'Single': var vlrBed = vlrRoom * 1/100;
				break;
			case 'Double': vlrBed = vlrRoom * 2/100;
				break;
			case 'Triple': vlrBed = vlrRoom * 3/100;
				break;
			case 'Quad': vlrBed = vlrRoom * 4/100;
				break;
			default: vlrBed = 0;
		}
		console.log(vlrBed);
		
		console.log(meal);
		
		switch(meal){
			case 'Room only': var vlrMeal = vlrBed * 0;
				break;
			case 'Breakfast': vlrMeal = vlrBed * 2;
				break;
			case 'Half Board': vlrMeal = vlrBed * 3;
				break;
			case 'Full Board': vlrMeal = vlrBed * 4;
				break;
			default: vlrMeal = 0;
		}
		console.log(vlrMeal);
		
		var fechas = exit.getTime()- entry.getTime();
		var cantDias = Math.round(fechas/(1000*60*60*24));
		console.log(cantDias);
		var total_room = vlrRoom * cantDias;
		var total_bed = vlrBed * cantDias;
		var total_meal = vlrMeal * cantDias;
		var total = total_room + total_bed + total_meal;
		console.log(total_room);
		console.log(total_bed);
		console.log(total_meal);
		console.log(total);
		
		document.querySelector('#vlrRoom').innerHTML = total_room.toFixed(2);
		document.querySelector('#vlrBed').innerHTML = total_bed.toFixed(2);
		document.querySelector('#vlrMeal').innerHTML = total_meal.toFixed(2);
		document.querySelector('#vlrTotal').innerHTML = total.toFixed(2);
		
		resumen.style.display = 'block';
		btnReservar.disabled = false;
		btnCalcular.disabled = true;
	}
	
/*}(jQuery));*/
});
