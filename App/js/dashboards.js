$(document).ready(function() {
	
 //document.getElementById("porc_dif_loc").innerHTML = "<i class=\"fas fa-arrow-down\"></i> 22.9%";

 //document.getElementById("porc_dif_loc").className = "text-danger";
 //porc_dif_loc_ult_mes

  function weekCount(month_number, year) {

    var firstOfMonth = new Date(year, month_number-1, 1);
    var lastOfMonth = new Date(year, month_number, 0);

    var used = firstOfMonth.getDay() + lastOfMonth.getDate();

    return Math.ceil( used / 7);

  }

  function weeksOfMonth(month_number, year) {

    var firstOfMonth = new Date(year, month_number-1, 1);
    var lastOfMonth = new Date(year, month_number, 0);

    var used = firstOfMonth.getDay() + lastOfMonth.getDate();

    var weeksOfMonth = Math.ceil( used / 7);

    var retornoArray = [];

    for(let i = 0; i < weeksOfMonth; i++){
      retornoArray.push((i+1)+'-'+String(month_number).padStart(2, '0'));
    }

    return retornoArray;

  }

  function getDifPercent(x, y) {
    return Math.round(((x / y) - 1) * 100);
  }

  function monthsBetween(...args) {
    let [a, b] = args.map(arg => arg.split("-").slice(0, 2)
                                    .reduce((y, m) => m - 1 + y * 12));
    return Array.from({length: b - a + 1}, _ => a++)
        .map(m => ~~(m / 12) + "-" + ("0" + (m % 12 + 1)).slice(-2) + "-01");
  }

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

	var url = "../../App/Database/dashboards.php";
  //var currentYearDate = new Date('2021-11-20');
  //var lastYearDate = new Date('2021-11-20');
  var currentYearDate = new Date();
  var lastYearDate = new Date();
  lastYearDate.setFullYear(lastYearDate.getFullYear() - 2);

  var filterDate = [lastYearDate.toISOString().slice(0, 10), currentYearDate.toISOString().slice(0, 10)]
  var form = {
        identCall: 'getLocacaoLivros',
        filterStartDate: filterDate[0],
        filterEndDate: filterDate[1]
        };
	$.ajax({ 
		url: url, 
		type: 'POST',
		data: form,
		dataType: 'JSON',
		success: function(data, textStatus, jqXHR) {

      var monthsNameShort = [ 'Jan','Fev','Mar','Abr','Maio','Jun','Jul','Ago','Set','Out','Nov','Dez'];
      //var currentDate = new Date('2021-11-20');
      var currentDate = new Date();
      var currentMonth = (currentDate.getMonth()+1);
      //var currentMonth = ('0'+ (currentDate.getMonth()+1)).slice(-2);
      var currentDateWeekCount = weeksOfMonth(currentMonth, currentDate.getFullYear());
      var currentDateWeeks = weeksOfMonth(currentMonth, currentDate.getFullYear());
      
      //var lastDate = new Date('2021-11-20');
      var lastDate = new Date();
      lastDate.setDate(1);
      lastDate.setMonth(lastDate.getMonth()-1);
      var lastMonth = (lastDate.getMonth()+1);
      var lastDateWeekCount = weeksOfMonth(lastMonth, lastDate.getFullYear());
      var lastDateWeeks = weeksOfMonth(lastMonth, lastDate.getFullYear());
      var labelValues = [];
      var dataValues = [];
      var labelMonthValues = [];
      var dataFirstYearMonthValues = [];
      var dataSecondYearMonthValues = [];
      var dataConv = data.filter(elements => {return elements !== null;});
      var totalMax = 0;
      var totalMonthMax = 0;
      var totalSum = 0;
      var totalSumLastMonth = 0;
      var totalSumCurrentMonth = 0;

      var difPercent = 0;

      for (let i = 0; i < lastDateWeeks.length; i++) {
        let totalWeek = "0";
        let lastMonthYear = lastDate.getFullYear() + "-" + String(lastMonth).padStart(2, '0');

        for(let j=0; j < dataConv.length; j++){
          if(dataConv[j].semana_mes === lastDateWeeks[i] && dataConv[j].ano_mes === lastMonthYear){
            totalWeek = dataConv[j].total_locacao;
            totalSum += parseInt(totalWeek);
            totalSumLastMonth += parseInt(totalWeek);
            totalMax = totalWeek > totalMax ? totalWeek : totalMax;
            break;
          }
        }
        dataValues.push(totalWeek);            
        //labelValues.push( (i + 1) + "-" + currentDate.toLocaleString('default', { month: 'short' }));
        labelValues.push( (i + 1) + "-" + monthsNameShort[lastMonth-1]);
      }      

      for (let i = 0; i < currentDateWeeks.length; i++) {
        let totalWeek = "0";
        let currentMonthYear = currentDate.getFullYear() + "-" + String(currentMonth).padStart(2, '0');
        
        for(let j=0; j < dataConv.length; j++){
          if(dataConv[j].semana_mes === currentDateWeeks[i] && dataConv[j].ano_mes === currentMonthYear){
            totalWeek = dataConv[j].total_locacao;
            totalSum += parseInt(totalWeek);
            totalSumCurrentMonth += parseInt(totalWeek);
            totalMax = totalWeek > totalMax ? totalWeek : totalMax; 
            break;
          }
        }
        dataValues.push(totalWeek);
          
        labelValues.push( (i + 1) + "-" + monthsNameShort[currentMonth-1]);
      }

      totalMax = totalMax * (1 + (20 / 100));
      var mode = 'index';
      var intersect = true;

      difPercent = 0;
      difPercent = getDifPercent(totalSumCurrentMonth, totalSumLastMonth);
      if(difPercent < 0 ){
        document.getElementById("dif_porc_loc_ult_2_mes").innerHTML = "<i class=\"fas fa-arrow-down\"></i>" + difPercent + "%";
        document.getElementById("dif_porc_loc_ult_2_mes").className = "text-danger";
      } else{
        document.getElementById("dif_porc_loc_ult_2_mes").innerHTML = "<i class=\"fas fa-arrow-up\"></i>" + difPercent + "%";
        document.getElementById("dif_porc_loc_ult_2_mes").className = "text-success";
      }
      document.getElementById("total_loc_ult_2_mes").innerHTML = totalSum;

      var currentYearDate = new Date('2021-11-20');
      var lastYearDate = new Date('2021-11-20');
      lastYearDate.setFullYear(lastYearDate.getFullYear() - 1);

      var filterDate = [lastYearDate.toISOString().slice(0, 10), currentYearDate.toISOString().slice(0, 10)]

      var monthsBetweenDates = monthsBetween(filterDate[0],filterDate[1]);

//*********
      for (let i = 0; i < monthsBetween.length; i++) {
        let totalMonth = "0";
        
        for(let j=0; j < dataConv.length; j++){
          if(dataConv[j].ano_mes === monthsBetween[i]){
            totalMonth += dataConv[j].total_locacao;
            totalMonthMax = totalMonth > totalMonthMax ? totalMonth : totalMonthMax; 
            break;
          }
        }
        dataMonthValues.push(totalMonth);
          
        labelMonthValues.push(monthsBetween[i]);
      }
      
//*********

//********* segunda dash
  var currentDate_ = new Date();
  var currentYearMonthsTotalsValues = [];  
  var lastYearMonthsTotalsValues = [];
  var monthsLabels = [];
  var totalSumLastYear = 0;
  var totalSumCurrentYear = 0;
  
  totalSum = 0

  for (let i = 0; i < (currentDate_.getMonth() + 1); i++){

    let currentYearMonth = currentDate_.getFullYear() + "-" + String(i+1).padStart(2, '0');
    let lastYearMonth = (currentDate_.getFullYear() - 1) + "-" + String(i+1).padStart(2, '0');
    let totalMonth = 0;

    //Current Year
    for(let j=0; j < dataConv.length; j++){
      if(dataConv[j].ano_mes === currentYearMonth){
        totalMonth+= parseInt(dataConv[j].total_locacao);
      }
    }

    currentYearMonthsTotalsValues.push(totalMonth);  
    totalSum += totalMonth;
    totalSumCurrentYear += totalMonth;

    totalMonth = 0;

    //Current Year
    for(let j=0; j < dataConv.length; j++){
      if(dataConv[j].ano_mes === lastYearMonth){
        totalMonth+= parseInt(dataConv[j].total_locacao);
      }
    }    

    lastYearMonthsTotalsValues.push(totalMonth);
    totalSum += totalMonth;
    totalSumLastYear += totalMonth;

    monthsLabels.push(monthsNameShort[i]);

  }

  difPercent = 0;
  difPercent = getDifPercent(totalSumCurrentYear, totalSumLastYear);
  if(difPercent < 0 ){
    document.getElementById("dif_porc_loc_mesmo_per_ano_ant").innerHTML = "<i class=\"fas fa-arrow-down\"></i>" + difPercent + "%";
    document.getElementById("dif_porc_loc_mesmo_per_ano_ant").className = "text-danger";
  } else{
    document.getElementById("dif_porc_loc_mesmo_per_ano_ant").innerHTML = "<i class=\"fas fa-arrow-up\"></i>" + difPercent + "%";
    document.getElementById("dif_porc_loc_mesmo_per_ano_ant").className = "text-success";
  }  
  document.getElementById("total_loc_mesmo_per_ano_ant").innerHTML = totalSum;

//********* segunda dash

//********* terceira dash
  //Total Locacao/Total Devolucao
  var totalLocacao = 0;
  var totalDevolucao = 0;
  for(let j=0; j < dataConv.length; j++){
    totalLocacao += parseInt(dataConv[j].total_locacao);
    totalDevolucao += parseInt(dataConv[j].total_devolucao);
  }
//********* terceira dash  

      var $locUlt2MonthsChart = $('#dash_loc_ult_2_mes')    
      var locUlt2MonthsChart = new Chart($locUlt2MonthsChart, {
        data: {
          labels: labelValues,
          datasets: [{
            type: 'line',
            data: dataValues,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            pointBorderColor: '#007bff',
            pointBackgroundColor: '#007bff',
            fill: false
            // pointHoverBackgroundColor: '#007bff',
            // pointHoverBorderColor    : '#007bff'
          }]
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            mode: mode,
            intersect: intersect
          },
          hover: {
            mode: mode,
            intersect: intersect
          },
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              // display: false,
              gridLines: {
                display: true,
                lineWidth: '4px',
                color: 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent'
              },
              ticks: $.extend({
                beginAtZero: true,

                callback: function (value) {
                  if (value >= 1000) {
                    value /= 1000
                    value += 'k'
                  }
    
                  //return '$' + value
                  return value
                }
                //suggestedMax: totalMax
              }, ticksStyle)
            }],
            xAxes: [{
              display: true,
              gridLines: {
                display: false
              },
              ticks: ticksStyle
            }]
          }
        }
      })               

      var $salesChart = $('#dash_loc_mesmo_per_ano_ant')
      // eslint-disable-next-line no-unused-vars
      var salesChart = new Chart($salesChart, {
        type: 'bar',
        data: {
          //labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
          labels: monthsLabels,
          datasets: [
            {
              backgroundColor: '#007bff',
              borderColor: '#007bff',
              data: currentYearMonthsTotalsValues
              //data: [1000, 2000, 3000, 2500, 2700, 2500, 3000]
            },
            {
              backgroundColor: '#ced4da',
              borderColor: '#ced4da',
              data: lastYearMonthsTotalsValues
              //data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
            }           
          ]
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            mode: mode,
            intersect: intersect
          },
          hover: {
            mode: mode,
            intersect: intersect
          },
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              // display: false,
              gridLines: {
                display: true,
                lineWidth: '4px',
                color: 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent'
              },
              ticks: $.extend({
                beginAtZero: true,
    
                // Include a dollar sign in the ticks
                callback: function (value) {
                  if (value >= 1000) {
                    value /= 1000
                    value += 'k'
                  }
    
                  //return '$' + value
                  return value
                }
              }, ticksStyle)
            }],
            xAxes: [{
              display: true,
              gridLines: {
                display: false
              },
              ticks: ticksStyle
            }]
          }
        }
      })    

      //-------------
      //- DONUT CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var donutChartCanvas = $('#dash_locacoes_x_devolucoes').get(0).getContext('2d')
      var donutData        = {
        labels: [
            'Locacão',
            'Devolução'
        ],
        datasets: [
          {
            //data: [700,500,400,600,300,100],
            //backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            data: [totalLocacao, totalDevolucao],
            backgroundColor : ['#00c0ef', '#f56954'],
          }
        ]
      }
      var donutOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      }) 

		}

	})
//******************************* 

  var form = {
        identCall: 'getLivrosLocados'
        };

  $.ajax({ 
    url: url, 
    type: 'POST',
    data: form,
    dataType: 'JSON',
    success: function(data, textStatus, jqXHR) {

    var dataConv = data.filter(elements => {return elements !== null;});

    var quantTop = 5;
    var livrosMaisLocadosValues = [];
    var livrosMaisLocadosLabels = [];
    var mountLiTag;
    var categoriaLivrosMaisLocadas = [];

    for(let i=0; i < dataConv.length; i++){
      
      if(i >= quantTop){
        break;
      }

      livrosMaisLocadosValues.push(dataConv[i].quant_locacoes);  
      livrosMaisLocadosLabels.push(dataConv[i].titulo);

      let valueLi = "";
      switch(i){
         case 1:
           valueLi = "<i class=\"far fa-circle text-danger\"></i>" + " " + dataConv[i].titulo;
           break;
         case 2:
           valueLi = "<i class=\"far fa-circle text-success\"></i>" + " " + dataConv[i].titulo;
           break;
         case 3:
           valueLi = "<i class=\"far fa-circle text-warning\"></i>" + " " + dataConv[i].titulo;
           break;
         case 4:
           valueLi = "<i class=\"far fa-circle text-info\"></i>" + " " + dataConv[i].titulo;
           break;
         case 5:
           valueLi = "<i class=\"far fa-circle text-primary\"></i>" + " " + dataConv[i].titulo;
           break;
         default:
           valueLi = "<i class=\"far fa-circle text-info\"></i>" + " " + dataConv[i].titulo;                         
      }
  
      let elementName = "top_livros_mais_loc_" + (i + 1);
      document.getElementById(elementName).innerHTML = valueLi;

    }


    var categoriaLivrosMaisLocadasValues = [];
    var categoriaLivrosMaisLocadasLabels = [];

    var countCategoriaLivros = dataConv.reduce((acc, obj) => {
      const existingIndex = acc.findIndex(
        el => el.idcategoria === obj.idcategoria
      )
      if (existingIndex > -1) {
        acc[existingIndex].count += parseInt(obj.quant_locacoes)
      } else {
        acc.push({
          idcategoria: obj.idcategoria,
          categoria: obj.categoria,
          count: parseInt(obj.quant_locacoes)
        })
      }
      return acc
    }, [])

    countCategoriaLivros.sort(function (x, y) {
        return y.count - x.count;
    });    

    for(let i=0; i < countCategoriaLivros.length; i++){
      if(i >= quantTop){
        break;
      }
      categoriaLivrosMaisLocadasValues.push(countCategoriaLivros[i].count);  
      categoriaLivrosMaisLocadasLabels.push(countCategoriaLivros[i].categoria);

     let valueLi = "";
     switch(i){
        case 1:
          valueLi = "<i class=\"far fa-circle text-danger\"></i>" + " " + countCategoriaLivros[i].categoria;
          break;
        case 2:
          valueLi = "<i class=\"far fa-circle text-success\"></i>" + " " + countCategoriaLivros[i].categoria;
          break;
        case 3:
          valueLi = "<i class=\"far fa-circle text-warning\"></i>" + " " + countCategoriaLivros[i].categoria;
          break;
        case 4:
          valueLi = "<i class=\"far fa-circle text-info\"></i>" + " " + countCategoriaLivros[i].categoria;
          break;
        case 5:
          valueLi = "<i class=\"far fa-circle text-primary\"></i>" + " " + countCategoriaLivros[i].categoria;
          break;
        default:
          valueLi = "<i class=\"far fa-circle text-info\"></i>" + " " + countCategoriaLivros[i].categoria;
     }

     let elementName = "top_cat_livros_mais_loc_" + (i + 1);
     document.getElementById(elementName).innerHTML = valueLi;

    }            

  //-------------
  // - PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#dash_top_livros_mais_loc').get(0).getContext('2d')
  var pieData = {
    labels: livrosMaisLocadosLabels,
    datasets: [
      {
        data: livrosMaisLocadosValues,
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
      }
    ]
  }
  var pieOptions = {
    legend: {
      display: false
    }
  }
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  // eslint-disable-next-line no-unused-vars
  var pieChart = new Chart(pieChartCanvas, {
    type: 'doughnut',
    data: pieData,
    options: pieOptions
  })

  //-----------------
  // - END PIE CHART -
  //-----------------    


  //-------------
  // - PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#dash_top_cat_livros_mais_loc').get(0).getContext('2d')
  var pieData = {
    labels: categoriaLivrosMaisLocadasLabels,
    datasets: [
      {
        data: categoriaLivrosMaisLocadasValues,
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
      }
    ]
  }
  var pieOptions = {
    legend: {
      display: false
    }
  }
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  // eslint-disable-next-line no-unused-vars
  var pieChart = new Chart(pieChartCanvas, {
    type: 'doughnut',
    data: pieData,
    options: pieOptions
  })

  //-----------------
  // - END PIE CHART -
  //-----------------     

    }

  })

})