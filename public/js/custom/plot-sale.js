$( "#plot_size" ).prop( "readonly", true );
$( "#plot_dimension" ).prop( "readonly", true );
$( "#deal_price" ).prop( "readonly", true );

$('#plot_price').attr('value', '0.00');
$('#discount').attr('value', '0.00');
$('#deal_price').attr('value', '0.00');
function getPath() {
  var folder = (window.location.pathname.split('/')[0] || '').toLowerCase() == 'testsite' ? '/testsite' : '';
  return window.location.hostname + folder;
  }

$('#plot_number').on('change', function() {
   
    // alert('plot number' +  + getPath() )  ;
    let plotNumber = this.value;
    let url = 'http://127.0.0.1:8000/plots/'+plotNumber;

    $.ajax({
        type: "GET",
        url: url,
        crossDomain: true,
        success: function(data){
            let plotSize = data.data.size;
            let plot_dimension = data.data.dimension;
            $('#plot_size').val(plotSize);
            $('#plot_dimension').val(plot_dimension);
            plot_dimension
        }
    });


});

$("#discount , #plot_price ").on('keyup',function(){
  let discount = parseInt($('#discount').val()),
  plot_price = parseInt($('#plot_price').val());
  discount  ? discount : 0 ; 
  if(discount > plot_price){
    $('#discount').val('');
  }else  {  
    let total  =  plot_price - discount;
    $('#deal_price').val(total);
  }
});

$('.owner_toggle_password ').on('click', function() {  
  var input = $("#owner_password");
  $('.owner_toggle_password ').toggleClass("fa-eye fa-eye-slash");
  input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password');
});
$('.nominee_toggle_password ').on('click', function() {  
  var input = $("#nominee_password");
  $('.nominee_toggle_password ').toggleClass("fa-eye fa-eye-slash");
  input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password');
});
