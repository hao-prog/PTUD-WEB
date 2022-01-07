function deleteScore(student, id) {
  if (confirm(`Bạn chắc chắn muốn xóa điểm của sinh viên ${student}?`)) {
    window.location = `search_score.php?action=delete&id=${id}`;
    return true;
  } else {
    return false;
  }
}
