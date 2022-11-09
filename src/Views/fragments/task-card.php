<?php
    /**
     * @var TaskEntity[] $tasks
     */


?>


<!-- Task -->
<div class="bg-white hover:bg-slate-50 transition-colors duration-300 my-2 py-4 rounded flex flex-row border-2 border-slate-100 items-stretch">
    <!-- Checkbox -->
    <div class="mx-4 flex items-center">
        <input
            id="task-1"
            name="task-1"
            type="checkbox"
            class="w-4 h-4 text-slate-600 bg-slate-100 rounded-xl border-2 border-slate-300 cursor-pointer accent-teal-400"
        />
    </div>

    <!-- Content -->
    <label for="task-1" class="mx-4 -my-4 py-4 flex-1 text-lg font-medium cursor-pointer select-none flex items-center">
        <?php /** @var TYPE_NAME $task */
        echo $task->getTitle() ?>
    </label>


    <!-- Actions -->
    <ul class="mx-4 text-lg font-bolder flex items-center flex">
        <!-- Show only if the task has a description -->
        <li class="px-2 border-r-2 border-slate-100">
            <span class="sr-only"><?php
                echo $task->getDescription() ?></span>
            <i class="iconoir-align-left text-slate-400"></i>
        </li>

        <!-- Edit button -->
        <li class="px-2">
            <a href="/task/1">
                <button type="button" class="bg-transparent transition-colors duration-300 hover:bg-slate-200 rounded p-2 cursor-pointer">
                    <span class="sr-only">Éditer la tâche</span>
                    <i class="iconoir-edit-pencil"></i>
                </button>
            </a>
        </li>
    </ul>
</div>
