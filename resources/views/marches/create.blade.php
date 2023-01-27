<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    <div class="m-auto"  x-data="addRequesterForm">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="flex justify-center items-center flex-col">


                                    <h2 class="uppercase text-lg text-center font-extrabold bg-teal-900 text-yellow-100 rounded-md p-1 mb-2">Ajouter un nouveau marché ou bon de commande</h2>

                                <div class="flex justify-center items-center bg-slate-600 p-2 rounded-md">
                                <form method="POST" action="{{route('marches.store')}}" enctype="multipart/form-data">
                            @csrf


                            <!-- <fieldset class="border border-solid border-red-600 p-3 text-blue-700 mt-2"> -->




                <div class="flex justify-between">
                <div>
                                    <x-label for="ref" :value="__('Réf.')" class="text-white font-extrabold"/>
                                    <x-input id="ref" name="ref" class="block mt-1 w-full" type="text"/>
                            </div>
                            <div>
                                <x-label for="objet" :value="__('Objet')" class="text-white font-extrabold"/>
                                <x-textarea id="objet" name="objet" class="block mt-1 w-full"/>
                            </div>
                            <div>
                                    <x-label for="type" :value="__('Type')" class="text-white font-extrabold"/>
                                    <select name="type" class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  required>
                                                <option value="" disabled selected>Choisir...</option>
                                                @foreach (['Marché','BDC'] as $type )
                                                    <option value="{{$type}}"> {{$type}} </option>
                                                @endforeach


                                    </select>
                            </div>

                            </div>
                <div class="flex justify-between">
                            <div>
                                    <x-label for="annee" :value="__('Année')" class="text-white font-extrabold"/>
                                    <x-input id="annee" name="annee" class="block mt-1 w-full" type="text"/>
                            </div>

                <div>
                                    <x-label for="imputationBudgetaire" :value="__('Imputation Budgetaire')" class="text-white font-extrabold"/>
                                    <x-input id="imputationBudgetaire" name="imputationBudgetaire" class="block mt-1 w-full" type="text"/>
                            </div>
                            <div>
                                    <x-label for="prestataire" :value="__('Prestataire')" class="text-white font-extrabold"/>
                                    <x-input id="prestataire" name="prestataire" class="block mt-1 w-full" type="text"/>
                            </div>
                            </div>
                <div class="flex justify-between">
                            <div>
                                    <x-label for="montant" :value="__('Montant')" class="text-white font-extrabold"/>
                                    <x-input id="montant" name="montant" class="block mt-1 w-full" type="number" step=".01"/>
                            </div>


                            <div class="flex justify-end">
                                <div class="">
                                    <x-button class="mt-7">
                                        {{ __('Ajouter') }}
                                    </x-button>
                                </div>
                            </div>

                </div>


                            <!-- </fieldset> -->

                        </form>
                                </div>



                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>

    document.addEventListener('alpine:init', () => {
        Alpine.data('addRequesterForm', () => ({
            requestersNumber:1,
            stg:{},
            requesters:[],
            addRequester(){
                alert('add requester new')
                const {cin, nom} = this.stg
                console.log('cin', cin, 'nom', nom)
                this.requesters.push(this.stg)
                console.log(this.requesters)

            },
            reqnumincrease(){
                this.requestersNumber++

            },
            reqnumdecrease(){
                if(this.requestersNumber>1){
                     this.requestersNumber--
                }

            },
            removeRequester(){
                const myrequesters = document.getElementById('myRequesters')
                myrequesters.removeChild(myrequesters.lastChild)
            },
            newRequester() {
                var temp = document.getElementsByTagName("template")[0];
                var clon = temp.content.cloneNode(true);
                // document.body.appendChild(clon);
                document.getElementById('myRequesters').appendChild(clon)

            },
            removeParent(e){
                //console.log(e.parentElement.parentElement.nodeName)
                e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);

            },
            setCurrentDate(){
                document.getElementById('saf_date').value = new Date().toISOString().split('T')[0];
            }
        }))
    })


</script>
