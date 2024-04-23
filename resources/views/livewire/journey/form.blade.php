@include('common.headModal')
<form class="space-y-6">
    <div class="grid grid-cols-2 gap-6 p-6 sm:grid-cols-2">
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permiso</label>
            <input type="text" wire:model='name' id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nuevo Permiso">
            @error('name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
        <div>
            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permiso</label>
            <select id="type" wire:model='type' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="Elegir" selected>Elige una opción</option>
                <option value="Urbano">Urbano</option>
                <option value="Rural">Rural</option>
            </select>
            @error('type')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
    <div>
</form>
@include('common.footerModal')
