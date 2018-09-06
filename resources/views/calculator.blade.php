<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">

    <!-- Styles -->
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Reverse Polish Calculator
            </div>

            <center>
                <div id="calculator" class="text-center">
                    <div id="stack">
                        <form id="calculatorForm">
                            <input type="hidden" name="count" id="count">
                            <div class="stackrow row" >
                                <input type="text" name="stack3" readonly="readonly" class="stackrow" value="0">
                            </div>
                            <div class="stackrow row" style="top: 40px;">
                                <input type="text" name="stack2" readonly="readonly" class="stackrow" value="0">
                            </div>
                            <div class="stackrow row" style="top: 80px;">
                                <input type="text" name="stack1" readonly="readonly" class="stackrow" value="0">
                            </div>
                            <div class="stackrow row" style="top: 120px;">
                                <input type="text" name="stack0" class="stackrow" value="0">
                            </div>
                        </form>
                    </div>
                    <div id="keyboard">
                        <div class="row">
                            <div class="button" style="top: 0; left: 0;">
                                <a href class="button" onclick="c('C'); return false;">C</a>
                            </div>
                            <div class="button" style="top: 0; left: 60px;">
                                <a href class="button" onclick="c('AC'); return false;">AC</a>
                            </div>
                            <div class="button" style="top: 0; left: 120px;">
                                <a href class="button" onclick="c('POP'); return false;">POP</a>
                            </div>
                            <div class="button" style="top: 0; left: 180px;">
                                <a href class="button" onclick="c('SWAP'); return false;">SWAP</a>
                            </div>
                            <div class="button" style="top: 0; left: 240px;">
                            <a href class="button" onclick="c('%'); return false;">%</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="button" style="top: 40px; left: 0;">
                                <a href class="button" onclick="c('SQRT'); return false;">SQRT</a>
                            </div>
                            <div class="button" style="top: 40px; left: 60px;">
                                <a href class="button" onclick="c('POW'); return false;">POW</a>
                            </div>
                            <div class="button" style="top: 40px; left: 120px;">
                                <a href class="button" onclick="c('1/x'); return false;">1/x</a>
                            </div>
                            <div class="button" style="top: 40px; left: 180px;">
                                <a href class="button" onclick="c('+/-'); return false;">+/-</a>
                            </div>
                            <div class="button" style="top: 40px; left: 240px;">
                                <a href class="button" onclick="c('/'); return false;">/</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="button" style="top: 80px; left: 0;">
                                <a href class="button" onclick="c('M+'); return false;">M+</a>
                            </div>
                            <div class="button" style="top: 80px; left: 60px;">
                                <a href class="button" onclick="c('7'); return false;">7</a>
                            </div>
                            <div class="button" style="top: 80px; left: 120px;">
                                <a href class="button" onclick="c('8'); return false;">8</a>
                            </div>
                            <div class="button" style="top: 80px; left: 180px;">
                                <a href class="button" onclick="c('9'); return false;">9</a>
                            </div>
                            <div class="button" style="top: 80px; left: 240px;">
                                <a href class="button" onclick="c('X'); return false;">X</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="button" style="top: 120px; left: 0;">
                                <a href class="button" onclick="c('M-'); return false;">M-</a>
                            </div>
                            <div class="button" style="top: 120px; left: 60px;">
                                <a href class="button" onclick="c('4'); return false;">4</a>
                            </div>
                            <div class="button" style="top: 120px; left: 120px;">
                                <a href class="button" onclick="c('5'); return false;">5</a>
                            </div>
                            <div class="button" style="top: 120px; left: 180px;">
                                <a href class="button" onclick="c('6'); return false;">6</a>
                            </div>
                            <div class="button" style="top: 120px; left: 240px;">
                                <a href class="button" onclick="c('-'); return false;">-</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="button" style="top: 160px; left: 0;">
                                <a href class="button" onclick="c('MR'); return false;">MR</a>
                            </div>
                            <div class="button" style="top: 160px; left: 60px;">
                                <a href class="button" onclick="c('1'); return false;">1</a>
                            </div>
                            <div class="button" style="top: 160px; left: 120px;">
                                <a href class="button" onclick="c('2'); return false;">2</a>
                            </div>
                            <div class="button" style="top: 160px; left: 180px;">
                                <a href class="button" onclick="c('3'); return false;">3</a>
                            </div>
                            <div class="button" style="top: 160px; left: 240px;">
                                <a href class="button" onclick="c('+'); return false;">+</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="button" style="top: 200px; left: 0;">
                                <a href class="button" onclick="c('MC'); return false;">MC</a>
                            </div>
                            <div class="button" style="top: 200px; left: 60px;">
                                <a href class="button" onclick="c('0'); return false;">0</a>
                            </div>
                            <div class="button" style="top: 200px; left: 120px;">
                                <a href class="button" onclick="c('.'); return false;">.</a>
                            </div>
                            <div class="button" style="top:200px; left:180px; width:110px;">
                                <a href class="button enter" onclick="c('enter'); return false;" data-url="{{route('enter')}}" data-count="" data-result="{{route('operation')}}">ENTER</a>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
