function displayText(){
    let text = document.getElementById("userInput").value;
    document.getElementById("output").innerHTML = "You typed: "+ text;
    document.getElementById("userInput").value = "";
}