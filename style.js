let checklogin=0;

function openCheckout(){
	window.location='checkout.html';
}
function login()
{
	alert("Đăng Nhập Thành Công !");
	window.location='user-index.html';

}

function dk(){
	window.location="Register.html"
}
function dx(){
	window.location="index.html"
}
function user(){
	window.location="user.html"
}

function megamenu(){
	document.getElementById('megamenu').style.display='block';
}
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



function openSearch() {
  document.getElementById("myOverlay").style.display = "block";
}
function closeSearch() {
  document.getElementById("myOverlay").style.display = "none";
}

function openProductHTML(){
	if(checklogin==1) 
		window.location="product.html";
	else window.location="layout.html";
}
function changLayoutIndex(){
	document.getElementById('login/register').style.display=none;
	document.getElementById('hello').style.display='block';
}


/*News*/
function openNews01(){
	document.getElementById('news-01').style.display='block';
	document.getElementById('news-02').style.display='none';
	document.getElementById('news-03').style.display='none';
	document.getElementById('news-04').style.display='none';

}
function openNews02(){
	document.getElementById('news-02').style.display='block';
	document.getElementById('news-01').style.display='none';
	document.getElementById('news-03').style.display='none';
	document.getElementById('news-04').style.display='none';

}
function openNews03(){
	document.getElementById('news-03').style.display='block';
	document.getElementById('news-02').style.display='none';
	document.getElementById('news-01').style.display='none';
	document.getElementById('news-04').style.display='none';

}
function openNews04(){
	document.getElementById('news-04').style.display='block';
	document.getElementById('news-02').style.display='none';
	document.getElementById('news-03').style.display='none';
	document.getElementById('news-01').style.display='none';

}
function themgiohang()
{
    alert("Thêm sản phẩm vào thành công !");
}
function openAdmin(){
	alert("Đăng Nhập Thành Công .Kính Chào Quản Trị Viên ! ");
	window.location='manage-product.html';
	
}
/*
	var CORRET_USER = 'doanWeb1';
	var CORRET_pass = '12345678';
	
	var inputUsername = document.getElementById('uname');
	var inputPassword = document.getElementById('psw');
	
	var formLogin = document.getElementById('form-login');
	
	if(formLogin.attachEvent){
		formLogin.attachEvent('submit', onFormSubmit());
	}else{
		formLogin.addEventListener('submit', onFormSubmit());
	}
	
	function onFormSubmit(){
		var uname = inputUsername.value;
		var psw = inputPassword.value;
	
		if(uname == CORRET_USER && psw == CORRET_pass){
			//login(); 
			alert('Đăng nhập thành công');
		}else{
			alert('Đăng nhập thất bại');
		}
	}*/
