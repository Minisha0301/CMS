
// Open modal
$('#open-modal').click(function () {
    $('#student-create-modal').removeClass('hidden');
});

// Close modal
$('#close-modal').click(function () {
    $('#student-create-modal').addClass('hidden');
});


// Submit student create form 
$('#student-form').submit(function (e) {
    e.preventDefault();

    $.ajax({
        url: studentsAddUrl,
        type: "POST",
        data: $(this).serialize(),
        success: function (res) {

            alert(res.message);

            $('#student-form')[0].reset();
            $('#student-create-modal').addClass('hidden');

            $('#students-table').DataTable().draw(); 
        },
        error: function (err) {

            if (err.status === 422) {
            let errors = err.responseJSON.errors;

            let msg = '';
            $.each(errors, function (key, value) {
                msg += value[0] + '\n';
            });

            alert(msg); 
        }
        }
    });
});





