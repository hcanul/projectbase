@role('superuser|administrador')
    <li>
        <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-captura" data-collapse-toggle="dropdown-captura">
            @include('layouts.themes.icons.insert')
            <span class="flex-1 ml-3 text-left whitespace-nowrap">Captura</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>
        <ul id="dropdown-captura" class="hidden py-2 space-y-2">
                <li>
                    <a href="{{ route('indexRutas') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        @include('layouts.themes.icons.usuario')
                        <span class="flex-1 ml-3 whitespace-nowrap">Rutas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('indexTowns') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        @include('layouts.themes.icons.role')
                        <span class="flex-1 ml-3 whitespace-nowrap">Comunidades</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('indexCoordinator') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        @include('layouts.themes.icons.coordinator')
                        <span class="flex-1 ml-3 whitespace-nowrap">Coordinadores</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('indexAgent') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        @include('layouts.themes.icons.agent')
                        <span class="flex-1 ml-3 whitespace-nowrap">Agentes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('indexActivist') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        @include('layouts.themes.icons.activist')
                        <span class="flex-1 ml-3 whitespace-nowrap">Activistas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('indexComprobation') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        @include('layouts.themes.icons.voters')
                        <span class="flex-1 ml-3 whitespace-nowrap">Votantes</span>
                    </a>
                </li>
        </ul>
    </li>
@endrole
