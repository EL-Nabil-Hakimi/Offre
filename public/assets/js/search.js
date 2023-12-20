var search = function () {
  var titre = document.getElementById("titre").value;
  var paye = document.getElementById("paye").value;
  var reponse = new XMLHttpRequest();
  reponse.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("MyDives").innerHTML = this.responseText;
    }
  };

  reponse.open("GET", "?route=search_result&titre=" + titre + "&paye=" + paye, true);
  reponse.send();
};
