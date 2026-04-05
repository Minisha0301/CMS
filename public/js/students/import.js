$('#import-form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: studentImport,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,

        success: function (res) {
            alert(res.message);
            $('#students-table').DataTable().draw();
        },

        error: function (err) {
            let errors = err.responseJSON.errors;

            let messages = [];

            for (let key in errors) {
                messages.push(errors[key][0]);
            }

            alert(messages.join('\n'));
        }
    });
});