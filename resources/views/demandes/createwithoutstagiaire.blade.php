<x-app-layout>
    <!-- <x-slot name="header">

    </x-slot> -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    <div class="">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{route('requests.storewithoutstagiaire')}}" enctype="multipart/form-data" style="background-color:#AED6F1; padding:6px; border-radius: 5px">
                            @csrf

                            <fieldset class="border border-solid border-red-800 p-3 text-blue-700 mt-2">
                            <div id="myRequesters" class="m-2">
                                <legend class="text-sm uppercase">la demande (sans stagiaire)</legend>
                            <div class="flex space-x-2">

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

    })


</script>
