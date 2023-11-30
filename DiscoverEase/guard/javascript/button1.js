function showIframe(iframeNumber, button) {
    for (let i = 1; i <= 3; i++) {
        const iframe = document.getElementById(`iframe${i}`);
        iframe.style.display = "none";
    }

    const selectedIframe = document.getElementById(`iframe${iframeNumber}`);
    selectedIframe.style.display = "block";

}


var signout =document.getElementById('signout');

signout.addEventListener('click', function(){
    window.open("login-page/login.php");
    window.close('ADMIN-HOMEPAGE/admin-interface.php');
})



    