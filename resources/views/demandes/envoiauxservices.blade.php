<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            body {
                font-size: 14px !important;
            }
        </style>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased h-screen" x-data="initialisation"
  @keydown.escape="showModal = false">

    <div>
    <!-- Trigger for Modal and print button -->
    <button type="button" @click="showModal = true" class="bg-orange-500 print:hidden p-1 rounded text-blue-900 m-1">Options</button>
    <button type="button" @click="printpage" class="bg-lime-800 print:hidden p-1 rounded text-blue-300 m-1">Impression</button>

    <!-- Modal -->
    <div
        class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50 "
        x-show="showModal"
    >
        <!-- Modal inner -->
        <div
            class="max-w-3xl px-6 py-4 mx-auto text-left bg-blue-600 rounded shadow-lg"
            @click.away="showModal = false"
            x-transition:enter="motion-safe:ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
        >
            <!-- Title / Close-->
            <div class="flex items-center justify-between">
                <h5 class="mr-3 text-black max-w-none">Bordereau d'envoi</h5>

                <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- content -->
                                        <div>
                                                    <x-label for="service" :value="__('Service')" />

                                                    <x-input list="services" id="service" name="service" class="block mt-1 w-full p-1" x-model="destinataire"/>
                                                    <datalist id="services" >

                                                    <template x-for="(ent, entity) in ents">
                                                        <option class="block mt-1 w-full p-1" :value="entity" x-text="ent"></option>
                                                    </template>






                                                        </datalist>

                                        </div>
                                        <div class="flex">
                                        <div>
                                                    <x-label for="demande" :value="__('Demande')" />

                                                    <x-input list="demandes" id="demande" name="demande" class="block mt-1 w-full p-1" @keyup.shift.enter="newdemande(); $refs.seldemandeinput.focus()" x-model="seldemande" x-ref="seldemandeinput"/>
                                                    <datalist id="demandes" >


                                                    <template x-for="demande in mesdemandes">
                                                        <option class="block mt-1 w-full p-1" x-text="demande.nom + ' ' + demande.prenom" :value="demande.id"></option>
                                                    </template>






                                                        </datalist>

                                        </div>
                                        <div class="flex items-end">
                                            <x-button class="ml-2" @click="newdemande(); $refs.seldemandeinput.focus()">
                                                {{ __('Ajouter') }}
                                            </x-button>

                                        </div>


                                    </div>
                                    <div class="bg-yellow-600 text-blue-900 rounded-xl p-2 mt-1">
                                        <h3 class="uppercase underline p-1 bg-red-500 rounded-lg">Liste des demandeurs de stages:</h3>
                                    <ul>
                                            <template x-for="dmd in seldemandes">
                                                        <li class="block mt-1 w-full p-1" x-text="getdemandebyid(dmd)[0].nom + ' ' + getdemandebyid(dmd)[0].prenom" @dblclick="deletedemande(dmd)"></li>

                                            </template>
                                        </ul>
                                    </div>

        </div>
    </div>
</div>





        <div class="flex flex-col h-screen justify-between">
            <header class="flex justify-center">
                <img class="hidden print:block" src="{{ asset('img/pgHeader.png') }}" alt="Entête de la page">
            </header>
            <main class="mb-auto h-10 screen:mx-auto">
                <br>
                <div class="flex">
                    <div class="text-center basis-2/5">N°: <span contenteditable>.....................</span> ORH/SAF/<span class="uppercase" contenteditable>BFP</span></div>
                    <div class="text-center basis-1/5"></div>
                    <div class="text-left basis-2/5">Marrakech, le <span contenteditable>...................................</span></div>
                </div>

                <div contenteditable class="text-center text-lg font-bold">
                    Le Chef du Service Administratif et financier
                </div>
                <div class="text-center uppercase text-2xl font-bold">
                    à
                </div>
                <div contenteditable class="text-center text-lg font-bold" x-text="destinataire">

                </div>
                <div class="text-2xl my-3 flex">
                    <h1 class="rounded-md p-2 mx-auto text-center uppercase font-extrabold border-2 border-black inline">bordereau d'envoi</h1>
                </div>

                <div class="flex w-11/12 mx-auto">
                    <div class="border-2 border-black text-center py-1 w-6/12">Désignation</div>
                    <div class="border-2 border-black text-center py-1 w-1/12 border-x-0">Nbre</div>
                    <div class="border-2 border-black text-center py-1 w-5/12">Observations</div>
                </div>
                <div class="flex w-11/12 mx-auto">
                    <div class="relative border-2 border-black text-center py-1 w-6/12 border-t-0" style="height: 600px">
                        <div class="">
                        <h contenteditable class="underline uppercase font-bold my-4">...</h>
                            <p contenteditable class="text-justify font-semibold ml-1 mt-2">Demande<span x-show="seldemandes.length > 1">s</span> de stage exprimée<span x-show="seldemandes.length > 1">s</span> par:</p>
                        </div>
                        <div class="">

                                            <template x-for="dmd in seldemandes">

                                                        <div class="block mt-1 w-full p-1">
                                                            <div contenteditable class="text-left" x-text="'- ' + getdemandebyid(dmd)[0].nom + ' ' + getdemandebyid(dmd)[0].prenom"></div>
                                                            <div contenteditable x-show="getdemandebyid(dmd)[0].specialite" class="text-center underline" x-text="getdemandebyid(dmd)[0].specialite + '/ ' + getdemandebyid(dmd)[0].institut"></div>
                                                        </div>




                                            </template>

                        </div>
                        <div contenteditable class="absolute bottom-0 p-2 text-xs text-justify"></div>
                    </div>
                    <div class="border-2 border-black text-center py-1 w-1/12 border-t-0 border-x-0 grow-0" style="height: 600px">
                        <br>
                        <template x-for="dmd in seldemandes">

                        <div class="block mt-1 w-full p-1">
                            <div contenteditable class="text-center" x-text="'01'"></div>
                            <div x-show="getdemandebyid(dmd)[0].specialite" class="text-center underline"></div>
                        </div>




                        </template>
                    </div>
                    <div class="border-2 border-black text-center py-1 w-5/12 border-t-0" style="height: 600px">
                        <h contenteditable class="underline uppercase font-bold my-4">transmis</h>
                        <p contenteditable class="mx-2 text-justify">En vous demandant de bien vouloir me faire parvenir dans le plus bref délai votre avis au sujet de l'accueil du stagiaire indiqué ci-contre dans votre entité ainsi que la période de stage prévue.</p>
                    </div>
                </div>




            </main>
            <footer class="flex justify-center">
                <img class="hidden print:block" src="{{ asset('img/pgFooter.png') }}" alt="Pied de la page">
            </footer>
        </div>



        <script>

    document.addEventListener('alpine:init', () => {
        Alpine.data('initialisation', () => ({

            showModal: false,
            destinataire: null,
            seldemande: null,
            ents: {{Js::from($entities)}},
            mesdemandes: {{Js::from($demandes)}},
            seldemandes: [],
            newdemande() {

                this.seldemandes.push(this.seldemande)




            },
            getdemandebyid(id) {
                return this.mesdemandes.filter(item => item.id == id)

            },
            deletedemande(id) {
                this.seldemandes.splice(this.seldemandes.indexOf(id),1)

            },

            printpage(){
                this.showModal = false
                window.print()
            }




        }))
    })
</script>


    </body>
</html>


