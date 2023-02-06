<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    <div class="m-auto">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="flex justify-center items-center flex-col w-full">


                                    <h2 class="uppercase text-lg text-center font-extrabold bg-teal-900 text-yellow-100 rounded-md p-1 mb-2">Ajouter un nouvel agent</h2>

                                <div class="flex justify-center items-center bg-slate-600 p-2 rounded-md w-full">
                                <form method="POST" action="{{route('agents.store')}}" enctype="multipart/form-data" class="w-full">
                            @csrf


                            <!-- <fieldset class="border border-solid border-red-600 p-3 text-blue-700 mt-2"> -->




                <div class="flex justify-between flex-col">
                    <div class="flex justify-around">
                        <div class="ml-1">
                                <x-label for="mle" :value="__('Mle')" class="text-white font-extrabold"/>
                                <x-input id="mle" name="mle" class="block mt-1"  type="text"/>
                            </div>
                            <div class="ml-2">
                                <x-label for="nom" :value="__('Nom')" class="text-white font-extrabold"/>
                                <x-input id="nom" name="nom" class="block mt-1 w-full" type="text"/>
                            </div>
                            <div class="ml-2">
                                <x-label for="prenom" :value="__('Prénom')" class="text-white font-extrabold"/>
                                <x-input id="prenom" name="prenom" class="block mt-1 w-full" type="text"/>
                            </div>
                            <div class="ml-2">
                                <x-label for="affectation" :value="__('Affectation')" class="text-white font-extrabold"/>
                                <x-input id="affectation" name="affectation" class="block mt-1 w-full" type="text" />
                            </div>
                    </div>
                    <div class="flex justify-around">

                            <div class="ml-2">
                                <x-label for="specialite" :value="__('Spécialité')" class="text-white font-extrabold"/>
                                <x-input id="specialite" name="specialite" class="block mt-1 w-full" type="text"/>
                            </div>
                            <div class="ml-2">
                                <x-label for="diplome" :value="__('Diplôme')" class="text-white font-extrabold"/>
                                <x-input id="diplome" name="diplome" class="block mt-1 w-full" type="text"/>
                            </div>
                            <div class="ml-2">
                                <div class="">
                                        <x-label for="observation" :value="__('Observation')" class="block w-full text-white font-extrabold"/>
                                        <x-textarea id="observation" name="observation" class="block mt-1 w-full grow"/>
                                </div>


                            </div>
                            <div class="">
                                    <x-button class="mt-5">
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

    })


</script>
