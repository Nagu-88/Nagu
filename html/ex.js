<!DOCTYPE html>
<html>
<body>
<h1>createElement() example</h1>
<p>Click the below button to create more buttons</p>
<button onclick="createButton()">CREATE</button>
<br><br>
<script>
   var i=0;
   function createButton() {
      i++;
      var btn = document.createElement("BUTTON");
      btn.innerHTML="BUTTON"+i;
      var br= document.createElement("BR");
      document.body.appendChild(btn);
      document.body.appendChild(br);
   }
</script>
</body>
</html>