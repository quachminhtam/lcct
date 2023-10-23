function updatespp() {
    var kh = document.getElementById("kh");
    var sp = document.getElementById("sp");
    
    // Xóa tất cả các tùy chọn hiện tại trong trường thứ hai
    sp.innerHTML = "";
    
    // Lấy giá trị của trường đầu tiên
    var selectedValue = kh.value;
    
    // Thêm các tùy chọn cho trường thứ hai dựa vào giá trị trường đầu tiên
    if (selectedValue === "SME") {
        var option1 = document.createElement("option");
        option1.text = "sp1";
        var option2 = document.createElement("option");
        option2.text = "sp2";
        sp.add(option1);
        sp.add(option2);
    } else if (selectedValue === "LE") {
        var option3 = document.createElement("option");
        option3.text = "sp3";
        var option4 = document.createElement("option");
        option4.text = "sp4";
        sp.add(option3);
        sp.add(option4);
    }
}

function updatesp() {
var kh = document.getElementById("kh");
var sp = document.getElementById("sp");

var selectedValue = kh.value;

if (selectedValue !== "null") {
    sp.disabled = false;
}
}

function updatecum() {
    var mien = document.getElementById("mien");
    var cum = document.getElementById("cum");

    var selectedValue = mien.value;

    if (selectedValue !== "null") {
        cum.disabled = false;
    }
}

function updatedvkd() {
    var cum = document.getElementById("cum");
    var dvkd = document.getElementById("dvkd");

    var selectedValue = cum.value;

    if (selectedValue !== "null") {
        dvkd.disabled = false;
    }
}

document.getElementById("editt").addEventListener("click", suahs);
function suahs(){
    const suahs = document.getElementById("suahs");
    const xemhs = document.getElementById("xemhs");
    suahs.style.display = 'block';
    xemhs.style.display = 'none';
}

document.getElementById("suacum").addEventListener("click", editcum);
function editcum(){
    const editcum = document.getElementById("editcum");
    editcum.style.display = 'block';
}

document.getElementById("edit").addEventListener("click", updatehs);
function updatehs() {
    var tsdb = document.getElementById("tsdb");
    tsdb.disabled = false;
}
