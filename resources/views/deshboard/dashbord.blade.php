@extends('layouts.master')
@section('title')
    Dashboard
@endsection

@section('page')
    Welcome To Dokani!!
@endsection

@section('content')

    <div class="container">
        <div class="row bg-info">
            <div class="col-8 mx-auto" style="padding: 15px 0;">
                <h1 class="text-center">Countdown Timer</h1>
                <div class="card col-6 mx-auto text-center text-danger">
                    <h1 id="timer" class="text-danger">0</h1>
                </div>
                <div class="text-center">
                    <button class="btn btn-success" onclick="startTimer()">Start Timer</button>
                    <button class="btn btn-danger" onclick="stopTimer()">Stop Timer</button>
                    <button class="btn btn-warning" onclick="pauseInterval()">Pause Timer</button>
                    <button class="btn btn-primary" onclick="copyValues()">Copy Current Value</button>
                </div>
                <div class="card col-sm-4 mx-auto mt-5" style="margin-top: 20px;">
                    <ul class="list-group" id="capturedtime">

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- <button onclick="showList();">Click me</button>

     <input id="myInput" />-->

    {{--<h1 id="myId" class="kuddus" style="color: red;">0</h1>--}}

    <!--<ul id="myList"></ul>

    <h1>Hello World2</h1>-->



@endsection


@section('script')
    <script type="text/javascript">
        // var i = 0
        // setInterval(function () {
        //     var selectID = document.getElementById('myId');
        //     selectID.innerHTML = i;
        //     i++;
        // }, 1000);

        let i = 0;
        let timer = document.getElementById('timer');
        let interval;
        let captureTimer = document.getElementById('capturedtime');
        let currentValue = '';
        let app = function(){
            timer.innerHTML = i;
            i++;
        }
        let startTimer = function () {
            interval = setInterval(app, 1);
        }
        function stopTimer(){
            clearInterval(interval);
            i = 0;
            timer.innerHTML = i;
        }
        function pauseInterval(){
            clearInterval(interval);
        }

        function copyValues(){
            currentValue += '<li class="list-group-item"> Capyured in <span class="badge badge-primary badge-pill">'+i+'</span></li>'
            captureTimer.innerHTML = currentValue;
        }

        //document.getElementById("myInput").addEventListener("focus", showList);

        //function showList() {

        //var selectTag = document.getElementsByTagName('h1');
        //selectTag[1].style = 'color: green;';
        /*var data = '';
        var selectID = document.getElementById('myList');
        for(let i = 0; i<10; i++){
            data += '<li>Hello World '+i+'</li>';
        }

        selectID.innerHTML = data;*/
        //}



        // showList();

        /* for(let i = 0; i<10; i++){
             console.log('Hello World '+i);
             selectID.innerHTML = 'Hello Sohag';
         }*/

        //var selectID = document.getElementById('myList');
        //var selectTag = document.getElementsByTagName('h1');
        //var htmlContent = selectID.innerHTML; //Inner Selector
        //var htmlContent = selectTag[1].style; //Attribute Selector



        /*var data = '';

         for(let i = 0; i<10; i++){
            // var valuues = 'Hello World '+i;
            // console.log('Hello World '+i);
             data += '<li>Hello World '+i+'</li>';
         }*/

        //console.log(data);

        //selectID.innerHTML = data;

        //selectID.innerHTML = 'Hello Sohag';
        //selectID.style = 'color: green;';

        //console.log(htmlContent);
        //console.log(htmlContent);
        //alert(htmlContent);




        // var a = 'Nazmul';

        /* var car = {
             name : 'toyota',
             model: 'corlla',
             year: 2014,
             start:function () {
                 return this.name + 'Is strating';
             },

             stop(){
                 return this.name + ' Is stop';
             }
         };


         var person = {
             firstName: "John",
             lastName : "Doe",
             id       : 5566,
             fullName : function() {
                 return this.firstName + " " + this.lastName;
             }
         };*/


        /*function add() {
            return 2+5;
        }*/

        /* var add = function () {
             return 2+5;
         };*/


        // console.log(person.fullName());

        //console.log(a);
        //alert(a);


        /*var number1 = 5;
        var number2 = 10;
        var string1 = 'Result';*/

        // console.log(string1 + Number(number1 + number2));

        //var cars = ["Saab", "Volvo", "BMW"];

        /*for (var i=0; i<cars.length; i++){
            console.log(cars[i]);
        }*/

        /*for(res in cars){
            console.log(cars[res]);
        }*/

        /*for(res of cars){
             console.log(res);
         }*/

        /*for (let i = 0; i<10; i++ ){
            console.log(i);
        }*/

        //const i = 10;
        // var i = 45;


        //   console.log('result is: '+i);


        /* var car = {
             name : 'toyota',
             model: 'corlla',
             year: 2014,
             start:function () {
                 return this.name + 'Is strating';
             },

             stop(){
                 return this.name + ' Is stop';
             }
         };*/


        /*class Car {
            constructor(carName, carModel, carYear) {
                this.name = carName;
                this.model = carModel;
                this.year = carYear;
            }

            start(){
                return this.name + ' Is strating';
            }

            stop(){
                return this.name + ' Is stop';
            }
        }*/

        /* function Car(carName, carModel, carYear) {
             this.name = carName;
             this.model = carModel;
             this.year = carYear;

             this.start = function () {
                 return this.name + ' Is strating';
             };

             this.stop = function () {
                 return this.name + ' Is stop';
             };
         }*/

        /*var cars = new Car('toyota','corlla',2014);
        var cars2 = new Car('Marceyize','Agun',2014);

        console.log(cars);*/





    </script>
@endsection
