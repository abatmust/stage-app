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

                                <h2 class="uppercase text-lg text-center ml-3">Modifier une demande</h2>

                        </div>
                        <form method="POST" action="{{route('requests.update', ['demande' => $demande->id ])}}" enctype="multipart/form-data" style="background-color:#AED6F1; padding:6px; border-radius: 5px">
                            @csrf
                            @method('PUT')

                            <fieldset class="border border-solid border-red-800 p-3 text-blue-700 mt-2">
                            <div id="myRequesters" class="m-2">
                                <legend class="text-sm uppercase">la demande</legend>
                            <div class="flex space-x-2">

                                        <div>
                                                    <x-label for="num_saf" :value="__('N° SAF')" />
                                                    <x-input name="demande[num_saf]" class="block mt-1 w-full" value="{{$demande->num_saf}}" type="text" required autofocus/>
                                        </div>
                                        <div>
                                                    <x-label for="date_saf" :value="__('Date SAF')" />
                                                    <x-input id="saf_date" @keyup.tab="setCurrentDate()" name="demande[date_saf]" class="block mt-1 w-full" value="{{$demande->date_saf}}" type="date" required/>
                                        </div>
                                        <div>
                                                    <x-label for="pieces" :value="__('Pièces')" />
                                                    <x-input name="demande[pieces]" class="block mt-1 w-full" type="text" value="{{$demande->pieces}}"/>
                                        </div>
                                        <div>
                                                    <x-label for="periode_demandee" :value="__('Période demandée')" />
                                                    <x-input name="demande[periode_demandee]" class="block mt-1 w-full" type="text" value="{{$demande->periode_demandee}}"/>
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
                                    {{ __('Modifier') }}
                                </x-button>

                            </div>

                        </form>

                        {{$demande}}
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
