@include('common.headModal')
<form class="space-y-6">
    <div class="grid grid-cols-2 gap-6 p-6 sm:grid-cols-2">
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comunidad o Colonia</label>
            <input type="text" wire:model='name' id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nueva comunidad o Colonia">
            @error('name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
        <div>
            <label for="journey_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruta</label>
            <input type="text" wire:model='journey_id' id="journey_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ruta">
            @error('journey_id')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
        <div>
            <label for="section" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruta</label>
            <input type="text" wire:model='section' id="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sección">
            @error('section')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
    <div>
</form>
@include('common.footerModal')
