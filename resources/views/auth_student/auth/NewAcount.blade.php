@extends('layout.master2')
@section('title','دخول الطالب')

@section('css')

@stop

@section('content')


    <div class="container">

        <section>
            <main class="text-center text-white">
                <h3>Create a new account for you in information technology</h3>
                <img src="{{asset('assset_min/imge/Incubator_logo.png')}}" class="mt-5" height="300px">
                   <main class="col-sm-12 text-center justify-content-center ">
                      <h3 id="text"  class="mt-5"></h3>
                   </main>
            </main>
        </section>
        </div>

    <script>
        var text = `
Welcome to the Information Technology Incubator Only Al-Azhar University students are allowed to register        `;

            var counter = 0;
            var letterCounter = 0;
        var routeName = '{{route('student.register')}}'
            function writeText() {
                var currentText = text[counter];
                if (text[counter]) {

                var currentLetter = currentText[letterCounter];
                document.getElementById('text').innerHTML += currentLetter;

                letterCounter++;
                if (letterCounter === currentText.length) {
                    letterCounter = 0;

                    counter++;


                }
                if (counter === text.length) {

                    function redirectToNextPage() {
                        window.location.href = routeName;
                    }

                    setTimeout(redirectToNextPage, 1000);


                }
            }
            }

            setInterval(writeText, 200);

    </script>

    @stop
