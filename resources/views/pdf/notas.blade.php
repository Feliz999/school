<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #student {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #student td, #student th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #student tr:nth-child(even){background-color: #f2f2f2;}

        #student tr:hover {background-color: #ddd;}

        #student th {
        padding-top: 8px;
        padding-bottom: 8px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
        }
        .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
        background-color: #2196F3;
        padding: 5px;
        }
        .grid-item {
        background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(0, 0, 0, 0.8);
        padding: 10px;
        font-size: 15px;
        text-align: center;
        }
    </style>
</head>
<body style="text-align: center">
    <div class="grid-container">
        <div class="grid-item">
            <img src="images/logo.jpeg" width="100" alt="logotipo">
        </div>
        <div class="grid-item">

            Fecha de Emisión: {{ \Carbon\Carbon::parse($now)->formatLocalized('%d %b %Y %I:%M %p')}} <br>
            <span>Dirección: 7ma. Calle 6-70 Zona 1</span>    <br>
            <span>Teléfono: 7946-1328</span> 
        </div>
    </div>
    <h3>NOTAS del Alumno: {{$student->fullname}} </h3>
    <h4>Grado: {{$level->level_section->level->number->number}}-{{$level->level_section->level->name}} Sección:  {{$level->level_section->section->name}}  Bimestre: {{$level->level_section->period->number->number}}</h4>
    <table id="student">
        @foreach($matters as $ma)
            @foreach($student_level as $sl)
                @if($sl->level_section->matter->id == $ma->id)
                    <thead>
                    <tr>
                      <th style="background-color: #d1c92e;">Materia</th>
                      <th style="background-color: #d1c92e;">Catedrático</th>
                    </tr>
                  </thead>
                    <tbody>
                        <tr>
                            <td>{{$sl->level_section->matter->name}}</td>
                            <td>{{$sl->level_section->teacher->fullname}}</td>
                        </tr>
                        <tr>
                            <th scope="row">No.</th>
                            <th scope="row">Trabajo</th>
                            <th scope="row">Puntos</th>
                            @php $total_puntos = 0; @endphp
                            @foreach($homework as $sh)
                                @if($sh->student_id == $student->id)
                                    @if($sh->homework->matter_id == $ma->id)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$sh->homework->name}}</td>
                                            <td>{{$sh->points}}/{{$sh->homework->points}}pts.</td>
                                        </tr>
                                        {{$total_puntos = $total_puntos + $sh->points}}
                                    @endif
                                @endif
                            @endforeach
                            <tr>
                                <td>Total:</td>
                                <td></td>
                                @if($total_puntos < 60)<td style="background-color:red; color:white">{{$total_puntos}}/100pts.@else <td style="background-color:green; color:white">{{$total_puntos}}/100pts.@endif</td>
                            </tr>
                        </tr>
                    </tbody>
                @endif
            @endforeach
        @endforeach
    </table>
</body>
</html>