function deleteSubject(name, id) {
    if (confirm(`Bạn chắc chắn muốn xóa môn học ${name}?`)) {
        window.location = `subject.php?action=delete&id=${id}`;
        return true;
    } else {
        return false;
    }
}
