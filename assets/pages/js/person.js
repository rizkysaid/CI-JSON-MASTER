var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    var base_url = "http://localhost/ci-json-master/index.php";
    table = $('#table').DataTable({ 
 
        "processing": true,
        "responseive": true,
        "ajax": {
            "type": "POST",
            "url": base_url+"/person/listPerson"
        },
        "columnDefs": [
            {
                "targets": [3],
            },
            {
                "targets": [4],
                searchable: false
            },
        ]
    });

    $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'});
    $('[data-mask').inputmask();
 
    //datepicker
    
 
    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
 
    /* Enter klik */
    $(document).keypress(function(e){
        if($('#modal_form').hasClass('in')&&(e.keycode == 13 || e.which == 13)){
            simpan();
        }
    });
    
   /*  $('[name="tgl_lahir').keypress(function(e){
        if(e.keycode == 13 || e.which == 13){
            simpan();
        }
    }); */
    
    /* focus */
    $('#modal_form').on('shown.bs.modal', function () {
        $('#nama').focus();
    })
    
});

function tambah()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    $('#btnSave').text('Simpan');
}
 
function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    
    var base_url = "http://localhost/ci-json-master/index.php";
    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"/person/edit/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            var tgl = data.tgl_lahir.split('-').reverse().join('-');
            $('[name="id"]').val(data.id);
            $('[name="nama"]').val(data.nama);
            $('[name="gender"]').val(data.gender);
            $('[name="alamat"]').val(data.alamat);
            $('[name="tgl_lahir"]').datepicker({format:'dd/mm/yyyy', autoclose:true});
            $('[name="tgl_lahir"]').datepicker('update', tgl);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title
            $('#btnSave').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    
}
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
 
function simpan()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
    var base_url = "http://localhost/ci-json-master/index.php";
    if(save_method == 'add') {
        url = base_url+"/person/tambah";
    } else {
        url = base_url+"/person/update";
    }
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                if(save_method == 'add'){
                    Swal.fire({
                        type: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil disimpan'
                    });
                }else{
                    Swal.fire({
                        type: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil diupdate'
                    });
                }
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('simpan'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data'+'\n'+
                  'jqXHR='+jqXHR+'\n'+
                  'errorThrown='+errorThrown+'\n'+
                  'textStatus='+textStatus);
            $('#btnSave').text('simpan'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}
 
function delete_person(id)
{
    var base_url = "http://localhost/ci-json-master/index.php";
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        if(result.value) {
            $.ajax({
                url : base_url+"/person/delete/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    Swal.fire("Error deleting!", "Please try again", "error");
                }
            });    
        }
    });  
}


 