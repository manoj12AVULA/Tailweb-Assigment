let formEl = document.getElementById('form');
let emailEl = document.getElementById('email');
let passwordEl = document.getElementById('password');
let EparaEl = document.getElementById('Erequired');
let PparaEl = document.getElementById('Prequired');


formValidation = ()=>{
	if(emailEl.value == ""){
		EparaEl.textContent = "Required*"
	}
	if(passwordEl.value == ""){
		PparaEl.textContent = "Required*"
	}
}

formEl.addEventListener("submit",(event)=>{
	event.preventDefault();
	formValidation();
})