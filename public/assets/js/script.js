$(function () {
    $('#emailRegister').on('blur', function () {
        var email = $(this);

        if (email.val().length !== 0) {
            $.post("register.php", {checkmail: true, email: email.val()}, function (response) {
                if (response === 'ok') {
                    email.attr('class', 'form-control is-valid');
                    email.parent().find('.invalid-feedback').text('');
                } else {
                    email.attr('class', 'form-control is-invalid');
                    email.parent().find('.invalid-feedback').text('un compte existe pour cette adresse mail !');
                }
            });
        }
    });
});
function expandP(obj)
{
    obj.style.overflow="auto";
        obj.style.whiteSpace="normal";
}
//galerie photo
function ShowImg(Id)
{

    document.getElementById("fullimg").src = "assets/img/" + Id + ".jpg";
    document.getElementById("fullimg").style.display = "block";

}

var OpenedImgId;
var OpenedImgClass;

function ShowImg(Class, Id){

	document.getElementById("photosliders-main").style.display = "block";
	document.getElementById("photosliders-img").src = "assets/images/" + Class + Id + ".jpg";

	OpenedImgClass = Class;
	OpenedImgId = Id;

}

function CloseImg(){

	document.getElementById("photosliders-main").style.display = "none";

	OpenedImgClass = "";
	OpenedImgId = 0;

}

function ShowPrevImg(){

	if (document.getElementById(OpenedImgClass + (OpenedImgId -1) + "-img")) {

		ShowImg(OpenedImgClass, OpenedImgId -1);

	}

}

function ShowNextImg(){

	if (document.getElementById(OpenedImgClass + (OpenedImgId +1) + "-img")) {

		ShowImg(OpenedImgClass, OpenedImgId + 1);

	}

}