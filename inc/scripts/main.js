
jQuery(function(){  
  

jQuery('#btn1').on('click', function(e) {
    e.preventDefault();
    e.stopPropagation(); // only neccessary if something above is listening to the (default-)event too

   console.log('starting to  getting data');

    


    

    
     ajaxcall();

    
    
  
});    
    
    

function  ajaxcall(){

   var ctx =  jQuery('.chartjs-render-monitor')[0].getContext('2d');
var config = {
                type: 'line',
                data: {
                    labels: ["Today"],
                    datasets: [ {
                        label: "Downloads",
                        fill: false,
                        backgroundColor: window.chartColors.blue,
                        borderColor: window.chartColors.blue,
                        data: [18, 33, 22, 19, 11, 39, 30],
                    }]
                },
                options: {
                    responsive: true,
                    title:{
                        display: true,
                        text: 'downloads'
                    },
                   scales: {
            yAxes: [{
                position: "left",
                "id": "y-axis-0",
            }, {
                position: "right",
                "id": "y-axis-1",
            }]
        }
                }
            };    
    
    
    var data = {
		'action': 'Ajax_chartjs',
		'whatever': ajax_object.we_value      // We pass php values differently!
	};
	
	jQuery.post(ajax_object.ajax_url, data, function(response) {
	}).done(function(response){
     var info_array = [];
     var dates = []    
        
    var info = JSON.parse(response ,function (key, value) {
    if (key == "download_num") {
        info_array.push(value);
    } if(key == "date"){
        dates.push(value);
    }}
);
 for(var j=0;j<info_array.length;j++){
            info_array[j] = Math.floor((info_array[j])/2);    

    } 
        
    
    if(jQuery('#stats').val() == 'today'){
      
     var forecast_chart = new Chart(ctx, config);

     var chart_labels = ['Today'];
     var  temp_dataset = [];
      
         
     temp_dataset.push(info_array[info_array.length - 1]);  
    
    
    
    var data = forecast_chart.config.data;
    data.datasets[0].data = temp_dataset;
    data.labels = chart_labels;
    forecast_chart.update();    
        
        
        
        
        
   
        
    }
    
    if(jQuery('#stats').val() == 'yesterday'){
      
        
     var forecast_chart = new Chart(ctx, config);

     var chart_labels = ['yesterday','Today'];
     var  temp_dataset = []; 
     temp_dataset.push(info_array[info_array.length - 2]);  
     temp_dataset.push(info_array[info_array.length - 1]);  

        
    
    
    
    var data = forecast_chart.config.data;
    data.datasets[0].data = temp_dataset;
    data.labels = chart_labels;
    forecast_chart.update();  
        
    }
    if(jQuery('#stats').val() == 'week'){
     
         var forecast_chart = new Chart(ctx, config);
    
        
   var   chart_labels = dates;
     var  temp_dataset = info_array;  
    
    
    
    var data = forecast_chart.config.data;
    data.datasets[0].data = temp_dataset;
    data.labels = chart_labels;
    forecast_chart.update();    
        
    }
        
        
        
        
        
        
        
        
        
        
        
    }).fail(function(data){
        alert("Try again champ!");
   });
    
    
    
    
    
    
}    
    
    
    
});