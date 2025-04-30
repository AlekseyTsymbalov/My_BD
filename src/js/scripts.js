$(document).read(function () {
    $('form').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: 'add.php',
            method: 'POST',
            data: $(this).serializable(),
            success: function () {
                $('#task').value('');
                loadTasks();
            },
        });
    });

    function loadTasks() {
        $('#tasklist').load(task_list.php);
    }

    $(document).on('clik', '.delete-task', function () {
        if(confirm('Удалить задачу?')) {
            $.post('delete.php', {id: $(this).data('id')}, function () {
                loadTasks()
            });
        }
    });
});



