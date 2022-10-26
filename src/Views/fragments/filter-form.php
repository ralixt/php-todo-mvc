<?php
/**
 * @var string $search
 * @var string $orderBy
 * @var bool $hideCompleted
 */
?>
<form method="get" class="flex-1 flex flex-col space-y-4">
  <!-- Recherche -->
  <label class="select-none">
    <span class="text-xs uppercase text-slate-400 font-bold">Recherche</span>
    <input
      type="text"
      placeholder="Rechercher une tâche..."
      name="search"
      class="appearance-none block w-full bg-slate-100 text-slate-700 border border-slate-100 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-slate-400"
    />
  </label>
  
  <!-- Order By -->
  <div class="select-none">
    <label for="order-by" class="text-xs uppercase text-slate-400 font-bold">Trier par</label>
    <div class="relative">
      <select id="order-by" name="order-by" class="block appearance-none w-full bg-slate-100 text-slate-700 border border-slate-100 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-slate-400">
        <option disabled>
          Sélectionner une option
        </option>
        <option value="title">
          Titre
        </option>
        <option value="createdAt">
          Date D'ajout
        </option>
        <option value="completedAt">
          Date de complétion
        </option>
      </select>
      <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center px-2 text-gray-700">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
        </svg>
      </div>
    </div>
  </div>
  
  <!-- Show completed-->
  <div class="pt-2">
    <label class="inline-flex relative items-center cursor-pointer">
      <input type="checkbox" name="only-show-completed" class="sr-only peer">
      <span class="w-11 h-6 bg-slate-100 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-slate-600 peer-checked:bg-teal-400"></span>
      <span class="ml-3 text-sm font-medium text-slate-400 select-none cursor pointer">Masquer les tâches complétées</span>
    </label>
  </div>
  
  <!-- Submit & Reset -->
  <div class="flex flex-row space-x-4 pt-2">
    <button type="submit" class="p-4 rounded bg-teal-400 hover:bg-teal-500 duration-300 transition-colors flex items-center font-medium text-sm uppercase text-white tracking-widest flex-1 justify-center">
      Chercher <i class="iconoir-search block ml-2 text-xl"></i>
    </button>
    
    <button type="reset" class="p-4 rounded bg-slate-100 hover:bg-slate-200 duration-300 transition-colors flex items-center font-medium text-sm uppercase text-slate-500 tracking-wide">
      <i class="iconoir-refresh text-xl"></i>
    </button>
  </div>
</form>