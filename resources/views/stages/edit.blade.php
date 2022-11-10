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


                                    <h2 class="uppercase text-lg text-center font-extrabold">Modifier un stage</h2>

                                <div class="flex justify-center items-center">
                                <form method="POST" action="{{route('stages.update', ['stage' => $stage->id])}}" enctype="multipart/form-data" style="background-color:#AED6F1; padding:6px; border-radius: 5px;">
                            @csrf
                            @method('PUT')


                            <!-- <fieldset class="border border-solid border-red-600 p-3 text-blue-700 mt-2"> -->
                            <div id="myRequesters" class="m-2">

                            <div class="flex justify-between">

                                        <div>
                                                    <x-label for="dateDebut" :value="__('Date Debut')" />
                                                    <x-input name="dateDebut" class="block mt-1 w-full" type="date" value="{{$stage->dateDebut}}" autofocus/>
                                        </div>
                                        <div>
                                                    <x-label for="dateFin" :value="__('Date Fin')" />
                                                    <x-input name="dateFin" class="block mt-1 w-full" type="date" value="{{$stage->dateFin}}"/>
                                        </div>
                                        <div>
                                                    <x-label for="subject" :value="__('Sujet')" />
                                                    <x-textarea id="subject" name="subject" class="block mt-1 w-full" value="{{$stage->subject}}"/>
                                        </div>

                                </div>
                                <div class="flex justify-between">
                                        <div>
                                                    <x-label for="attestationReferences" :value="__('Références Attestation')" />
                                                    <x-input id="attestationReferences" name="attestationReferences" class="block mt-1 w-full" type="text" value="{{$stage->attestationReferences}}"/>
                                        </div>

                                        <div>
                                            <x-label for="attestationStatut" :value="__('Statut Attestation')" class="block w-full"/>
                                                <select name="attestationStatut" class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                            <option value="" disabled>Choisir...</option>
                                                            <option value="">...</option>
                                                            <option @if ($stage->attestationStatut == "A établir")
                                                                selected
                                                            @endif value="A établir">A établir</option>
                                                            <option @if ($stage->attestationStatut == "Etablie")
                                                                selected
                                                            @endif value="Etablie">Etablie</option>
                                                            <option @if ($stage->attestationStatut == "Délivrée")
                                                                selected
                                                            @endif value="Délivrée">Délivrée</option>
                                                </select>
                                        </div>
                                        <div>
                                                            <x-label for="stagiaire_id" :value="__('Stagiaire')" />
                                                            <select name="stagiaire_id" class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  required>
                                                                        <option value="" disabled selected>Choisir...</option>
                                                                        @foreach ($stagiaires as $stagiaire )
                                                                            <option value="{{$stagiaire->id}}" @if ($stage->stagiaire_id == $stagiaire->id) selected @endif> {{$stagiaire->nom}} {{$stagiaire->prenom}}</option>
                                                                        @endforeach


                                                            </select>
                                            </div>
                                        </div>

                                        <div class="flex justify-between">
                                            <div class="">
                                                    <x-label for="affectation" :value="__('Affectation')" class="block w-full"/>
                                                    <!-- <input list="affectations" id="affectation" class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"> -->
                                                    <x-input list="affectations" id="affectation" name="affectation" class="block mt-1 w-full" value="{{$stage->affectation}}"/>
                                                    <datalist id="affectations" >
                                                        @foreach ($entities as $key => $entity)
                                                            <option value="{{$key}}" >{{$entity}}</option>
                                                        @endforeach
                                                        </datalist>
                                            </div>
                                            <x-button class="mt-7">
                                                {{ __('Modifier') }}
                                            </x-button>
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
