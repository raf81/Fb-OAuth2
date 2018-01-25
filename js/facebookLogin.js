
window.fbAsyncInit = function() {
    FB.init({
        appId            : '767346216798190',
        autoLogAppEvents : true,
        xfbml            : true,
        version          : 'v2.11'
    });

    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
};

(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


//check  user status call api
function statusChangeCallback() {
    FB.login(function(response){
        if(response.status === 'connected'){

            checkCookie(response.id);
            $("#page0").css("display", "none");
            $("#page1").css("display","block");

            console.log('logged in');
            testAPI();
        }
        else{
            $("#page0").css("display", "block");
            console.log('logged out');
        }
    });

}

function checkLoginState() {
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
}

//set ajax call
function SetUsers(response,x,y){
    var data = {
        fbid    : response.id,
        fbusername : response.name,
        fbmail     : response.email,
        fbgenre     : response.gender,
        /*token : '',*/
        extra : x,
        question:y
    };

    $.ajax({
        type: "POST",
        url: "main.php",
        datatype:'json',
        data: data,

        success: function (response) {
            console.log(response)
            var sdata=$.parseJSON(response)
            console.log(sdata)
            setCookie(sdata.userid,7)
        },
        error: function (request, status, error) {
            alert(error);
        }

    });
}



function testAPI(x,y){
    var xx= x;
    var yy=y;
    FB.api('me?fields=id,name,email,gender', function(response){
        if(response && !response.error){
            SetUsers(response,xx,yy);


        }
    })
}

function logout(){
    FB.logout( function (response) {
        console.log('You are logged out');

    });
}