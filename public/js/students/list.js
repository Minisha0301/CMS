$(document).ready(function () {
    let table = $('#students-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: studentsDataUrl,
            data: function (d) {
                d.department_id = $('#department-filter').val();
            }
        }, 

        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'department', name: 'department' },
            { data: 'programme', name: 'programme' }
        ]
    });

    $('#department-filter').change(function () {
        table.draw();
    });
    $('#reset-filter').click(function () {
        $('#department-filter').val('');
        table.draw();
    });

});
