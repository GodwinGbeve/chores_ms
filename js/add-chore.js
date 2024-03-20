const addChoreButton = document.getElementById("addChoreButton");
const addChorePopup = document.getElementById("addChorePopup");
const addChoreForm = document.getElementById("addChoreForm");
const closePopupBtn = document.getElementById("closePopupBtn");

addChoreButton.addEventListener("click", () => {
    addChorePopup.style.display = "block";
});

closePopupBtn.addEventListener("click", () => {
  addChorePopup.style.display = "none";
  addChoreForm.reset(); // Reset form inputs
  
});

addChoreForm.addEventListener("submit", (event) => {
 
  addChorePopup.style.display = "none";
});

