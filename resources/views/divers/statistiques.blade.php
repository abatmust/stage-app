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
                    <div class="mt-4" x-show="selannee !== null">

                        <table class="min-w-full text-center  bg-cyan-700">
                            <thead class="border-b">

                                <tr>
                                <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                    Nbre de stages
                                </th>


                                    <th scope="col" class="text-sm font-medium text-gray-50 px-6 py-2">
                                          Entités
                                    </th>


                                </tr>
                            </thead class="border-b">
                            <tbody>

                                <tr class="bg-cyan-400 border-b">
                                <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900" x-text="stagesoftheyear.length"></td>

                                <td class="text-sm text-cyan-900 font-light px-6 py-2 whitespace-nowrap">

                                </td>

                                </tr class="bg-white border-b">


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
        selannee : null,
        stagesoftheyear: [],
        entities : [],
        entitiesaffectation : [],

        addStage: function(){
            this.selStages.push(JSON.parse(this.selStage));
        },
        newSelection : function (){

            console.log(this.selannee);
            fetch("api/api.statistiques/"+this.selannee, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            },
            }).then(response => response.json()).then(response => {
                const distinct = (value, index, self) => {
                    return self.indexOf(value) === index;
                }
                console.log("response",response)
                this.stagesoftheyear = response
                this.entities = this.stagesoftheyear.map(a => a.affectation).filter(distinct);



            }).catch(error => {
                console.log("error",error)
            })
        }
        }
        }
    </script>



