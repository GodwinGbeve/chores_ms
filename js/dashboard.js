// function logout() {
//     window.location.href = "../login/login.php"
// }

// function loadContent(page) {
//     fetch(page)
//         .then(response => response.text())
//         .then(data => {
//             document.getElementById('content').innerHTML = data;

//             // If the loaded page is 'assign_chore.php', call the necessary functions for that page
//             if (page.includes('../view/assign_chore.php')) {
//                 // Call any additional functions or logic specific to assign_chore.php
//             }

//             // If the loaded page is 'tables.php', call the necessary functions for that page
//             if (page.includes('../view/tables.php')) {
//                 // Call any additional functions or logic specific to tables.php
//             }
//         })
//         .catch(error => {
//             console.error("Error: ", error);
//         });
// }

// // Load the home page by default
// loadContent("../login/home.php");
