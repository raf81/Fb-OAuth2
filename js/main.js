var gameObject = [
    {question: '1', value: '4'},
    {question: '2', value: '4'},
    {question: '3', value: '3'},
    {question: '4', value: '1'}
];

$("#page0").css("display", "block");


function checkQuestion(event) {
    var question = event.dataset.question;
    var value = event.dataset.value;
    for (var i = 0; i < gameObject.length; i++) {
        if (gameObject[i].question === question) {
            if (gameObject[i].value === value) {
                switch (i) {
                    case 0:
                        event.children["0"].className = 'correct';
                        setTimeout(function () {
                            $("#page2").css("display", "block");
                            $("#page1").css("display", "none");
                        }, 1000);
                        testAPI(value, question);
                        break;
                    case 1:
                        event.children["0"].className = 'correct';
                        $("#page1").css("display", "none");
                        setTimeout(function () {
                            $("#page3").css("display", "block");
                            $("#page2").css("display", "none");
                        }, 1000)
                        testAPI(value, question);
                        break;
                    case 2:
                        event.children["0"].className = 'correct';
                        setTimeout(function () {
                            $("#page3").css("display", "none");
                            $("#page4").css("display", "block");
                        }, 1000)
                        testAPI(value, question);
                        break;
                    case 3:
                        event.children["0"].className = 'correct';
                        setTimeout(function () {
                            $("#page4").css("display", "none");
                            $("#page5").css("display", "block");
                        }, 1000)
                        testAPI(value, question);
                        break;
                    default:
                }
            }
            else {

                event.children["0"].className = 'wrong';
                $(".a").css("display", "none");
                var modal = document.getElementById('modal');
                var span = document.getElementsByClassName("close")[0];
                modal.style.display = "block";
                span.onclick = function () {
                    modal.style.display = "none";
                    $(".wrong").css("display", "none");
                }
                window.onclick = function (event) {
                    if (event.target === modal) {
                        modal.style.display = "none";
                        $(".wrong").css("display", "none");
                       /* $(".a").css("display", "block");*/

                    }

                }
                testAPI(value, question);
            }


        }
    }

}
