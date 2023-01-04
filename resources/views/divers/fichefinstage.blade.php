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
                font-family: Arial, Helvetica, sans-serif !important;
                font-size: 16px !important;
                line-height: 2 !important;
                }
            .myline {
                overflow: hidden;
                width: 2000px;
            }
            .myline .sp-filler-after::after {
                content: '...........................................................................................................................................................................................................................................................................';
            }
            .sp-filler-before::before {
                content: '.........................';
            }
            .data-piece::before, .data-piece::after {
                content: '................................';
            }
        </style>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body contenteditable class="font-sans antialiased h-screen">
        <div class="flex flex-col h-screen justify-between">
            <header class="flex justify-center">
                <img class="hidden print:block" src="{{ asset('img/pgHeader.png') }}" alt="Entête de la page">
            </header>
            <main class="mb-auto h-10 screen:mx-auto">
                <br>
                <div class="flex">
                    <div class="text-center basis-2/5"></div>
                    <div class="text-center basis-1/5"></div>
                    <div class="text-left basis-2/5">Marrakech, le ...................................</div>
                </div>
                <br>
                <div class="flex justify-center">
                    <img class="hidden print:block" src="{{ asset('img/ficheFinStage.png') }}" alt="Fiche de Fin de Stage">
                </div>

                <br>
                <h3 class="uppercase font-extrabold"> <span class=" bg-amber-600 py-1">identification du stage:</span> </h3>
                <div class="myline">
                    <p class="text-lg text-justify screen:text-center">
                        Nom et Prénom du stagiaire:
                        <span class="sp-filler-after sp-filler-before">-</span>
                    </p>
                </div>
                <div class="myline">

                    <p class="text-lg text-justify screen:text-center">
                        Référence (n° envoi du SAF):
                        <span class="sp-filler-after sp-filler-before">-</span>
                    </p>
                </div>
                <div class="myline">
                    <p class="text-lg text-justify screen:text-center">
                        Date début de stage: <span class="data-piece">--/--/----</span> Date fin de stage:<span class="data-piece">--/--/----</span>
                    </p>
                </div>
                <div class="myline">
                <p class="text-lg text-justify screen:text-center">
                    Nombre d'absence:
                    <span class="sp-filler-after sp-filler-before">-</span>
                </p>
                </div>
                <div class="myline">
                <p class="text-lg text-justify screen:text-center">
                    Objet de stage:

                </p>
                <p class="sp-filler-after">-</p>
                <p class="sp-filler-after">-</p>
                <p class="sp-filler-after">-</p>
                <p class="sp-filler-after">-</p>
                </div>
                <p class="text-lg text-justify screen:text-center">

                </p>
                <p class="text-lg text-justify screen:text-center">

                </p>
                <p class="text-lg text-justify screen:text-center">


                </p>

                <h3 class="uppercase font-extrabold"> <span class=" bg-amber-600 py-1">évaluation de stage:</span> </h3>
                <table class="border-collapse border border-black mt-2 w-full">
                    <thead>
                        <tr>
                        <th class="border border-black px-2"></th>
                        <th class="border border-black px-2">BON</th>
                        <th class="border border-black px-2">A. BON</th>
                        <th class="border border-black px-2">MOYEN</th>
                        <th class="border border-black px-2">FAIBLE</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td class="border border-black px-2">Compétences techniques</td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        </tr>
                        <tr>
                        <td class="border border-black px-2">Compétences méthodologiques</td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        </tr>
                        <tr>
                        <td class="border border-black px-2">Compétences communicatives</td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        </tr>
                        <tr>
                        <td class="border border-black px-2">Assiduité</td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        </tr>
                        <tr>
                        <td class="border border-black px-2">Esprit de créativité</td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        </tr>
                        <tr>
                        <td class="border border-black px-2">Intégration dans le groupe</td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        </tr>
                        <tr>
                        <td class="border border-black px-2">Qualité des travaux réalisés</td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        <td class="border border-black"></td>
                        </tr>

                    </tbody>
                </table>
                <br>
                <h3 class="uppercase font-extrabold"> <span class=" bg-amber-600 py-1">évaluation générale:</span> </h3>
                <p class="text-lg text-justify screen:text-center">


                </p>
                <div class="myline">
                <p class="sp-filler-after">-</p>
                <p class="sp-filler-after">-</p>
                <p class="sp-filler-after">-</p>
                <p class="sp-filler-after">-</p>
                </div>
                <br>
                <div class="flex">
                    <div class="text-center basis-2/5 font-bold text-xl">Le responsable du stage</div>
                    <div class="text-center basis-1/5"></div>
                    <div class="text-left basis-2/5 font-bold text-xl">Le Chef du Service</div>
                </div>



            </main>
            <!-- <footer class="flex justify-center">
                <img class="hidden print:block" src="{{ asset('img/pgFooter.png') }}" alt="Pied de la page">
            </footer> -->
        </div>






    </body>
</html>


