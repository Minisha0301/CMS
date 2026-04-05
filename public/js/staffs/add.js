
// Open modal
$('#open-modal').click(function () {
    $('#staff-create-modal').removeClass('hidden');
});

// Close modal
$('#close-modal').click(function () {
    $('#staff-create-modal').addClass('hidden');
});

$('#staff-form').submit(function (e) {
    e.preventDefault();

    $.ajax({
        url: staffAddUrl,
        type: "POST",
        data: $(this).serialize(),
        success: function (res) {
            
            alert(res.message);

            $('#staff-form')[0].reset();
            $('#staff-create-modal').addClass('hidden');

            $('#staffs-table').DataTable().draw(); 
        },
        error: function (err) {

            let errors = err.responseJSON.errors;

            let msg = '';

            $.each(errors, function (key, value) {
                msg += value[0] + '\n';
            });

            alert(msg); 
        }
    });
});


