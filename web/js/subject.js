function deleteSubject(name, id) {
    if (confirm(`Bạn muốn xóa môn ${name}?`) == true) {
        window.location = `subject.php?action=delete&id=${id}`;
        return true;
    } else {
        return false;
    }
}