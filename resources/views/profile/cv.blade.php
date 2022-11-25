<x-app-layout>
    <!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="es6-promise.auto.min.js"></script>
        <script src="jspdf.min.js"></script>
        <script src="html2canvas.min.js"></script>
        <script src="html2pdf.min.js"></script>
    @vite(['resources/css/cv.css','resources/js/cv.js'])
    </head>
    <body>
        <script>
            function generatePDF(){
            const element = document.getElementById("invoice");
            var opt = {
            margin:       [-0.2, -1.2, -1, -1],
            filename:     'CV.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait',uni: 'cm',format: 'a4'}
            };
            html2pdf()
            .set(opt)
            .from(element)
            .save();
        }
        </script>
        <div class="my-4"></div>
        <div  class="flex justify-center">
            <div class="text-center object-fill  "> <!-- ⬅️ THIS DIV WILL BE CENTERED -->
                <button onclick="generatePDF()" class="vio text-white font-bold py-2 px-4 rounded">
                    Descargar PDF de CV
                </button>
            </div>
        </div> 
        <div id="invoice" class="main">
            <div class="top-section">
                <p class="p1">{{$userPDF->name}} </span></p>
                <p class="p2">{{$userPDF->ocupation}}</p>
            </div>
            <div class="clearfix"></div>

            <div class="col-div-4">
                <div class="content-box" style="padding-left: 40px;">   
                <p class="head">Contacto</p>
                <p class="p3"><i class="fa fa-phone"></i> &nbsp;&nbsp;{{$userPDF->phone_number}}</p>
                <p class="p3"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp;{{$userPDF->email}}</p>
                <p class="p3"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;&nbsp;{{$userPDF->ubication}}</p>
                <a class="p3" href="{{$userPDF->linkedin_url}}"><i class="fab fa-linkedin-in" aria-hidden="true"></i> &nbsp;&nbsp;{{$userPDF->name}}</a>
                

                <br/>
                <p class="head">Habilidades</p>
                <ul class="skills">
                    @foreach (explode(',', $userPDF->skills) as $skill)
                        <li><span class="p3">• {{ trim($skill)}}</span></li>
                    @endforeach
  
                </ul>

                <br/>

                <p class="head">Conocimientos</p>
                <ul class="skills">
                    @foreach (explode(',', $userPDF->knownments) as $kno)
                        <li><span class="p3">• {{ trim($kno)}}</span></li>
                    @endforeach
  
                </ul>

                <br/> 
                <p class="head">Intereses</p>
                <ul class="skills">
                    @foreach (explode(',', $userPDF->interests) as $int)
                        <li><span class="p3">• {{ trim($int)}}</span></li>
                    @endforeach
  
                </ul>

                <br/> 

                <p class="head">Cursos</p>
                @foreach (explode(',', $userPDF->courses) as $course)
                    <p class="p3">• {{ trim($course)}}</p>
                @endforeach

                <br/>
                    <p class="head">Lenguajes</p>
                    @foreach (explode(',', $userPDF->languajes) as $len)
                        <p class="p3">• {{ trim($len)}}</p>
                    @endforeach
                </div>
            </div>
            <div class="line"></div>
            <div class="col-div-8">
                <div class="content-box">
                <p class="head">Perfil</p>
                <p class="p-4" style="font-size: 14px;">{{$userPDF->biography}}</p>

                <br/>
                
                <p class="head">Experiencia</p>

                    @foreach (explode(',', $userPDF->experience) as $exp)
                        <p class="p-4">{{ trim($exp)}}</p>
                    @endforeach

                <br/>

                <p class="head">Educación</p>
                
                @foreach (explode(',', $userPDF->education) as $edu)
                    <p class="p-4">• {{ trim($edu)}}</p>
                 @endforeach
                </div>
            </div>

            <div class="clearfix"></div>

        </div>
            <br/>
    </body>
    </html>
</x-app-layout>