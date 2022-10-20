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

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body contenteditable class="font-sans antialiased h-screen">
        <div class="flex flex-col h-screen justify-between">
            <header class="flex justify-center">
                <img class="hidden print:block" src="{{ asset('img/pgHeader.png') }}" alt="Entête de la page">
            </header>
            <main class="mb-auto h-10">
                <br>
                <div class="flex">
                    <div class="text-center basis-2/5">N°: ............... ORH/SAF/BFP</div>
                    <div class="text-center basis-1/5"></div>
                    <div class="text-left basis-2/5">Marrakech, le .................</div>
                </div>
                <br>
                <br>
                <div class="text-2xl">
                    <h1 class="text-center uppercase underline underline-offset-8">Attestation de stage</h1>
                </div>
                <br>
                <br>
                <p class="text-lg text-justify">
                    Le Directeur de l'Office Régional de Mise en Valeur Agricole du Haouz, atteste par la présente que:
                </p>
                <br>
                <div class="text-lg flex flex-col">

                    <div class="flex flex-row justify-around">

                        <div class="basis-1/3 ml-20">
                            {{$stage->stagiaire->gender_situation}}
                            <span class="float-right mr-4">:</span>
                        </div>

                        <div class="font-bold uppercase basis-2/3">
                            {{$stage->stagiaire->nom}} {{$stage->stagiaire->prenom}}
                        </div>
                    </div>
                    <div class="flex flex-row justify-around">
                        <div class="basis-1/3 ml-20">
                            Elève stagiaire de
                            <span class="float-right mr-4">:</span>
                        </div>

                        <div class="font-bold uppercase basis-2/3">
                            {{$stage->stagiaire->institut}}
                        </div>
                    </div>
                    <div class="flex flex-row justify-around">
                        <div class="basis-1/3 ml-20">
                            Ville
                            <span class="float-right mr-4">:</span>
                        </div>
                        <div class="font-bold uppercase basis-2/3">
                            {{$stage->stagiaire->ville}}
                        </div>
                    </div>
                </div>
                <br>
                <p class="text-lg text-justify">
                    a effectué un stage en <span class="font-bold">{{$stage->subject}}</span> au sein de cet établissement du <span class="font-bold">{!! date('d/m/Y', strtotime($stage->dateDebut)) !!}</span> au <span class="font-bold">{!! date('d/m/Y', strtotime($stage->dateFin)) !!}</span>.

                </p>
                <p class="text-lg text-justify">
                    La présente attestation est délivrée à
                    @if($stage->stagiaire->gender_situation !== "Mr")
                        <span>l'intéressée</span>
                    @else
                        <span>l'intéressé</span>
                    @endif

                     sur sa demande, pour servir et valoir ce que de droit.
                </p>


            </main>
            <footer class="flex justify-center">
                <img class="hidden print:block" src="{{ asset('img/pgFooter.png') }}" alt="Pied de la page">
            </footer>
        </div>






    </body>
</html>


