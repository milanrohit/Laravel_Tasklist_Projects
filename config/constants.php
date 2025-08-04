<?php

return [
    // Route paths
    'tasks_task' => '/tasks/{task}',

    // 📌 Validation Rules
    'validation' => [
        'req_chk_max25' => 'required|string|max:255',
        'opt_chk_max25' => 'nullable|string|max:255',
        'req_textarea' => 'required|string|min:10|max:1000',
    ],

    // 📋 Task Messages
    'task_created' => 'Task created successfully!',
    'task_updated' => 'Task updated successfully!',
    'task_deleted' => 'Task deleted successfully!',
    'task_not_found' => 'Task not found!',
    'task_status_updated' => 'Task status updated successfully!',
    'task_completed' => 'Task marked as completed!',
    
    // UI values
    'max_square_icon' => 'M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z',

    // Roles
    'roles' => [
        'admin' => 'admin',
        'editor' => 'editor',
    ],
];
