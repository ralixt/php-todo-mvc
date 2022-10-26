<?php
echo get_header( [ 'title' => 'Accueil' ] );
?>
  <div class="container mx-auto flex flex-row items-stretch space-x-8">
    <!-- Filters -->
    <aside class="block w-1/4 mt-[7.1rem]">
      <?= get_template( __PROJECT_ROOT__ . "/Views/fragments/filter-form.php", [
        // TODO y aura sûrement un truc à faire ici 🤔
      ] ); ?>
    </aside>
    <!-- /Filters -->
    
    <main class="container mx-auto flex-1">
      <!-- Header + Search Form -->
      <header class="flex flex-row mt-8 items-center justify-space-between  mb-8">
        <h1 class="text-2xl font-bold uppercase tracking-widest flex-1">
          Tâches
        </h1>
        
        <a class="p-4 rounded bg-teal-400 hover:bg-teal-500 duration-300 transition-colors flex items-center font-medium text-sm uppercase text-white tracking-widest justify-center" href="/task">
          Créer <i class="iconoir-add-circled-outline block ml-2 text-xl"></i>
        </a>
      </header>
      <!-- /Header + Search Form -->
      
      <form method="post">
        
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
            Un nom de tâche original
          </label>
          
          
          <!-- Actions -->
          <ul class="mx-4 text-lg font-bolder flex items-center flex">
            <!-- Show only if the task has a description -->
            <li class="px-2 border-r-2 border-slate-100">
              <span class="sr-only">Cette tâche a une description</span>
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
        
        <!-- Pagination + Submit -->
        <div class="flex flex-row justify-space-between items-center">
          <!-- Submit -->
          <button type="submit" class="p-4 rounded bg-teal-400 hover:bg-teal-500 duration-300 transition-colors flex items-center font-medium text-sm uppercase text-white tracking-widest justify-center">
            Enregistrer <i class="iconoir-save-floppy-disk block ml-2 text-xl"></i>
          </button>
          
          <!-- Pagination -->
          <div class="flex-1 flex flex-row justify-end space-x-4 my-8">
            <a class="block bg-slate-50 hover:bg-slate-200 rounded p-4 text-sm cursor-pointer transition-colors duration-300">
              1
            </a>
            <a class="block bg-slate-50 hover:bg-slate-200 rounded p-4 text-sm cursor-pointer transition-colors duration-300">
              2
            </a>
            <a class="block bg-slate-50 hover:bg-slate-200 rounded p-4 text-sm cursor-pointer transition-colors duration-300">
              3
            </a>
          </div>
        </div>
        <!-- /Pagination -->
      </form>
    </main>
  </div>
<?php echo get_footer(); ?>