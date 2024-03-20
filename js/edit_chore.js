const editChoreButton = document.getElementById("editChoreButton");
const editChorePopup = document.getElementById("editChorePopup");
const editChoreForm = document.getElementById("editChoreForm");


editChoreButton.addEventListener("click", () => {
    editChorePopup.style.display = "block";
});

closePopupBtn.addEventListener("click", () => {
    editChorePopup.style.display = "none";
    
});

editChoreForm.addEventListener("submit", (event) => {
    editChorePopup.style.display = "none";
});

console.log("show");