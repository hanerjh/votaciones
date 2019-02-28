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

  $('#dataTable').DataTable({
    select: true,
    buttons: [
        { extend: 'create', editor: editor },
        { extend: 'edit',   editor: editor },
        { extend: 'remove', editor: editor },
        {
            extend: 'collection',
            text: 'Export',
            buttons: [
                'copy',
                'excel',
                'csv',
                'pdf',
                'print'
            ]
        }
    ]
  });
  
  $('.iteminput').editable({
    url: '/actualizarlider'
  });
  $('.itemselect').editable({
    url: '/actualizarlider'
  });
});



