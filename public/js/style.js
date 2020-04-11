document.addEventListener('DOMContentLoaded',function(){
  const listSlice=document.getElementsByClassName('img-slice');
  function next(){
    countNext++;
    if(countNext>2){
      countNext=0;
    }
    showSlice(countNext);
  };
  function showSlice(n){
    for(var i=0 ; i<listSlice.length; i++){
      listSlice[i].style.display="none";
    }
    listSlice[n].style.display="block";
  }
  var countNext = 0;
  showSlice(0);
  setInterval(function(){
    next();
  },4000);
  next();
});
document.addEventListener('DOMContentLoaded',function(){
  const apply = document.querySelector("#apply");
  const establish = document.querySelector("#establish");
  const login = document.querySelector("#login");
  const resister = document.querySelector("#resister");
  const logoutApply = document.querySelector("#lostFormApply");
  const logoutResister = document.querySelector("#lostFormResister");
  function fromOpenApply(){
      establish.style.display = "none";
      apply.style.display = "block";
  }
  function fromOpenResister(){
      establish.style.display = "block";
      apply.style.display = "none";
  }
  function fromLostApply(){
      apply.style.display = "none";
      establish.style.display = "none";
  }
  function fromLostResister(){
      establish.style.display = "none";
      apply.style.display = "none";
  }
  login.addEventListener("click",fromOpenApply);
  resister.addEventListener("click",fromOpenResister);
  logoutApply.addEventListener("click",fromLostApply);
  logoutResister.addEventListener("click",fromLostResister);
});
