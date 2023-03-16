function tambah() {
    let forms = document.getElementById('kalkulator');
    let x = parseFloat(forms.input1.value);
    let y = parseFloat(forms.input2.value);
    if (isNaN(x) || isNaN(y)) {
        alert("Maaf angka belum terisi");
    } else {
        let total = x + y;
        forms.hasil.value = total;
    }
}

function kurang() {
    let forms = document.getElementById('kalkulator');
    let x = parseFloat(forms.input1.value);
    let y = parseFloat(forms.input2.value);
    if (isNanN(x) || isNaN(y)) {
        alert("Maaf angka belum terisi");
    } else {
        let total = x - y;
        forms.hasil.value = total;
    }
}


function kali() {
    let forms = document.getElementById('kalkulator');
    let x = parseFloat(forms.input1.value);
    let y = parseFloat(forms.input2.value);
    if (isNanN(x) || isNaN(y)) {
        alert("Maaf angka belum terisi");
    } else {
        let total = x * y;
        forms.hasil.value = total;
    }
}

function bagi() {
    let forms = document.getElementById('kalkulator');
    let x = parseFloat(forms.input1.value);
    let y = parseFloat(forms.input2.value);
    if (isNanN(x) || isNaN(y)) {
        alert("Maaf angka belum terisi");
    } else {
        let total = x / y;
        forms.hasil.value = total;
    }
}

function pangkat() {
    let forms = document.getElementById('kalkulator');
        let x = parseFloat(forms.input1.value);
        let y = parseFloat(forms.input2.value);
    if (isNanN(x) || isNaN(y)) {
        alert("Maaf angka belum terisi");
    } else {
        let total = Math.pow(x, y);
        forms.hasil.value = total;
    }
}