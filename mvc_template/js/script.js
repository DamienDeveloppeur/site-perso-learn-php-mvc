function changeUrl(url) {

	var pathName = window.location.pathname; 
	pathName = pathName.split('/');
	var folder = pathName[1];

	history.replaceState(null,null,window.location.protocol + "//" + window.location.host +'/'+folder+'/'+url);

}


eventForm('#btnAddForm','#addForm');
eventForm('#btnAddEtp','#addEtp');
eventForm('#btnAddQuest','#addQuest');
eventForm('#btnUpdateForm','#updateForm');
eventForm('#btnUpdateEtp','#updateEtp');
eventForm('#btnUpdateQuest','#updateQuest');


if (document.querySelectorAll('.formation') != null) {
	tabForm = document.querySelectorAll('.formation');
	tabForm.forEach(function(form) {
		form.addEventListener('click',function(){
			showInfo(event,form);
		});
	});
}

function showInfo(event,form) {
	event.preventDefault();
	event.stopPropagation();
	let info = form.querySelector('.info');
	info.style.display = "block";
}

if (document.querySelector('#selectEtp') != null) {
	selectEtp = document.querySelector('#selectEtp');
	tabOption = selectEtp.querySelectorAll('option');
	tabOption.forEach(function(option) {
		option.addEventListener('click',addEtp);
	});
	function addEtp() {
		var pathName = window.location.pathname; 
		pathName = pathName.split('/');
		var folder = pathName[1];
		let url = window.location.protocol + "//" + window.location.host +'/'+folder+'/formation/addEtp';
		let formId = document.querySelector('#formId');
		let data = JSON.stringify({'formId': formId.value, 'etape': this.value});

	let fetchData = {
		method: 'POST',
		headers: {
	      'Accept': 'application/json',
	      'Content-Type': 'application/json'
	    },
    	body: data
	}

	fetch(url, fetchData)
	.then(res => location.reload());
	}
}

if (document.querySelector('#selectQuest') != null) {
	selectQuest = document.querySelector('#selectQuest');
	tabOption = selectQuest.querySelectorAll('option');
	tabOption.forEach(function(option) {
		option.addEventListener('click',addQuest);
	});
	function addQuest() {
		var pathName = window.location.pathname; 
		pathName = pathName.split('/');
		var folder = pathName[1];
		let url = window.location.protocol + "//" + window.location.host +'/'+folder+'/etape/addQuest';
		let etpId = document.querySelector('#etpId');
		let data = JSON.stringify({'etpId': etpId.value, 'questionnaire': this.value});

	let fetchData = {
		method: 'POST',
		headers: {
	      'Accept': 'application/json',
	      'Content-Type': 'application/json'
	    },
    	body: data
	}

	fetch(url, fetchData)
	.then(res => location.reload());
	}
}

if (document.querySelector('#btnAddR') != null) {
	btnAddR = document.querySelector('#btnAddR');
	btnAddR.addEventListener('click',addR);
}

function removeModale() {
	let body = document.querySelectorAll('.section :not(.modale)');
	let modale = document.querySelectorAll('.modale');
	body.forEach(function(g){
		g.style.filter = "none";
		g.removeEventListener('click',removeModale);
	});
	modale.forEach(function(m){
		m.style.display = "none";
	});e
}

function viewForm(form) {
		addForm = document.querySelector(form);
		addForm.style.display = "Block";
		
		let body = document.querySelectorAll('.section  :not(.modale)');
		body.forEach(function(e){
			e.addEventListener('click',removeModale);
			e.style.filter = "blur(1px) grayscale(30%)";
		});
		
	}

function eventForm(btn,form) {
	if (document.querySelector(btn) != null) {
		btnAddForm = document.querySelector(btn);
		btnAddForm.addEventListener('click',function() {
			viewForm(form);
		});	
	}
}

function addR() {
		let viewR = document.querySelector('#viewR');
		let inputR = document.querySelector('#inputR');
		let reponse = document.querySelector('input[name="reponse"]');
		let nbR = document.querySelector('input[name="nbR"]');
		
		nbR.value = parseInt(nbR.value) + 1;
		
		let reponseCheck = document.createElement('input');
		reponseCheck.setAttribute('type','checkbox');
		reponseCheck.style.float = 'right';
		reponseCheck.classList.add('cbR');
		viewR.insertBefore(reponseCheck,reponse);

		let reponseText = document.createElement('p');
		reponseText.innerText = reponse.value;
		reponseText.addEventListener('click',updateR);
		reponseText.style.margin = '0 0 1vw 2vw';

		viewR.insertBefore(reponseText,reponse);

		let btnDelete = document.createElement('span');
		btnDelete.innerHTML = '&#10006;';
		btnDelete.style.float = 'left';
		btnDelete.style.cursor = 'pointer';
		btnDelete.addEventListener('click',deleteR);
		
		viewR.insertBefore(btnDelete,reponseText);
		
		let input = document.createElement('input');
		input.setAttribute('type','hidden');
		input.setAttribute('value',reponse.value);
		input.classList.add('inputR');
		
		reponse.value = "";
		
		inputR.appendChild(input);

	}

function updateR() {
	let viewR = document.querySelector('#viewR');
	let inputHidden = document.querySelector('input[value="'+this.innerText+'"]');
	
	let input = document.createElement('input');
	input.setAttribute('type','text');
	input.setAttribute('value',this.innerText);
	input.classList.add('inputR');
	input.addEventListener('focusout',function(){
		let reponseText = document.createElement('p');
		reponseText.innerText = this.value;
		inputHidden.value = this.value;
		reponseText.addEventListener('click',updateR);
		reponseText.style.margin = '0 0 1vw 2vw';
		viewR.insertBefore(reponseText,this);
		viewR.removeChild(this);
	});
	
	viewR.insertBefore(input,this);
	viewR.removeChild(this);
}

function deleteR() {
	let viewR = document.querySelector('#viewR');
	let inputR = document.querySelector('#inputR');
	let nbR = document.querySelector('input[name="nbR"]');
	let inputHidden = document.querySelector('input[value="'+this.nextSibling.innerText+'"]');
	
	viewR.removeChild((this.nextSibling).nextSibling);
	viewR.removeChild(this.nextSibling);
	viewR.removeChild(this);
	inputR.removeChild(inputHidden);
	nbR.value = parseInt(nbR.value) - 1;

}

if (document.querySelector('#formAddQ') != null) {
	formAddQ = document.querySelector('#formAddQ');
	formAddQ.addEventListener('submit',function() {
		addIdR(event);
	});
}

function addIdR(event) {
	event.preventDefault();
	let tabInputR = document.querySelectorAll('.inputR');
	let tabCbR = document.querySelectorAll('.cbR');
	let form = document.querySelector('#formAddQ');
	for (let i = 0; i < tabInputR.length; i++) {
	 	tabInputR[i].setAttribute('name','r'+i);
	 	tabCbR[i].setAttribute('name','c'+i);
	 }
	 form.submit(); 
}