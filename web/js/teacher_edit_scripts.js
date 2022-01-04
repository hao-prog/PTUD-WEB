function getFileData(myFile) {
    var file = myFile.files[0];
    if (file) {
        var filename = file.name;
        document.getElementById('img').src = URL.createObjectURL(file);
        document.getElementById("fileNameTextBox").innerHTML = filename;
    }
}