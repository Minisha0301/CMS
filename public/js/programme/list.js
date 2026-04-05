$('#select-department').change(function () {
    let departmentId = $(this).val();
    $('#select-programme').html('<option>Loading...</option>');

    $.ajax({
        url: selectprogramme,
        type: "GET",
        data: { department_id: departmentId },
        success: function (res) {
            
            let options = '<option value="">Select Programme</option>';
            res.forEach(function (item) {
                options += `<option value="${item.id}">${item.name}</option>`;
            });
            $('#select-programme').html(options);
        },
        error: function (err) {
            // console.log(err);
        }
    });
});