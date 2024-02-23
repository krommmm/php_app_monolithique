let input1 = document.querySelector("input[name='image_1']");
let input2 = document.querySelector("input[name='image_2']");
let input3 = document.querySelector("input[name='image_3']");
let input4 = document.querySelector("input[name='image_4']");
let input5 = document.querySelector("input[name='image_5']");
let input6 = document.querySelector("input[name='image_6']");

input1.addEventListener("input",()=>{
document.getElementById("myImgOrigin_1").src = URL.createObjectURL(input1.files[0]);
});
input2.addEventListener("input",()=>{
    document.getElementById("myImgOrigin_2").src = URL.createObjectURL(input2.files[0]);
});
input3.addEventListener("input",()=>{
    document.getElementById("myImgOrigin_3").src = URL.createObjectURL(input3.files[0]);
});
input4.addEventListener("input",()=>{
    document.getElementById("myImgOrigin_4").src = URL.createObjectURL(input4.files[0]);
});
input5.addEventListener("input",()=>{
    document.getElementById("myImgOrigin_5").src = URL.createObjectURL(input5.files[0]);
});
input6.addEventListener("input",()=>{
    document.getElementById("myImgOrigin_6").src = URL.createObjectURL(input6.files[0]);
});
