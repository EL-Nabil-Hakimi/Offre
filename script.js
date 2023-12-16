var search = function () {
  var titre = document.getElementById("titre").value;
  var reponse = new XMLHttpRequest();
  reponse.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("MyDives").innerHTML = this.responseText;
    }
  };

  reponse.open("GET", "search.php?titre=" + titre, true);
  reponse.send();
};
