var editor;
// Call the dataTables jQuery plugin

$(document).ready(function() {  
$.fn.editable.defaults.mode = 'inline';
$.fn.editable.defaults.ajaxOptions = {type: "post"}

$.ajaxSetup({

  headers: {

      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

  }

});

  $('#dataTable').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});
  
  $('.iteminput').editable({
    url: '/actualizarlider'
  });
  $('.itemselect').editable({
    url: '/actualizarlider'
  });
});



