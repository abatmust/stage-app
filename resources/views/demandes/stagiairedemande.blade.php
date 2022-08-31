<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-12" x-data>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-center">

                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="">
                            <h2 class="uppercase text-lg text-center ml-3 font-extrabold">modifier le demandeur</h2>
                                <div class="flex space-x-2">
                                    <div class="border border-black p-2">
                                        @if($demande->stagiaires->count() == 0)
                                            <div class="inline-flex items-center justify-center mt-4 px-2 py-5 text-xl font-bold leading-none text-blue-500 bg-orange-600 rounded-full">Aucun stagiaire associé à cette demande</div>
                                        @else
                                            <h3 class="mt-5 mb-2 text-green-600 uppercase">liste des stagiaires associés à cette demande</h3>
                                            <ul class="list-disc marker:text-blue-500">
                                                @foreach ($demande->stagiaires as $stagiaire)
                                                    <li>{{$stagiaire->nom}} {{$stagiaire->prenom}}
                                                        <form action="{{route('detachStagiaireFromDemande', ['demande' => $demande->id])}}" method="POST" class="inline" onsubmit="dealSubmit(event)">
                                                            @csrf
                                                            <input name="stagiaireToDetach" type="hidden" value="{{$stagiaire->id}}">
                                                            <button>
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="red">
                                                                    <title>Détacher</title>
                                                                    <path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
                                                                </svg>
                                                            </button>

                                                        </form>

                                                    </li>
                                                @endforeach
                                            </ul>

                                        @endif

                                    </div>
                                    <div class="border border-black p-2">
                                        <h3 class="uppercase text-lg text-center ml-3 font-extrabold">Ajouter un demandeur</h3>
                                        <form action="{{route('addStagiaireToDemande', ['demande' => $demande->id])}}" method="POST">
                                            @csrf
                                                <div>
                                                            <x-label for="demandeur" :value="__('Demandeur')" />
                                                            <select name="demandeur" class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  required>
                                                                        <option value="" disabled selected>Choisir...</option>
                                                                        @foreach ($stagiaires as $stagiaire )
                                                                            <option value="{{$stagiaire->id}}" @if($demande->stagiaires->pluck('id')->contains($stagiaire->id)) disabled @endif > {{$stagiaire->nom}} {{$stagiaire->prenom}}</option>
                                                                        @endforeach


                                                            </select>
                                                </div>
                                                <div class="flex items-center justify-end mt-4">
                                                    <x-button class="ml-4">
                                                        {{ __('Ajouter') }}
                                                    </x-button>

                                                </div>

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
            submitDealing(event){
                let submitable = false;
                submitable = confirm("Etes vous sûr ?");
                if(!submitable){
                    event.preventDefault();
                }


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

<script>
    let dealSubmit = (event) => {
        let submitable = false;
                submitable = confirm(`Etes vous sûr de vouloir détacher ce stagiaire de la présente demande ?`);
                if(!submitable){
                    event.preventDefault();
                }

    }

</script>
