function ConfirmDelete(){
    var del = confirm('Are you sure you want to delete this?');
    if (del == true) {
        return true;
    }
    else{
        return false;
    }
}