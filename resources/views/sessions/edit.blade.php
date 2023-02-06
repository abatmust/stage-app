<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    <div class="m-auto"  x-data="addRequesterForm">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="flex justify-center items-center flex-col">


                                    <h2 class="uppercase text-lg text-center font-extrabold bg-teal-900 text-yellow-100 rounded-md p-1 mb-2">Modifier une session de formation</h2>

                                <div class="flex justify-center items-center bg-slate-600 p-2 rounded-md w-full">
                                <form method="POST" action="{{route('sessions.update', ['session' => $session->id])}}" enctype="multipart/form-data" class="w-full">
                            @csrf
                            @method('PUT')


                            <!-- <fieldset class="border border-solid border-red-600 p-3 text-blue-700 mt-2"> -->




                            <div class="flex justify-between flex-col">
                    <div class="flex justify-around">
                        <div class="w-[110px] ml-1">
                                <x-label for="dateDebut" :value="__('Date Début')" class="text-white font-extrabold"/>
                                <x-input id="dateDebut" name="dateDebut" class="block mt-1 w-[110px]" type="date"  value="{{$session->dateDebut}}"/>
                            </div>
                            <div class="w-[110px] ml-2">
                                <x-label for="datefin" :value="__('Date Fin')" class="text-white font-extrabold"/>
                                <x-input id="dateFin" name="dateFin" class="block mt-1 w-full" type="date" value="{{$session->dateFin}}"/>
                            </div>
                            <div class="w-[110px] ml-2">
                                <x-label for="periode" :value="__('Période')" class="text-white font-extrabold"/>
                                <x-input id="periode" name="periode" class="block mt-1 w-full" type="text" value="{{$session->periode}}"/>
                            </div>
                            <div class="w-[60px] ml-2">
                                <x-label for="nbreParticipants" :value="__('Nbre Participants')" class="text-white font-extrabold"/>
                                <x-input id="nbreParticipants" name="nbreParticipants" class="block mt-1 w-full" type="number" step="1" value="{{$session->nbreParticipants}}"/>
                            </div>
                    </div>
                    <div class="flex justify-around">

                            <div class="w-[110px] ml-2">
                                <x-label for="lieu" :value="__('Lieu')" class="text-white font-extrabold"/>
                                <x-input id="lieu" name="lieu" class="block mt-1 w-full" type="text" value="{{$session->lieu}}"/>
                            </div>
                            <div class="w-[110px] ml-2">
                                <x-label for="animateur" :value="__('Animateur')" class="text-white font-extrabold"/>
                                <x-input id="animateur" name="animateur" class="block mt-1 w-full" type="text" value="{{$session->animateur}}"/>
                            </div>
                            <div class="w-[110px] ml-2">
                                <x-label for="marche_id" :value="__('Marché ou BDC')" class="text-white font-extrabold"/>
                                <x-input list="marches" id="marche_id" name="marche_id" class="block mt-1 w-full p-2" value="{{$session->marche_id}}"/>
                                <datalist id="marches" >
                                        @foreach ($marches as $marche)

                                                        <option class="block mt-1 w-full p-1" value="{{$marche->id}}">{{$marche->ref}}</option>

                                        @endforeach



                                </datalist>
                            </div>
                            <div class="w-1/4 ml-2">
                                <x-label for="theme_id" :value="__('Thème')" class="text-white font-extrabold"/>
                                <x-input list="themes" id="theme_id" name="theme_id" class="block mt-1 w-full p-2" value="{{$session->theme_id}}"/>
                                <datalist id="themes" >
                                        @foreach ($themes as $theme)

                                                        <option class="block mt-1 w-full p-1" value="{{$theme->id}}">{{$theme->objet}}</option>

                                        @endforeach



                                </datalist>


                            </div>

                        </div>
                </div>


<div class="flex justify-between">
                            <div class="ml-2">
                                <x-label for="nbreJours" :value="__('Nbre Jours')" class="text-white font-extrabold"/>
                                <x-input id="nbreJours" name="nbreJours" class="block mt-1 w-full" type="number" step="1" value="{{$session->nbreJours}}"/>
                            </div>
                            <div class="flex justify-end">

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

    })


</script>
