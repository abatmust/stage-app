<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    <div class=""  x-data="addRequesterForm">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="flex justify-center items-center">
                                <button @click="reqnumdecrease()">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="orange">
                                        <title>Eliminer un demandeur</title>
                                        <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>

                                </button>
                                <h2 class="uppercase text-lg text-center ml-3">Ajouter un nouveau demandeur</h2>
                                <button @click="reqnumincrease()">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-3" fill="none" viewBox="0 0 24 24" stroke="orange" stroke-width="2">
                                        <title>Ajouter un nouveau demandeur</title>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                        </div>
                        <form method="POST" action="{{route('requests.store')}}" enctype="multipart/form-data" style="background-color:#AED6F1; padding:6px; border-radius: 5px">
                            @csrf
                            <fieldset class="border border-solid border-red-800 p-3 text-orange-600">
                            <div id="myRequesters" class="m-2">
                                <legend class="text-sm uppercase">les demandeurs</legend>
                            <div class="flex space-x-2">
                                        <div>
                                            <x-label for="gender" :value="__('Mr/Mme/Mlle')" class="w-full"/>
                                                <select name="requesters[gender][]" class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  required>
                                                            <option value="">Choisir...</option>
                                                            <option value="Mr">Mr</option>
                                                            <option value="Mlle">Mlle</option>
                                                            <option value="Mme">Mme</option>
                                                </select>
                                        </div>
                                        <div>
                                                    <x-label for="cin" :value="__('CIN')" />
                                                    <x-input name="requesters[cin][]" class="block mt-1 w-full" type="text"/>
                                        </div>
                                    <div>
                                        <x-label for="nom" :value="__('Nom')" />
                                        <x-input name="requesters[nom][]" class="block mt-1 w-full" type="text" required/>
                                    </div>
                                    <div>
                                        <x-label for="prenom" :value="__('Prénom')" />
                                        <x-input name="requesters[prenom][]" class="block mt-1 w-full" type="text" required/>
                                    </div>
                                        <div class="">
                                            <x-label for="email" :value="__('Email')" />
                                            <x-input name="requesters[email][]" class="block mt-1 w-full" type="email"/>
                                        </div>
                                        <div>
                                            <x-label for="phone" :value="__('Téléphone')" />
                                            <x-input name="requesters[phone][]" class="block mt-1 w-full" type="text"/>
                                        </div>
                                        <div>
                                            <x-label for="institut" :value="__('Institut')" />
                                            <x-input name="requesters[institut][]" class="block mt-1 w-full" type="text"/>
                                        </div>
                                        <div>
                                            <x-label for="ville" :value="__('Ville')" />
                                            <x-input name="requesters[ville][]" class="block mt-1 w-full" type="text"/>
                                        </div>
                                        <div class="flex items-center" style="width:28px">

                                        </div>
                                </div>

                            </div>
                            <!-- Name -->
                            <template x-for="int in (requestersNumber-1)">

                                <div class="flex space-x-2">

                                <div>
                                                <select name="requesters[gender][]" class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" class="rounded-md shadow-sm border-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                            <option value="">Choisir...</option>
                                                            <option value="Mr">Mr</option>
                                                            <option value="Mlle">Mlle</option>
                                                            <option value="Mme">Mme</option>
                                                </select>
                                        </div>
                                        <div>
                                                    <x-input name="requesters[cin][]" class="block mt-1 w-full" type="text"/>
                                        </div>
                                    <div>
                                        <x-input name="requesters[nom][]" class="block mt-1 w-full" type="text"/>

                                    </div>
                                    <div>
                                        <x-input name="requesters[prenom][]" class="block mt-1 w-full" type="text"/>
                                    </div>
                                        <div class="">
                                            <x-input name="requesters[email][]" class="block mt-1 w-full" type="email"/>
                                        </div>
                                        <div>
                                            <x-input name="requesters[phone][]" class="block mt-1 w-full" type="text"/>
                                        </div>
                                        <div>
                                            <x-input name="requesters[institut][]" class="block mt-1 w-full" type="text"/>
                                        </div>
                                        <div>
                                            <x-input name="requesters[ville][]" class="block mt-1 w-full" type="text"/>
                                        </div>

                                        <div class="flex items-center">
                                            <button @click.prevent="removeParent($el)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="orange">
                                                    <title>Eliminer un demandeur</title>
                                                    <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                                </svg>

                                            </button>
                                        </div>

                                </div>
                            </template>
                            </fieldset>
                            <fieldset class="border border-solid border-red-800 p-3 text-blue-700 mt-2">
                            <div id="myRequesters" class="m-2">
                                <legend class="text-sm uppercase">la demande</legend>
                            <div class="flex justify-around">

                                        <div>
                                                    <x-label for="num_saf" :value="__('N° SAF')" />
                                                    <x-input name="demande[num_saf]" class="block mt-1 w-full" type="text" required autofocus/>
                                        </div>
                                        <div>
                                                    <x-label for="date_saf" :value="__('Date SAF')" />
                                                    <x-input id="saf_date" @keyup.tab="setCurrentDate()" name="demande[date_saf]" class="block mt-1 w-full" type="date" required/>
                                        </div>
                                        <div>
                                                    <x-label for="pieces" :value="__('Pièces')" />
                                                    <x-input name="demande[pieces]" class="block mt-1 w-full" type="text"/>
                                        </div>
                                        <div>
                                                    <x-label for="periode_demandee" :value="__('Période demandée')" />
                                                    <x-input name="demande[periode_demandee]" class="block mt-1 w-full" type="text"/>
                                        </div>


                            </div>
                            <div class="flex justify-around">
                            <div class="">
                                            <x-label for="observation" :value="__('Observation')" class="block w-full"/>
                                            <x-textarea id="observation" name="demande[observation]" class="block mt-1 w-full"/>

                                            </div>
                                        <div>
                                                    <x-label for="PJ" :value="__('Pièce jointe')" />
                                                    <x-input name="PJ" accept="application.pdf" class="inline-flex items-end px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="file"/>
                                        </div>
                            </div>
                            </div>
                            </fieldset>
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Ajouter') }}
                                </x-button>

                            </div>

                        </form>
                    </div>
                    <ul>
                    </ul>
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
