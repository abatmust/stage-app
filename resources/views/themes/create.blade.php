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


                                    <h2 class="uppercase text-lg text-center font-extrabold bg-teal-900 text-yellow-100 rounded-md p-1 mb-2">Ajouter un nouveau thème de formation</h2>

                                <div class="flex justify-center items-center bg-slate-600 p-2 rounded-md w-full">
                                <form method="POST" action="{{route('themes.store')}}" enctype="multipart/form-data" class="w-full">
                            @csrf


                            <!-- <fieldset class="border border-solid border-red-600 p-3 text-blue-700 mt-2"> -->




                <div class="flex justify-between">

                            <div class="w-full">
                                <x-label for="objet" :value="__('Objet')" class="text-white font-extrabold"/>
                                <x-textarea id="objet" name="objet" class="block mt-1 w-full"/>
                            </div>


                </div>




                            <div class="flex justify-end">
                                <div class="">
                                    <x-button class="mt-5">
                                        {{ __('Ajouter') }}
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
