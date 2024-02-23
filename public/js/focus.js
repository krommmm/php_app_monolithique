let slideContainer = document.querySelector('.slide_container');
slideContainer.style.width = `${500 * slideContainer.childElementCount}px`;

//declarations
var bouton = document.querySelector('.bouton');
var boutonColor = document.querySelector('.change_color');
var toggle = true;
const left = document.querySelector('.fa-angles-left');
const right = document.querySelector('.fa-angles-right');
const diapo = document.querySelector('.diapo');
const slide_width = diapo.getBoundingClientRect().width;
const slide_container = document.querySelector('.slide_container');
var compteur = 0;
var transfert = 0;
var indexNodes = 1;

window.onresize = () => {
	window.location.reload();
};

const startCaroussel = () => {
	//creation d'un clone de la dernière image
	var clone = slide_container.firstElementChild.cloneNode(true);

	slide_container.appendChild(clone);

	//On indique la largeur du grand rectangle qui contient tous les slides en fonction du nombre de slides
	let largeurBody = document.body.clientWidth;
	let myNb = 0;
	if (largeurBody > 600) {
		myNb = 500;
	} else {
		myNb = 267;
	}
	slide_container.style.width = `${
		myNb * slide_container.childElementCount
	}px`;

	// gestionnaire d'evenement qui gère le clique gauche
	left.addEventListener('click', function goLeft() {
		compteur--;
		if (compteur < 0) {
			setTimeout(() => {
				slide_container.style.transition = '1ms';
				transfert = slide_width * compteur;
				slide_container.style.transform = `translateX(${-transfert}px)`;
				slide_container.style.transition = '400ms';
				goLeft();
			}, 1);

			slide_container.style.transition = '0ms';
			compteur = slide_container.childElementCount - 1;
		}
		transfert = slide_width * compteur;
		slide_container.style.transform = `translateX(${-transfert}px)`;
		console.log(compteur);
	});

	// gestionnaire d'evenement qui gère le clique droit
	right.addEventListener('click', function goRight() {
		compteur++;
		if (compteur == slide_container.childElementCount - 1) {
			setTimeout(() => {
				compteur = 0;
				slide_container.style.transition = '0ms';
				transfert = slide_width * compteur;
				slide_container.style.transform = `translateX(${-transfert}px)`;
			}, 400);
		}

		console.log(compteur);
		slide_container.style.transition = '400ms';
		transfert = slide_width * compteur;
		slide_container.style.transform = `translateX(${-transfert}px)`;
	});
};

startCaroussel();


// IMAGES 

let input1 = document.querySelector("input[name='image_1']");
let input2 = document.querySelector("input[name='image_2']");
let input3 = document.querySelector("input[name='image_3']");
let input4 = document.querySelector("input[name='image_4']");
let input5 = document.querySelector("input[name='image_5']");
let input6 = document.querySelector("input[name='image_6']");

input1.addEventListener("input",()=>{
document.getElementById("focus_modif_img_1").src = URL.createObjectURL(input1.files[0]);
});
input2.addEventListener("input",()=>{
    document.getElementById("focus_modif_img_2").src = URL.createObjectURL(input2.files[0]);
});
input3.addEventListener("input",()=>{
    document.getElementById("focus_modif_img_3").src = URL.createObjectURL(input3.files[0]);
});
input4.addEventListener("input",()=>{
    document.getElementById("focus_modif_img_4").src = URL.createObjectURL(input4.files[0]);
});
input5.addEventListener("input",()=>{
    document.getElementById("focus_modif_img_5").src = URL.createObjectURL(input5.files[0]);
});
input6.addEventListener("input",()=>{
    document.getElementById("focus_modif_img_6").src = URL.createObjectURL(input6.files[0]);
});
