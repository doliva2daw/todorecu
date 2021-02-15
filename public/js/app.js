var show_mesg=function(str){
    $('#message').show();
    $('#message').html('<p>'+str+'</p>');
    setTimeout(function(){$('#message').hide();},6000);
    };
    
function remove(id){
    //var data=Object.assign({}, getRow(id));
    //var dataString=JSON.stringify(data);

    URL=window.location.origin+App.url.base+'task/remove';
    console.log(id);
    $.ajax({
        type: 'POST',
        url: URL,
        data: {'id':id},
        error: function(){
            alert('Error');},
        success: function(resp){
            console.log(resp);
            
        },
        complete: function(data){
            window.location.reload();
            show_mesg('Removed');
        }
    });
}
function getRow(id){
    keys=document.getElementById("mytable").rows[0].cells;   
    cells= document.getElementById('row'+id).cells;
    console.log(keys);
    arr=new Array();
    for (var i=0;i<cells.length-2;i++){
        key=keys[i].innerHTML;
        arr[key]=cells[i].innerHTML;
    }         
    return arr;     
}
      
        function edit(id){
            var data=Object.assign({}, getRow(id));
            var dataString=JSON.stringify(data);
            URL=window.location.origin+App.url.base+'task/update';
            console.log(dataString);
            $.ajax({
                type: 'POST',
                url: URL,
                data: {data:dataString},
                error: function(){
                    alert('Error');},
                success: function(resp){
                    console.log(resp);
                    
                },
                complete: function(data){
                    show_mesg('Updated');
                }
            });
        }
    $(document).ready(function(){
        $('.edit').click(function(e){
            console.log(e);
            $('#row').attr('editable',true);
            $('.edit').css('background-color','green');
        });
    });
