function deletePost(id) {
    var ask = window.confirm("Are you sure you want to delete this license?");
    if (ask) {
        window.alert("This license was successfully deleted.");
        window.location.href = "CRUD/crud.php?delete="+id;
    }
  }