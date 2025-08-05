<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Task;

class ToggleCompletedButton extends Component
{
    /**
     * Create a new component instance.
     */
    public Task $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.toggle-completed-button');
    }
}
