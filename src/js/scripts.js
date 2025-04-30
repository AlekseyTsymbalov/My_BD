$(document).ready(function() {
    // 1. Отправка формы
    $('form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: 'add.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function() {
                $('#task').val('');
                loadTasks();
            },
            error: function(xhr) {
                alert('Ошибка: ' + xhr.responseText);
            }
        });
    });

    // 2. Загрузка задач
    function loadTasks() {
        $('#taskList').load('task_list.php');
    }

    // 3. Удаление задачи
    $(document).on('click', '.delete-task', function() {
        if (confirm('Удалить задачу?')) {
            $.post('delete.php', {id: $(this).data('id')}, function() {
                loadTasks();
            }).fail(function(xhr) {
                alert('Ошибка удаления: ' + xhr.responseText);
            });
        }
    });
});