<div>
    <div wire:loading class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">Estamos Buscando</span> Deme unos segundos.
        </div>
      </div>
    <div class="flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <form class="max-w-lg mx-auto">
            <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Buscar C. U. R. P.</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    @include('layouts.themes.icons.buscar')
                </span>
                <input type="text" wire:model='curp' id="website-admin" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonnie Green">
            </div>
            <button type="button" wire:click='seek' class="mt-4 w-full text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Buscar
            </button>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {

        function message(msg){
            swal({
                icon: "error",
                title: "Oops...",
                text: msg,
                footer: '<strong>Departamento de Informatica</strong>'
            });
        }

        // window.livewire.on('item-added', onItemAdded);
        // window.livewire.on('item-updated', onItemUpdated);
        // window.livewire.on('item-deleted', onItemDeleted);
        // window.livewire.on('hide-modal', hideModal);
        // window.livewire.on('show-modal', showModal);
        window.livewire.on('error', message)
    });
</script>
