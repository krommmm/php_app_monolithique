// ANNIMATION HOME TERRAIN
let terrain = document.querySelector(".terrains");
let terrains = terrain.children;

let cpt=0;
for(let i=0;i<terrains.length;i++){
   terrains[i].style.animationDelay=`${cpt}s`;
   cpt=cpt+0.25;
}