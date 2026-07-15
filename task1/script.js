window.onload =function(){
alert("Hello, welcome to Abhay's portfolio!");
};
const newLocal = document.getElementById("helloButton");
const button = newLocal;
button.addEventListener("click",() => {
        alert("Hello, welcome");
    });

  document.getElementById("contacts").addEventListener("submit",function (event){
            const name = document.getElementById("name").value;
            const email = document.getElementById("email").value;
            const message = document.getElementById("message").value;
            if(name === "" || email === "" || message === ""){
                alert("Please fill in all fields before submitting the form.");
                event.preventDefault();
            }            
        });
        
