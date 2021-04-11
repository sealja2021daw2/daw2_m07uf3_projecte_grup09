@if ($sessesadmin=='0')
    @php
        $i = 'menu'
    @endphp
@else
    @php
        $i = 'menuadm'
    @endphp
   
@endif

@extends($i)

@section('content')
             <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="underline flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h2>Control treballadors amb BD MySQL i framework Laravel 8</h2>
                </div>

                <div class="mt-8 bg-light dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ url('treballadors/create') }}" class="underline text-gray-900 dark:text-white">Afegeix treballadors</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Accés a la vista per afegir nous treballadors a la base de dades.
                                </div>
                            </div>
                        </div>                                    

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white"><a href="{{ url('treballadors') }}" class="underline text-gray-900 dark:text-white">Llista treballadors i accions (esborra/edita)</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                   Accés a la vista per visualitazar la llista de treballadors i enllaços a les opcions d'esborrar i modificar dades treballadors existents.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <
                
            </div>
        </div>

        @endsection