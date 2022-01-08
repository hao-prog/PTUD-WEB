function confirmDelete(id, name) {
    document.getElementById("tensinhvien").innerHTML = name + ' ';
    $('#modalDelete').modal('show');
    var result = document.getElementById('delete');
    result.href = 'search_student.php?action=delete&id=' + id;
}