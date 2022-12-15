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


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2 px-4 bg-lime-400 print:hidden">
                    <div>
                        <h2 class="uppercase text-lg text-center ml-3 font-extrabold text-cyan-800">Selectionner le stage</h2>
                    </div>
                    <form action="">

                                    <div>

                                                <select name="selStage" class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  required x-model="selStage" x-on:change="addStage()">
                                                    <option value="{}" selected>Select ...</option>
                                                    @foreach ($stages as $stage)
                                                        <option value="{{$stage}}" >{{$stage->stagiaire->nom}} {{$stage->stagiaire->prenom}} ( du {!! date('d/m/Y', strtotime($stage->dateDebut)) !!} à {{$stage->affectation}})</option>
                                                    @endforeach

                                                </select>

                                        </div>


                            </form>

                    <div class="py-2">

                    </div>

                    </div>
                    <div class="">

                            <template x-for="stage in selStages">
                                <div class="shadow-md sm:rounded-lg p-4 bg-lime-400 mt-6 mb-6 border-8 border-slate-900 text-xl" style="width: 500px">
                                    <div class="flex justify-between">
                                        <div class="underline-offset-8">
                                            Stagiaire:
                                        </div>
                                        <div class="text-center grow font-black">
                                            <span x-text="stage.stagiaire.gender_situation"></span>
                                            <span x-text="stage.stagiaire.nom" class="uppercase"></span>
                                            <span x-text="stage.stagiaire.prenom" class="uppercase"></span>
                                        </div>

                                    </div>
                                    <div class="flex justify-between">
                                        <div class="underline-offset-8">
                                            Période:
                                        </div>
                                        <div class="text-center grow">
                                            du
                                            <span x-text="stage.dateDebut.split('-').reverse().join('/')"></span>
                                            au
                                            <span x-text="stage.dateFin.split('-').reverse().join('/')"></span>

                                        </div>

                                    </div>
                                    <div class="flex justify-between">
                                        <div class="underline-offset-8">
                                            Affectation:
                                        </div>
                                        <div class="text-center grow">

                                            <span x-text="stage.affectation"></span>

                                        </div>

                                    </div>
                                    <div class="flex justify-between">
                                        <div class="underline-offset-8">
                                            Objet:
                                        </div>
                                        <div class="text-center grow">

                                            <span x-text="stage.subject"></span>

                                        </div>

                                    </div>
                                </div>

                            </template>




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
        selStage : null,
        selStages : [],
        addStage: function(){
            this.selStages.push(JSON.parse(this.selStage));
        },
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



