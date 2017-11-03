var table = $('#contact-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('api.contact') }}",
              columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
              ]
            });

function addForm() {
save_method = "add";
$('input[name=_method]').val('POST');
$('#modal-form').modal('show');
$('#modal-form form')[0].reset();
$('.modal-title').text('Add Contact');
}

function editForm(id) {
save_method = 'edit';
$('input[name=_method]').val('PATCH');
$('#modal-form form')[0].reset();
$.ajax({
  url: "{{ url('contact') }}" + '/' + id + "/edit",
  type: "GET",
  dataType: "JSON",
  success: function(data) {
    $('#modal-form').modal('show');
    $('.modal-title').text('Edit Contact');

    $('#id').val(data.id);
    $('#name').val(data.name);
    $('#email').val(data.email);
  },
  error : function() {
      alert("Nothing Data");
  }
});
}

function deleteData(id){
    var popup = confirm("Are you sure for delete this data ?");
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    if (popup == true ){
        $.ajax({
            url : "{{ url('contact') }}" + '/' + id,
            type : "POST",
            data : {'_method' : 'DELETE', '_token' : csrf_token},
            success : function(data) {
                table.ajax.reload();
            },
            error : function () {
                alert("Oops! Something Wrong!");
            }
        })
    }
}

$(function(){
    $('#modal-form form').validator().on('submit', function (e) {
        if (!e.isDefaultPrevented()){
            var id = $('#id').val();
            if (save_method == 'add') url = "{{ url('contact') }}";
            else url = "{{ url('contact') . '/' }}" + id;

            $.ajax({
                url : url,
                type : "POST",
                data : $('#modal-form form').serialize(),
                success : function($data) {
                    $('#modal-form').modal('hide');
                    table.ajax.reload();
                },
                error : function(){
                    alert('Oops! Something Error!');
                }
            });
            return false;
        }
    });
});