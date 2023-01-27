<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-12">
        <div class="max-w-max mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col justify-center items-center">
                    @if (Session::has('info'))
                        {{Session::get('info')}}
                    @endif
                <div>
                    <h2 class="uppercase text-lg text-center ml-3 font-extrabold">liste des marchés</h2>
                </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" x-data>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-blue-700 dark:text-gray-400">
                    <tr class="bg-blue border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">

                    <th scope="col" class="px-6 py-4 uppercase">
                        Référence
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Type
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Objet
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Année
                    </th>
                    <th scope="col" class="px-6 py-4">
                    Imputation budgétaire
                    </th>
                    <th scope="col" class="px-6 py-4">
                    Prestataire
                    </th>
                    <th scope="col" class="px-6 py-4">
                    Montant
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
                        @forelse ($marches as $marche)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">
                            {{$marche->ref}}

                            </td>
                            <td class="px-6 py-4">



                            {{$marche->type}}

                            </td>
                            <td class="px-6 py-4 line-clamp-1 hover:line-clamp-3">
                            {{$marche->objet}}
                            </td>
                            <td class="px-6 py-4">
                            {{$marche->annee}}
                            </td>
                            <td class="px-6 py-4">
                            {{$marche->imputationBudgetaire}}

                            </td>
                            <td class="px-6 py-4">
                            {{$marche->prestataire}}

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            {{number_format($marche->montant,2,',',' ')}}

                            </td>
                            <td class="px-6 py-4">

                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-blue-600 rounded-full">
                                    {{$marche->created_at->diffForHumans()}}
                                </span>
                                <span class="text-xs">
                                par
                                </span>
                                <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-rose-400 rounded-full">
                                    {{$marche->creater->name}}
                                </span>


                            </td>
                            <td class="px-6 py-4 text-right flex">
                                <a href="{{route('marches.edit',['marche' => $marche->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <title>Edit</title>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <!-- delete -->
                                <form action="{{route('deleteMarche',['marche'=> $marche->id])}}" method="POST" onsubmit="dealSubmit(event)">
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
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"><td class="px-6 py-4 text-center" colspan="9">Aucun marché</td></tr>

                        @endforelse


                    </tbody>
                    </table>
                    <div class="py-2">
                        {{ $marches->links() }}
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


