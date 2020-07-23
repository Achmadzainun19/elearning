<script>
$(document).ready(function(){
    $('#kelas').on('change', function(){
        var id = $(this).val();
        if(id){
            $.ajax({
                type:'POST',
                url:'http://localhost/elearning/admin/?system=materi&aksi=select_ampu',
                data:'id='+id,
                success:function(html){
                    $('#pengampu').html(html);
                    
                }
            }); 
        }else{
            $('#pengampu').html('<option value="">-- pilih --</option>');
            
        }
    });
});
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    
    $('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>