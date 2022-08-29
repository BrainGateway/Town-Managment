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