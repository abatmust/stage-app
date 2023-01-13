<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col justify-center items-center">
                <div>
                    <h2 class="uppercase text-lg text-center ml-3 font-extrabold">liste des demandes de stage</h2>
                </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" x-data>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-blue-700 dark:text-gray-400">
                    <tr class="bg-blue border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="col" class="p-4">

                    </th>
                    <th scope="col" class="px-6 py-4">
                    Réf. SAF
                    </th>
                    <th scope="col" class="px-6 py-4">
                    Demandeur(s)
                    </th>
                    <th scope="col" class="px-6 py-4">
                    Pièces
                    </th>
                    <th scope="col" class="px-6 py-4">
                    Periode demandée
                    </th>
                    <th scope="col" class="px-6 py-4">
                    Observation
                    </th>
                    <th scope="col" class="px-6 py-4">
                    Ajouté:
                    </th>
                    <th scope="col" class="px-6 py-4">
                    <span class="sr-only">Edit</span>
                    </th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($demandes as $demande)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">

                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{$demande->num_saf}} du
                            {!! date('d/m/Y', strtotime($demande->date_saf)) !!}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <ul class="list-disc marker:text-blue-500">
                                        @forelse ($demande->stagiaires as $stagiaire)
                                             <li>{{$stagiaire->gender_situation}} <span class="capitalize">{{$stagiaire->prenom}}</span> <span class="uppercase">{{$stagiaire->nom}}</span></li>
                                        @empty
                                            ...
                                        @endforelse

                                    </ul>

                                    <a href="{{route('requests.stagiaires', ['demande'=> $demande->id])}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </a>


                            </th>
                            <td class="px-6 py-4">
                            {{$demande->pieces}}
                            </td>
                            <td class="px-6 py-4">
                            {{$demande->periode_demandee}}
                            </td>
                            <td class="px-6 py-4">
                            {{$demande->observation}}
                            </td>
                            <td class="px-6 py-4">

                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-blue-600 rounded-full">
                                    {{$demande->created_at->diffForHumans()}}
                                </span>
                                <span class="text-xs">
                                par
                                </span>

                                <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-rose-400 rounded-full">
                                    {{$demande->user->name}}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right flex">
                            <a href="{{route('requests.edit',['demande' => $demande->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <title>Edit</title>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                            @if ($demande->pj)

                                <a href="{{Storage::disk('public')->url('demandes/'.$demande->pj . '.pdf')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <title>PDF</title>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                </a>
                            @endif
                            <form action="{{route('deleteDemande',['demande'=> $demande->id])}}" method="POST" onsubmit="dealSubmit(event)">
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
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"><td class="px-6 py-4 text-center" colspan="7">Aucune demande</td></tr>

                        @endforelse


                    </tbody>
                    </table>
                    <div class="py-2">
                        {{ $demandes->links() }}
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


