document.title = "My Website";
document.body.style.background = "hsl(10, 20%, 30%";
// console.dir(document);

const username = "";
const welcomeMsg = document.getElementById("welcome-msg");

welcomeMsg.textContent += username === "" ? 'Guest' : username;