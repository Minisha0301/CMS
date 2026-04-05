$(document).ready(function () {
    let table = $('#staffs-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: staffDataUrl,
            data: function (d) {
                d.department_id = $('#department-filter').val();
            }
        }, 

        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'department', name: 'department' },
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
