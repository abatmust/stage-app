<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-12 bg-gradient-to-r from-cyan-300 to-blue-800 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden relative shadow-sm sm:rounded-lg">
            <div
                class="absolute transform -rotate-45 bg-orange-600 z-10 text-center text-white font-semibold py-1 left-[-40px] top-[32px] w-[170px]">
                Stages
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col justify-center items-center">
                <div>
                    <h2 class="uppercase text-lg text-center ml-3 font-extrabold">liste des stages</h2>
                </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" x-data>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-blue-700 dark:text-gray-400">
                    <tr class="bg-blue border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="col" class="p-4">
                      num bfp
                    </th>
                    <th scope="col" class="px-6 py-4">
                    Periode
                    </th>
                    <th scope="col" class="px-6 py-4">
                    Stagiaire
                    </th>
                    <th scope="col" class="px-6 py-4">
                    Sujet et affectation
                    </th>
                    <th scope="col" class="px-6 py-4">
                    Attestation de stage
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
                        @forelse ($stages as $stage)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
                            <td class="w-4 p-4 bg-cyan-500 rounded-sm">
                                <span class="text-4xl font-extrabold bg-cyan-800 text-yellow-50 p-2 rounded-full border-8 border-white">
                                    {{$stage->id}}
                                </span>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            @if ($stage->dateDebut)
                                {!! date('d/m/Y', strtotime($stage->dateDebut)) !!}
                            @else
                                ...
                            @endif
                             au
                             @if ($stage->dateFin)
                                {!! date('d/m/Y', strtotime($stage->dateFin)) !!}
                            @else
                                ...
                            @endif

                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            @if ($stage->stagiaire)
                                    {{$stage->stagiaire->nom}} {{$stage->stagiaire->prenom}}
                                @endif
                                <br>

                                <span class="flex-block items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-blue-300 @if ($stage->assurance)
                                bg-green-600
                                @else
                                bg-red-600
                                @endif rounded-full">
                                    assurance
                                </span>




                            </th>
                            <td class="px-6 py-4 text-ellipsis overflow-hidden">
                            {{$stage->subject}}
                            @if($stage->affectation)
                            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-blue-900 bg-orange-500 rounded-full">
                                {{$stage->affectation}}
                            </span>
                            @endif
                            </td>
                            <td class="px-6 py-4">

                                    {{$stage->attestationStatut}}
                                @if($stage->attestationStatut == "A établir")
                                    <a class="block" href="{{route('stages.attestation', ['stage'=> $stage->id])}}" target="_blank" rel="noopener noreferrer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                            <title>Attestation de stage</title>
                                          </svg>

                                    </a>
                                @endif
                                @if($stage->attestationReferences)
                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-yellow-900 bg-blue-300 rounded-full">
                                        {{$stage->attestationReferences}}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($stage->observation)
                                    <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full text-center">
                                        {{$stage->observation}}
                                    </span>
                                @endif

                            </td>
                            <td class="px-6 py-4">

                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-blue-600 rounded-full">
                                    {{$stage->created_at->diffForHumans()}}
                                </span>
                                <span class="text-xs">
                                par
                                </span>

                                <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-rose-400 rounded-full">
                                    {{$stage->creater->name}}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right flex">
                            <a href="{{route('stages.edit',['stage' => $stage->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <title>Edit</title>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                            @if ($stage->pj)

                                <a href="{{Storage::disk('public')->url('stages/'.$stage->pj . '.pdf')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <title>PDF</title>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                </a>
                            @endif
                            <form action="{{route('deleteStage',['stage'=> $stage->id])}}" method="POST" onsubmit="dealSubmit(event)">
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
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"><td class="px-6 py-4 text-center" colspan="7">Aucun stage</td></tr>

                        @endforelse


                    </tbody>
                    </table>
                    <div class="py-2">
                        {{ $stages->links() }}
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


