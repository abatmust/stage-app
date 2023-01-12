<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-4" x-data = "alpineInstance()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col justify-center items-center">
                    @if (Session::has('info'))
                        {{Session::get('info')}}
                    @endif


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2 px-4 bg-lime-400 print:hidden">
                    <div>
                        <h2 class="uppercase text-lg text-center ml-3 font-extrabold text-cyan-800">Choisir l'année</h2>
                    </div>


                                <input list="annees" id="selannee" class="block p-2 mt-1 w-full border-2 border-slate-700 text-center" @change="newSelection()" x-model="selannee">
                                    <datalist id="annees" >

                                            <option>2022</option>
                                            <option>2023</option>


                                    </datalist>


                    <div class="py-2">

                    </div>

                    </div>
                    <div class="bg-lime-400 mt-2 p-4" x-show="selannee !== null">

                        <table class="w-full text-center table-auto bg-cyan-700">
                            <thead class="border-b">

                                <tr>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Nbre de stages
                                </th>


                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2 grid-rows-4">
                                          Entités
                                </th>



                                </tr>
                            </thead class="border-b">
                            <tbody>

                                    <tr class="bg-cyan-400 border-b">
                                    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900" x-text="stagesoftheyear.length"></td>

                                    <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap">
                                        <template x-for="entity in entities">
                                            <ul>
                                                <li x-text="entity +': ' + numberofstagebyaffectation(entity)" @dblclick="getstagesOfAffectation(entity)"></li>
                                            </ul>
                                        </template>




                                    </td>


                                    </tr>


                            </tbody>
                        </table>




                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2 px-4 bg-lime-400 mt-2">
                    <div>
                        <h2 class="uppercase text-lg text-center ml-3 font-extrabold text-cyan-800">Détail</h2>
                        <h3 class="uppercase text-lg text-center ml-3 font-extrabold text-cyan-800" x-text="myentity"></h3>
                    </div>



                        <table class="w-full text-center table-auto bg-cyan-700">
                            <thead class="border-b">

                                <tr>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Stagiaire
                                </th>


                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2 grid-rows-4">
                                    Période
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Attestation
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Opérations
                                </th>


                                </tr>
                            </thead class="border-b">
                            <tbody>

                            <template x-for="stage in stagesofaffectation">
                                    <tr class="bg-cyan-400 border-b">
                                    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900" x-text="stage.stagiaire.nom + ' ' + stage.stagiaire.prenom"></td>

                                    <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap" x-text="stage.dateDebut.split('-').reverse().join('/') + ' - ' + stage.dateFin.split('-').reverse().join('/')">





                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900" x-text="stage.attestationStatut"></td>
                                    <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap">
                                        <a x-cloak x-bind:href="'stages.edit' +'/' + stage.id" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <title>Edit</title>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>

                                        </a>
                                    </td>
                                    </tr>
                            </template>


                            </tbody>
                        </table>


                    <div class="py-2">

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
        selannee : null,
        myentity : null,
        stagesoftheyear: [],
        stagesofaffectation : [],
        entities : [],
        entitiesaffectation : [],

        addStage: function(){
            this.selStages.push(JSON.parse(this.selStage));
        },
        newSelection : function (){

            //console.log(this.selannee);
            fetch("api/api.statistiques/"+this.selannee, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            },
            }).then(response => response.json()).then(response => {
                const distinct = (value, index, self) => {
                    return self.indexOf(value) === index;
                }
               // console.log("response",response)
                this.stagesoftheyear = response
                this.entities = this.stagesoftheyear.map(a => a.affectation).filter(distinct);



            }).catch(error => {
                console.log("error",error)
            })
            },
            getstagesOfAffectation : function (affectation){
                this.myentity = affectation
                this.stagesofaffectation = this.stagesoftheyear.filter(stage => stage.affectation == affectation)
                console.log('stagesofaffectation', this.stagesofaffectation)

            },
            numberofstagebyaffectation : function (affectation){
                return this.stagesoftheyear.filter(stage => stage.affectation == affectation).length
            }
        }
        }
    </script>



