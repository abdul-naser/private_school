// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};


// -----------------------------------------------------------------------------------------------


document.addEventListener("DOMContentLoaded", function(){ 
  const activeSection = sessionStorage.getItem("activeSection");

  if(activeSection){
      toggleSection(activeSection);
  }
});

function toggleSection(sectionToShow) { 
const sections = ["sec-1", "sec-2","sec-21", "sec-3","sec-31","sec-32","sec-33", "sec-4", "sec-41", "sec-42", "sec-5","sec-7","sec-71"];

for (const section of sections) {
const elements = document.getElementsByClassName(section);
for (const element of elements) {
element.style.display = section === sectionToShow ? "block" : "none";
}
}

if(sectionToShow =='sec-21') {
  document.getElementById("resultSubRequest").style.display ="none";
}

sessionStorage.setItem("activeSection" ,sectionToShow);


}




// -----------------------------------------------------------------------------------------------
function editRow(clickEdit,closeEdit,classEditable,classNoneditable){
$(clickEdit).click(function(){ 
   $(this).closest('tr').find(classEditable).show('slow')
   $(this).closest('tr').find(classNoneditable).hide('slow')
  
  })
  
  $(closeEdit).click(function(){
   $(this).closest('tr').find(classEditable).hide('fast')
   $(this).closest('tr').find(classNoneditable).show('fast')
  
  })

}

// main_schools.php
editRow('.edit_data','.close_input','.editable','.noneditable');

// main_approvals.php

editRow('.editApprove','.closeAprrove','.editableAppr','.noneditableAppr');