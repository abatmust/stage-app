<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-12" x-data = "alpineInstance()">
        <div class="max-w-max mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col justify-center items-center">
                    @if (Session::has('info'))
                        {{Session::get('info')}}
                    @endif


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2 px-4 bg-lime-400">
                    <div>
                        <h2 class="uppercase text-lg text-center ml-3 font-extrabold text-cyan-800">Rechercher par stagiaire</h2>
                    </div>
                    <form action="">
                                <input list="stagiaires" id="selectedStagiaire" class="block p-2 mt-1 w-full border-2 border-slate-700 text-center" @change="newSelection()" x-model="selectedStagiaire">
                                    <datalist id="stagiaires" >
                                        @foreach ($stagiaires as $stagiaire)
                                            <option value="{{$stagiaire->id}}" >{{$stagiaire->nom}} {{$stagiaire->prenom}}</option>
                                        @endforeach
                                    </datalist>
                            </form>

                    <div class="py-2">

                    </div>

                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4  bg-lime-400 mt-2">
                        <div class="flex justify-between">
                            <h1 class=" text-cyan-800 uppercase">les informations du stagiaire</h1>
                            <div x-show="mystagiaire.id" class="">
                                <a x-cloak x-bind:href="'stagiaires.edit' +'/' + mystagiaire.id" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <title>Edit</title>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>

                                </a>
                            </div>



                        </div>



                        <table class="min-w-full text-center  bg-cyan-700">
                            <thead class="border-b">

                                <tr>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Civilité
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Nom et Prénom
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Téléphone
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Email
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    CIN
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Institut
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Ville
                                </th>
                                </tr>
                            </thead class="border-b">
                            <tbody x-show="mystagiaire.id">

                                <tr class="bg-cyan-400 border-b">
                                <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900" x-text="mystagiaire.gender_situation"></td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900" x-text="mystagiaire.nom + ' ' + mystagiaire.prenom"></td>

                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap" x-text="mystagiaire.phone">

                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap" x-text="mystagiaire.email">

                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap" x-text="mystagiaire.cin">

                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap" x-text="mystagiaire.institut">
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap" x-text="mystagiaire.ville">

                                </td>
                                </tr class="bg-white border-b">


                            </tbody>
                        </table>
                    </div>
                    <div class="relative max-w-fit shadow-md sm:rounded-lg p-4  bg-lime-500 mt-2">
                        <div class="flex justify-between">
                            <h1 class=" text-cyan-800 uppercase">les stages effectués</h1>




                        </div>

                        <table class="min-w-full text-center  bg-cyan-700">
                            <thead class="border-b">

                                <tr>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Date Début
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Date Fin
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Objet
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Attestation
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Affectation
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    observation
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Opérations
                                </th>
                                </tr>
                            </thead class="border-b">
                            <tbody>
                            <template x-for="(stage, index) in mystagiaire.allstages">
                                <tr class="bg-cyan-400 border-b" :class="stage.deleted_at ? 'line-through' : ''">
                                <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <span x-text="index + 1"></span>
                                        <span class="border-2 border-red-600 p-1 rounded-full">
                                        N°:<span x-text="stage.id"></span>
                                    </span>
                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap" x-text="stage.dateDebut">

                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap" x-text="stage.dateFin">

                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2" x-text="stage.subject">

                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2">
                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-blue-900 bg-violet-100 rounded-full" x-text="stage.attestationStatut">

                                    </span>
                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 mt-1 text-xs font-bold leading-none text-violet-100 bg-red-700 rounded-full" x-text="stage.attestationReferences">

                                    </span>
                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap" x-text="stage.affectation">

                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap">
                                    <div class="" x-text="stage.observation"></div>
                                            <svg xmlns="http://www.w3.org/2000/svg"  :fill="stage.assurance == 1 ? 'green':'red'" viewBox="0 0 24 24" stroke-width="1.5" stroke="none" class="w-6 h-6">
                                            <title>Assurance</title>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                            </svg>

                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap">
                                    <a x-cloak x-bind:href="'stages.edit' +'/' + stage.id" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" :class="stage.deleted_at ? 'hidden' : ''">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <title>Edit</title>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>

                                    </a>
                                </td>
                                </tr class="bg-white border-b">
                            </template>

                            </tbody>
                        </table>

                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4  bg-lime-500 mt-2">
                        <div class="flex justify-between">
                            <h1 class=" text-cyan-800 uppercase">les demandes de stage</h1>




                        </div>

                        <table class="min-w-full text-center  bg-cyan-700">
                            <thead class="border-b">

                                <tr>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Num SAF
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Date SAF
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Pièces
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Période Demandée
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Sort
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Opérations
                                </th>
                                </tr>
                            </thead class="border-b">
                            <tbody>
                            <template x-for="(demande, index) in mystagiaire.demandes">
                                <tr class="bg-cyan-400 border-b">
                                <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                <span x-text="index + 1"></span>
                                        <span class="border-2 border-red-600 p-1 rounded-full">
                                        N°:<span x-text="demande.id"></span>
                                    </span>
                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap" x-text="demande.num_saf">

                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap" x-text="demande.date_saf">

                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap" x-text="demande.pieces">

                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap" x-text="demande.periode_demandee">

                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap" x-text="demande.sort">

                                </td>
                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap">
                                    <a x-cloak x-bind:href="'requests.edit' +'/' + demande.id" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <title>Edit</title>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>

                                    </a>
                                </td>
                                </tr class="bg-white border-b">
                            </template>

                            </tbody>
                        </table>

                    </div>






                </div>
            </div>
        </div>
    </div>
</x-app-layout>

    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    <script>
        function alpineInstance() {
  return {
        selectedStagiaire : "",
        mystagiaire : {},
        newSelection : function (){

            console.log(this.selectedStagiaire.value);
            fetch("api/api.stagiaires/"+this.selectedStagiaire, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            },
            }).then(response => response.json()).then(response => {
                console.log("response",response)
                this.mystagiaire = response
            }).catch(error => {
                console.log("error",error)
            })
        }
        }
        }
    </script>



