// call on button click
        
function search_request(){
    $.ajax({
        type    : "POST",
        url     : SITE_URL+"ajax-search.php?search=true",
        dataType:'json',
        data    : $( '#search' ).serialize(),
        cache   : false,
        success : function(response){
            $('table tbody').html("");

            var rowcount=response.length;
            if(response.length>0){
                for(var i=0;i<rowcount;i++){
                    $('table tbody').append('<tr><td>'
                    +response[i].id+'</td><td>'
                    +response[i].name+'</td><td>'
                    +response[i].standard+'</td><td>'
                    +response[i].subject+'</td><td>'
                    +response[i].created_on+'</td><td>'
                    +response[i].updated_on+
                    '</td><td><a href="add.php?id='+response[i].id+'">Edit</a></td></tr>');
                }
                $('#total-record').html('Showing '+rowcount+' Records' );
                }else{
                    $('table tbody').html( "<tr><td colspan='6'>No Result Found.</td></tr>");
                    $('#total-record').html('');
                }
        }
    });
}


function dataTableCall(){
    $('#db-table').DataTable({
        'dom': 'lfrtip',
        'info': true,
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'server_processing.php'
      },
      'columns': [
        { data: 'id' },
        { data: 'name' },
        { data: 'standard' },
        { data: 'subject' },
        { data: 'created_on' },
        { data: 'updated_on' },
        {
            "mData": null,
            "bSortable": false,
            "mRender": function (o) { return '<a href=add.php?id=' + o.id + '>' + 'Edit' + '</a>'; }
        }
      ]
   });
}


