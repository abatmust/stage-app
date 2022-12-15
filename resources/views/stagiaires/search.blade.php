<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-12" x-data = "alpineInstance()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                <input list="stagiaires" id="selectedStagiaire" class="block p-2 mt-1 w-full border-2 border-slate-700" @change="newSelection()" x-model="selectedStagiaire">
                                    <datalist id="stagiaires" >
                                        @foreach ($stagiaires as $stagiaire)
                                            <option value="{{$stagiaire->id}}" >{{$stagiaire->nom}} {{$stagiaire->nom}}</option>
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


                        <div class="grid grid-cols-4 gap-4 text-red-500">
                            <div class="border-gray-700 border-2 text-center border-collapse">nom et prénom</div>
                            <div class="border-gray-700 border-2 text-center border-collapse">cin</div>
                            <div class="border-gray-700 border-2 text-center border-collapse">civilité</div>
                            <div class="border-gray-700 border-2 text-center border-collapse">institut</div>
                        <div class="border-gray-500 border-2 text-center border-collapse">
                            <span x-text="mystagiaire.gender_situation"></span> <span class="" x-text="mystagiaire.nom + ' ' + mystagiaire.prenom"></span>
                        </div>
                        <div class="border-gray-500 border-2 text-center border-collapse" x-text="mystagiaire.cin"></div>
                        <div class="border-gray-500 border-2 text-center border-collapse" x-text="mystagiaire.gender_situation">03</div>
                        <div class="border-gray-500 border-2 text-center border-collapse" x-text="mystagiaire.institut">04</div>

                        </div>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4  bg-lime-500 mt-2">
                        <div class="flex justify-between">
                            <h1 class=" text-cyan-800 uppercase">les stages effectués</h1>
                            <div x-show="mystagiaire.id" class="">
                                <a x-cloak x-bind:href="'stagiaires.edit' +'/' + mystagiaire.id" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <title>Edit</title>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>

                                </a>
                            </div>



                        </div>


                        <div class="grid grid-cols-4 gap-4 text-red-500">
                            <div class="border-gray-700 border-2 text-center border-collapse">nom et prénom</div>
                            <div class="border-gray-700 border-2 text-center border-collapse">cin</div>
                            <div class="border-gray-700 border-2 text-center border-collapse">civilité</div>
                            <div class="border-gray-700 border-2 text-center border-collapse">institut</div>
                        <div class="border-gray-500 border-2 text-center border-collapse">
                            <span x-text="mystagiaire.gender_situation"></span> <span class="" x-text="mystagiaire.nom + ' ' + mystagiaire.prenom"></span>
                        </div>
                        <div class="border-gray-500 border-2 text-center border-collapse" x-text="mystagiaire.cin"></div>
                        <div class="border-gray-500 border-2 text-center border-collapse" x-text="mystagiaire.gender_situation">03</div>
                        <div class="border-gray-500 border-2 text-center border-collapse" x-text="mystagiaire.institut">04</div>

                        </div>
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



