
function display(val) {
    document.getElementById("result").value += val
}

function myFunction(event) {
    if (event.key == '0' || event.key == '1' 
        || event.key == '2' || event.key == '3'
        || event.key == '4' || event.key == '5' 
        || event.key == '6' || event.key == '7'
        || event.key == '8' || event.key == '9' 
        || event.key == '+' || event.key == '-'
        || event.key == '*' || event.key == '/')
        document.getElementById("result").value += event.key;
}

var calcu = document.getElementById("calculator");
calcu.onkeyup = function (event) {
    if (event.keyCode === 13) {
        console.log("Enter");
        let x = document.getElementById("result").value
        console.log(x);
        solve();
    }
}

function solve() {
    let x = document.getElementById("result").value
    let y = math.evaluate(x)
    document.getElementById("result").value = y
}

function clr() {
    document.getElementById("result").value = ""
}

function createButton()
   {
      const input = document.createElement("input");
      input.setAttribute("type", "text");
      document.body.appendChild(input);
      var btn = document.createElement("BUTTON");
      btn.innerHTML= "C";
      document.body.appendChild(btn);
      var br= document.createElement("BR");
      document.body.appendChild(br);
      var list=['+','-','*','/'];
      var listCounter=0;
      for(var ButtonCounter=1; ButtonCounter<=16; ButtonCounter++)
      {
         var btn = document.createElement("BUTTON");
         if(ButtonCounter%4!=0){
            btn.innerHTML= ButtonCounter-1;
            document.body.appendChild(btn);
         }
         else if(ButtonCounter%5==0)
         {
            btn.innerHTML= ButtonCounter-6;
            document.body.appendChild(btn);
         }
         else
         {
            btn.innerHTML= list[listCounter];
            document.body.appendChild(btn);
            var br= document.createElement("BR");
            document.body.appendChild(br);
            listCounter++;
         }
      }
   }