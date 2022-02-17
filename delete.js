function deleteStd(id) {
  if (confirm("are you sure?")) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        location.assign("index.php");
      }
    };

    xmlhttp.open("GET", "delete.php?index=" + id, true);
    xmlhttp.send();
  }
}
