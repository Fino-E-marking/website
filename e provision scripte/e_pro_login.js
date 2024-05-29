const closeeye = document.querySelector(".eyeicon")
const openeye = document.querySelector(".eyeicon1")
const eyeholder = document.querySelector(".icon-holder")
const lockpassword = document.querySelector(".passclose")
const unlockpassword = document.querySelector(".passopen")
const resultpass1 = document.querySelector(".resultpassword")
const submit = document.querySelector(".submit")

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

submit.addEventListener("mouseenter", assigningpass)
assigningpass()
function assigningpass() {
  if (!openeye.classList.contains("hide-icon")) {
    resultpass1.value = unlockpassword.value;
  }else{
    resultpass1.value = lockpassword.value;
  } 
}