@include('common.headModal')
<form class="space-y-6">
    <div class="grid grid-cols-2 gap-6 p-6 sm:grid-cols-2">
        <div>
            <label for="agent_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione un Agente</label>
            <select id="agent_id" wire:model='agent_id' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="Seleccion">Selecciones Una Opcion</option>
                @foreach ($agent as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('agent_id')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NOMBRES</label>
            <input type="text" wire:model='name' id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombres">
            @error('name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
        <div>
            <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">APELLIDOS</label>
            <input type="text" wire:model='lastname' id="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Apellidos">
            @error('lastname')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
        <div>
            <label for="tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
            <input type="tel" wire:model='tel' id="tel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Telefono">
            @error('tel')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>

        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electronico</label>
            <input type="text" wire:model='email' id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Correo Electronico">
            @error('email')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
        <div>
            <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">FACEBOOK</label>
            <input type="text" wire:model='facebook' id="facebook" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="FACEBOOK">
            @error('facebook')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
        <div>
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
            <input type="text" wire:model='address' id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Dirección">
            @error('address')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>

        <div>
            <label for="town_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comunidad o Colonia</label>
            <select id="town_id" wire:model='town_id' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="Seleccion">Selecciones Una Opcion</option>
                @foreach ($colonias as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('town_id')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
        <div>
            <label for="yearold" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edad</label>
            <input type="number" wire:model='yearold' id="yearold" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Edad">
            @error('yearold')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
        <div>
            <label for="section" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sección</label>
            <input type="text" wire:model='section' id="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sección">
            @error('section')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>

        <div>
            <label for="clave" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Clave Electoral</label>
            <input type="text" wire:model='clave' id="clave" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Clave Electoral">
            @error('clave')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
        <div>
            <label for="curp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">C. U. R. P. </label>
            <input type="text" wire:model='curp' id="curp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="C. U. R. P.">
            @error('curp')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
        <div>
            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo</label>
            <select id="type" wire:model='type' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="Seleccion">Selecciones Una Opcion</option>
                <option value="Urbano">Urbano</option>
                <option value="Rural">Rural</option>
                <option value="General">General</option>
            </select>
            @error('type')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
        <div>
            <label for="ruta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruta </label>
            <input type="text" wire:model='ruta' id="ruta" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ruta">
            @error('ruta')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
    <div>
</form>
@include('common.footerModal')
