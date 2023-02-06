<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-12 bg-gradient-to-r from-cyan-300 to-blue-800 min-h-screen">
        <div class="max-w-max mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg relative">
                <div
                class="absolute transform -rotate-45 bg-orange-600 z-10 text-center text-white font-semibold py-1 left-[-40px] top-[32px] w-[170px]">
                Formation
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col justify-center items-center">
                    @if (Session::has('info'))
                        {{Session::get('info')}}
                    @endif
                <div class="flex items-center">
                    <x-dropdown-link :href="route('sessions.create')" class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-blue-800 hover:text-rose-800">
                            <title>Ajouter une nouvelle session</title>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />



                        </svg>

                    </x-dropdown-link>

                    <h2 class="uppercase text-lg text-center ml-3 font-extrabold">Détail de participation à la session de formation</h2>
                                <a href="{{route('sessions.edit',['session' => $session->id])}}" class="ml-5 font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <title>Edit</title>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>


            </div>
                <div class="">
                    <div class="flex justify-between">
                        <div class="border-2 border-teal-700 p-1 rounded-md grow text-center font-bold m-2 bg-emerald-900 text-neutral-50">
                            Thème: {{ $session->theme->objet}}
                        </div>
                        <div class="border-2 border-teal-700 p-1 rounded-md grow text-center font-bold m-2 bg-emerald-900 text-neutral-50">
                             {!! date('d/m/Y', strtotime($session->dateDebut)) !!} au  {!! date('d/m/Y', strtotime($session->dateFin)) !!}
                        </div>
                        <div class="border-2 border-teal-700 p-1 rounded-md grow text-center font-bold m-2 bg-emerald-900 text-neutral-50">
                             {{ $session->periode}}
                        </div>
                        <div class="border-2 border-teal-700 p-1 rounded-md grow text-center font-bold m-2 bg-emerald-900 text-neutral-50">
                             {{ $session->nbreParticipants}} participants
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="border-2 border-teal-700 p-1 rounded-md grow text-center font-bold m-2 bg-emerald-900 text-neutral-50">
                             {{ $session->nbreJours}} jours
                        </div>
                        <div class="border-2 border-teal-700 p-1 rounded-md grow text-center font-bold m-2 bg-emerald-900 text-neutral-50">
                            lieu: {{ $session->lieu}}
                        </div>
                        <div class="border-2 border-teal-700 p-1 rounded-md grow text-center font-bold m-2 bg-emerald-900 text-neutral-50">
                            animé par: {{ $session->animateur}}
                        </div>
                        <div class="border-2 border-teal-700 p-1 rounded-md grow text-center font-bold m-2 bg-emerald-900 text-neutral-50">
                            Marché: {{ $session->marche->ref}} {{ $session->marche->objet}}
                        </div>
                    </div>
                    <div class="border-2 border-red-700 p-1 rounded-md grow text-center font-bold m-2 bg-red-400 text-neutral-50">
                            les participants
                        </div>
                        <div class="flex justify-around">
                            <div class="bg-slate-900 rounded-md p-2 border-4 border-slate-900 text-gray-900">
                                <h2 class="font-extrabold uppercase text-white text-center">liste des participants</h2>
                                <ul>
                                        @foreach ($session->agents as $agent)
                                        <div class="flex">
                                        <li class="w-full p-0 text-white">{{$agent->mle}}: {{$agent->nom}} {{$agent->prenom}}</li>
                                                <form action="{{route('sessions.detachAgent', ['session' => $session->id, 'agent'=> $agent->mle])}}" method="POST" class="inline" onsubmit="dealSubmit(event)">
                                                            @csrf

                                                            <button>
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="red">
                                                                    <title>Détacher</title>
                                                                    <path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
                                                                </svg>
                                                            </button>

                                                        </form>
                                        </div>

                                        @endforeach
                                </ul>


                            </div>
                            <div class="bg-orange-400 rounded-md p-2 border-4 border-slate-900 text-gray-900" x-data="addParticipantForm">
                                    <div class="flex mb-2">
                                        <h2 class="font-extrabold uppercase">Ajouter des agents à cette session de formation</h2>
                                            <button @click="newParticipant()">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-3" fill="none" viewBox="0 0 24 24" stroke="gray" stroke-width="2">
                                                        <title>Ajouter un nouveau participant</title>
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                                    </svg>
                                            </button>
                                    </div>

                                    <form method="POST" action="{{route('sessions.addAgents', ['session'=> $session->id])}}" enctype="multipart/form-data" class="w-full">
                                        @csrf

                                        <div class="flex justify-around">
                                            <div class="flex flex-col" id="agents_div">

                                                <x-input list="agents" id="agent_mle" name="agent_mle[]" class="block w-full p-0 text-center mb-1" required/>
                                                <datalist id="agents" >
                                                        @foreach ($agents as $agent)
                                                                        <option class="w-full p-0" value="{{$agent->mle}}">{{$agent->nom}} {{$agent->prenom}}</option>
                                                        @endforeach
                                                </datalist>

                                            </div>

                                            <div class="">
                                                <x-button class="">
                                                    {{ __('Ajouter') }}
                                                </x-button>
                                            </div>

                                        </div>



                                    </form>

                            </div>
                        </div>

                </div>
        </div>
    </div>
</x-app-layout>

    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    <script>
 document.addEventListener('alpine:init', () => {
        Alpine.data('addParticipantForm', () => ({
            particpantsNumber:1,
            particpants:[],
            newParticipant (){
                const node = document.getElementById("agent_mle");
                const clone = node.cloneNode(true);
                document.getElementById("agents_div").appendChild(clone);
            }

        }))})
</script>


