function tambah() {
    let forms = document.getElementById('kalkulator');
    let a1 = parseFloat(forms.angka.value);
    let a2 = parseFloat(forms.angka2.value);
    if (isNaN(a1) && isNaN(a2)) {
        alert("Maaf angka belum terisi");
    } else {
        let total = a1 + a2;
        forms.hasil.value = total;
    }
}

function kurang() {
    let forms = document.getElementById('kalkulator');
    let a1 = parseFloat(forms.angka.value);
    let a2 = parseFloat(forms.angka2.value);
    if (isNanN(a1) && isNaN(a2)) {
        alert("Maaf angka belum terisi");
    } else {
        let total = a1 - a2;
        forms.hasil.value = total;
    }
}


function kali() {
    let forms = document.getElementById('kalkulator');
    let a1 = parseFloat(forms.angka.value);
    let a2 = parseFloat(forms.angka2.value);
    if (isNanN(a1) && isNaN(a2)) {
        alert("Maaf angka belum terisi");
    } else {
        let total = a1 * a2;
        forms.hasil.value = total;
    }
}

function bagi() {
    let forms = document.getElementById('kalkulator');
    let a1 = parseFloat(forms.angka.value);
    let a2 = parseFloat(forms.angka2.value);
    if (isNanN(a1) && isNaN(a2)) {
        alert("Maaf angka belum terisi");
    } else {
        let total = a1 / a2;
        forms.hasil.value = total;
    }
}

function pangkat() {
    if (isNanN(a1) && isNaN(a2)) {
        alert("Maaf angka belum terisi");
    } else {
        let forms = document.getElementById('kalkulator');
        let a1 = parseFloat(forms.angka.value);
        let a2 = parseFloat(forms.angka2.value);
        let total = Math.pow(a1, a2);
        forms.hasil.value = total;
    }
}