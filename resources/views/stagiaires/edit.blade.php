<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col" x-data="addRequesterForm">

                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="flex justify-center items-center">

                                <h2 class="uppercase text-lg text-center font-extrabold text-green-600">Modifier les données d'un stagiaire</h2>

                        </div>
                        <div class="m-auto">
                        <form method="POST" action="{{route('stagiaires.update', ['stagiaire' => $stagiaire->id])}}" enctype="multipart/form-data" style="background-color:#AED6F1; padding:6px; border-radius: 5px;">
                            @csrf
                            @method('PUT')

                            <!-- <fieldset class="border border-solid border-red-600 p-3 text-blue-700 mt-2"> -->
                            <div id="myRequesters" class="m-2">

                            <div class="flex justify-between">

                                        <div>
                                                    <x-label for="nom" :value="__('Nom')" />
                                                    <x-input name="stagiaire[nom]" class="block mt-1 w-full" value="{{$stagiaire->nom}}" type="text" required autofocus/>
                                        </div>
                                        <div>
                                                    <x-label for="prenom" :value="__('Prénom')" />
                                                    <x-input id="prenom" @keyup.tab="setCurrentDate()" name="stagiaire[prenom]" class="block mt-1 w-full" value="{{$stagiaire->prenom}}" type="text" required/>
                                        </div>
                                        <div>
                                                    <x-label for="email" :value="__('Email')" />
                                                    <x-input id="email" name="stagiaire[email]" class="block mt-1 w-full" type="email" value="{{$stagiaire->email}}"/>
                                        </div>
                                        <div>
                                                    <x-label for="telephone" :value="__('Téléphone')" />
                                                    <x-input id="telephone" name="stagiaire[phone]" class="block mt-1 w-full" type="text" value="{{$stagiaire->phone}}"/>
                                        </div>
                                </div>
                                <div class="flex justify-between">
                                        <div>
                                                    <x-label for="cin" :value="__('CIN')" />
                                                    <x-input id="cin" name="stagiaire[cin]" class="block mt-1 w-full" type="text" value="{{$stagiaire->cin}}"/>
                                        </div>

                                        <div>
                                            <x-label for="gender" :value="__('Mr/Mme/Mlle')" class="block w-full"/>
                                                <select name="stagiaire[gender_situation]" class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  required>
                                                            <option value="" disabled>Choisir...</option>
                                                            <option @if ($stagiaire->gender_situation == "Mr")
                                                                selected
                                                            @endif value="Mr">Mr</option>
                                                            <option @if ($stagiaire->gender_situation == "Mlle")
                                                                selected
                                                            @endif value="Mlle">Mlle</option>
                                                            <option @if ($stagiaire->gender_situation == "Mme")
                                                                selected
                                                            @endif value="Mme">Mme</option>
                                                </select>
                                        </div>
                                        <div>
                                                    <x-label for="institut" :value="__('Institut')" />
                                                    <x-input pattern="[A-Z]*" id="institut" name="stagiaire[institut]" class="block mt-1 w-full" type="text" value="{{$stagiaire->institut}}"/>
                                        </div>
                                        <div>
                                                    <x-label for="ville" :value="__('Ville')" />
                                                    <x-input id="ville" name="stagiaire[ville]" class="block mt-1 w-full" type="text" value="{{$stagiaire->ville}}"/>
                                        </div>
                                        <div class="">
                                            <x-button class="mt-7">
                                                {{ __('Modifier') }}
                                            </x-button>
                                        </div>
                                </div>

                            </div>
                            <!-- </fieldset> -->

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
