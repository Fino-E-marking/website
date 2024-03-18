const closeeye = document.querySelector(".eyeicon")
const openeye = document.querySelector(".eyeicon1")
const eyeholder = document.querySelector(".icon-holder")
const lockpassword = document.querySelector(".passclose")
const unlockpassword = document.querySelector(".passopen")
const closeeyeB = document.querySelector(".eyeiconB")
const openeyeB = document.querySelector(".eyeiconB1")
const eyeholderB = document.querySelector(".holderB")
const lockpasswordB = document.querySelector(".passclose2")
const unlockpasswordB = document.querySelector(".passopen2")
/*
if (lockpassword.value !== " " && unlockpassword.value !== " ") {
  lockpassword.addEventListener("input", ()=>{
    lockpassword.value = unlockpassword.value;
  });
  unlockpassword.addEventListener("input", ()=>{
    unlockpassword.value = lockpassword.value;
  });
}
if (lockpasswordB.value !== "" || unlockpasswordB.value !== "") {
  lockpasswordB.addEventListener("input", ()=>{
    lockpasswordB.value = unlockpasswordB.value;
  });
  unlockpasswordB.addEventListener("input", ()=>{
    unlockpasswordB.value = lockpasswordB.value;
  });
  
}
*/


eyeholder.addEventListener("click", ()=>{
  if (openeye.classList.contains("hide-icon") && !closeeye.classList.contains("hide-icon")) {
    closeeye.classList.toggle("hide-icon");
    openeye.classList.toggle("hide-icon");
  }else{
    closeeye.classList.toggle("hide-icon");
    openeye.classList.toggle("hide-icon");
  }

  if (closeeye.classList.contains("hide-icon") && !openeye.classList.contains("hide-icon")) {
    lockpassword.classList.toggle("hide-icon")
    unlockpassword.classList.toggle("hide-icon")
  }else{
    lockpassword.classList.toggle("hide-icon")
    unlockpassword.classList.toggle("hide-icon")
  }
  
  if (!openeye.classList.contains("hide-icon")) {
    unlockpassword.value = lockpassword.value;
  }else{
    lockpassword.value = unlockpassword.value;
  }
});

eyeholderB.addEventListener("click", ()=>{
  if (openeyeB.classList.contains("hide-icon") && !closeeyeB.classList.contains("hide-icon")) {
    closeeyeB.classList.toggle("hide-icon");
    openeyeB.classList.toggle("hide-icon");
  }else{
    closeeyeB.classList.toggle("hide-icon");
    openeyeB.classList.toggle("hide-icon");
  }
  if (closeeyeB.classList.contains("hide-icon") && !openeyeB.classList.contains("hide-icon")) {
    lockpasswordB.classList.toggle("hide-icon")
    unlockpasswordB.classList.toggle("hide-icon")
  }else{
    lockpasswordB.classList.toggle("hide-icon")
    unlockpasswordB.classList.toggle("hide-icon")
  }

  if (!openeyeB.classList.contains("hide-icon")) {
    unlockpasswordB.value = lockpasswordB.value;
  }else{
    lockpasswordB.value = unlockpasswordB.value;
  }
});
console.log(eyeholderB);
