<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('tasks.index'));
});
Breadcrumbs::for('tasks.index', function ($trail) {
    $trail->push('Tasks', route('tasks.index'));
});
Breadcrumbs::for('tasks.show', function ($trail, $task) {
    $trail->parent('tasks.index');
    $trail->push($task->title, route('tasks.show', $task->id));
});
Breadcrumbs::for('tasks.create', function ($trail) {
    $trail->parent('tasks.index');
    $trail->push('Create Task', route('tasks.create'));
});
Breadcrumbs::for('tasks.edit', function ($trail, $task) {
    $trail->parent('tasks.show', $task);
    $trail->push('Edit Task', route('tasks.edit', $task->id));
});
Breadcrumbs::for('tasks.store', function ($trail) {
    $trail->parent('tasks.index');
    $trail->push('Store Task', route('tasks.store'));
});
Breadcrumbs::for('tasks.update', function ($trail, $task) {
    $trail->parent('tasks.show', $task);
    $trail->push('Update Task', route('tasks.update', $task->id));
});
Breadcrumbs::for('tasks.destroy', function ($trail, $task) {
    $trail->parent('tasks.show', $task);
    $trail->push('Delete Task', route('tasks.destroy', $task->id));
});
