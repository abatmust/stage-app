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
                    <x-dropdown-link :href="route('agents.create')" class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-blue-800 hover:text-rose-800">
                            <title>Ajouter une nouveau agent</title>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />



                        </svg>

                    </x-dropdown-link>

                    <h2 class="uppercase text-lg text-center ml-3 font-extrabold">liste des agents de l'ormvah</h2>

                </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" x-data>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-blue-700 dark:text-gray-400">
                    <tr class="bg-blue border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">


                    <th scope="col" class="px-6 py-0">
                        Mle
                    </th>
                    <th scope="col" class="px-6 py-0">
                        nom et prénom
                    </th>
                    <th scope="col" class="px-6 py-0">
                        affectation
                    </th>
                    <th scope="col" class="px-6 py-0">
                        specialite
                    </th>

                    <th scope="col" class="px-6 py-0">
                        diplôme
                    </th>
                    <th scope="col" class="px-6 py-0">
                    observation
                    </th>


                    <th scope="col" class="px-6 py-0">
                    Ajout
                    </th>
                    <th scope="col" class="px-6 py-0">
                    Opérations
                    </th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($agents as $agent)
                        <tr class="transition-colors bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">


                            <td class="transition px-6 py-0">
                            {{$agent->mle}}

                            </td>
                            <td class="transition px-6 py-0">
                            {{$agent->nom}} {{$agent->prenom}}
                            </td>
                            <td class="transition px-6 py-0">
                            {{$agent->affectation}}
                            </td>
                            <td class="transition px-6 py-0">
                            {{$agent->specialite}}
                            </td>

                            <td class="transition px-6 py-0">
                            {{$agent->diplome}}
                            </td>
                            <td class="transition px-6 py-0">
                            {{$agent->observation}}
                            </td>


                            <td class="px-6 py-0">

                                <span class="inline-flex items-center justify-center px-2 py-0 text-xs font-bold leading-none text-red-100 bg-blue-600 rounded-full">
                                    {{$agent->created_at->diffForHumans()}}
                                </span>
                                <span class="text-xs">
                                par
                                </span>
                                <span class="inline-flex items-center justify-center px-2 py-0 mr-2 text-xs font-bold leading-none text-red-100 bg-rose-400 rounded-full">
                                    {{$agent->creater->name}}
                                </span>


                            </td>
                            <td class="px-6 py-0 text-right flex">

                                <a href="{{route('agents.edit',['agent' => $agent->mle])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <title>Edit</title>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <!-- delete -->
                                <form action="{{route('deleteAgent',['agent'=> $agent->mle])}}" method="POST" onsubmit="dealSubmit(event)">
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
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"><td class="px-6 py-0 text-center" colspan="9">Aucun agent</td></tr>

                        @endforelse


                    </tbody>
                    </table>
                    <div class="py-2">
                        {{ $agents->links() }}
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


