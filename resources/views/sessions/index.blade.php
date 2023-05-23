<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-12 bg-gradient-to-r from-cyan-300 to-blue-800 min-h-screen">
        <div class="max-w-max mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg relative">
                <div
                class="absolute transform -rotate-45 bg-orange-600 z-10 text-center text-white font-semibold py-1 left-[-40px] top-[32px] w-[170px]">
                Formation
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col justify-center items-center">
                    @if (Session::has('info'))
                        {{Session::get('info')}}
                    @endif
                <div class="flex items-center">
                    <x-dropdown-link :href="route('sessions.create')" class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-blue-800 hover:text-rose-800">
                            <title>Ajouter une nouvelle session</title>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />



                        </svg>

                    </x-dropdown-link>

                    <h2 class="uppercase text-lg text-center ml-3 font-extrabold">liste des sessions de formation</h2>

                </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" x-data>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-blue-700 dark:text-gray-400">
                    <tr class="bg-blue border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">


                    <th scope="col" class="px-6 py-4">
                        Date Début
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Date Fin
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Période
                    </th>
                    <th scope="col" class="px-6 py-4">
                        détail
                    </th>

                    <th scope="col" class="px-6 py-4">
                        lieu
                    </th>
                    <th scope="col" class="px-6 py-4">
                    animateur
                    </th>
                    <th scope="col" class="px-6 py-4">
                    thème
                    </th>
                    <th scope="col" class="px-6 py-4">
                    Marché/BDC
                    </th>

                    <th scope="col" class="px-6 py-4">
                    Ajout
                    </th>
                    <th scope="col" class="px-6 py-4">
                    Opérations
                    </th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($sessions as $session)
                        <tr class="transition-colors bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">


                            <td class="transition px-6 py-4">
                            {!! date('d/m/Y', strtotime($session->dateDebut)) !!}

                            </td>
                            <td class="transition px-6 py-4">
                            {!! date('d/m/Y', strtotime($session->dateFin)) !!}
                            </td>
                            <td class="transition px-6 py-4">
                            {{$session->periode}}
                            </td>
                            <td class="transition px-6 py-4">
                            {{$session->nbreParticipants}}
                            @if ($session->nbreParticipants)
                                Participants <br>
                            @endif
                            {{$session->nbreJours}}
                            @if ($session->nbreJours)
                                Jours
                            @endif
                            </td>

                            <td class="transition px-6 py-4">
                            {{$session->lieu}}
                            </td>
                            <td class="transition px-6 py-4">
                            {{$session->animateur}}
                            </td>
                            <td class="transition px-6 py-4">
                            
                            {{optional($session->theme)->objet}}
                            </td>
                            <td class="transition px-6 py-4">
                            {{optional($session->marche)->type}} n° {{optional($session->marche)->ref}}
                            </td>

                            <td class="px-6 py-4">

                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-blue-600 rounded-full">
                                    {{$session->created_at->diffForHumans()}}
                                </span>
                                <span class="text-xs">
                                par
                                </span>
                                <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-rose-400 rounded-full">
                                    {{$session->creater->name}}
                                </span>


                            </td>
                            <td class="px-6 py-4 text-right flex">
                                <a href="{{route('sessions.participation', ['session'=> $session->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <title>Participants</title>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>

                                </a>
                                <a href="{{route('sessions.edit',['session' => $session->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <title>Edit</title>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <!-- delete -->
                                <form action="{{route('deleteSession',['session'=> $session->id])}}" method="POST" onsubmit="dealSubmit(event)">
                                @method('DELETE')
                                @csrf
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <title>Supprimer</title>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"><td class="px-6 py-4 text-center" colspan="9">Aucune session</td></tr>

                        @endforelse


                    </tbody>
                    </table>
                    <div class="py-2">
                        {{ $sessions->links() }}
                    </div>

                    </div>





                </div>
            </div>
        </div>
    </div>
</x-app-layout>

    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    <script>
    let dealSubmit = (event) => {
        let submitable = false;
                submitable = confirm(`Etes vous sûr de vouloir supprimer ?`);
                if(!submitable){
                    event.preventDefault();
                }

    }

</script>


