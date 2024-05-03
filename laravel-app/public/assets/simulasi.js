document.addEventListener("DOMContentLoaded", () => {
        

        $("#simulasi-pinjaman").click(function() {
            let statusKepegawaian = document.getElementById("stat_kepegawaian")
            let pendapatan = document.getElementById("pendapatan")
            let angsuran = document.getElementById("lama-angsuran")
            let pinjaman = document.getElementById("jmlh-pinjaman")
            let alasan = document.getElementById("keperluan")

            var earn = parseInt(pendapatan.value)
            var angsur = parseInt(angsuran.value)
            

        if (earn + angsur >= pinjaman.value){
            console.log (`Hasil Perhitungan adalah ${scoring()}`)
            var link = document.createElement('a');
            link.href = '/pengajuan'
            link.innerText = 'Pengajuan Pinjaman'
            link.style.color = 'green'
            var div = document.getElementById("simResult")
            div.style.color = 'black'
            div.innerText = 'Selamat, Anda layak melakukan pinjaman! silahkan lakukan  '
            div.appendChild(link);
            function scoring (){
                var count = countChecked()
                var hasil = Math.pow(statusKepegawaian.value,0.20) + Math.pow(pendapatan.value,0.2) 
                 + Math.pow(angsuran.value,0.2)+Math.pow(pinjaman.value,-0.3)
                 + Math.pow(alasan.value,0.05)+ Math.pow(count ,0.05)
                return hasil;
            }
        } else {
            console.log('auto gak boleh pinjem')
            console.log(earn+angsur)
            var div = document.getElementById("simResult")
            div.style.color = 'red'
            div.innerText = 'Maaf, Anda belum layak melakukan pinjaman  '
        }
            function countChecked() {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');    
                var count = 0;
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        count++; 
                    }
                });
                return count;
            }
        })


    	$("#simulasi-cicilan").click(function() {
            let plafondDrop = document.getElementById('plafond')
            let plafond = parseFloat(plafondDrop.value)
    
            let angsurDrop = document.getElementById('angsur')
            let angsur = parseFloat(angsurDrop.value) 
            var simulasi = Math.ceil(((plafond*0.03*angsur) + plafond)/angsur)

            let neatSimulasi = neatnumber(simulasi);
           
            document.getElementById("result").innerText = "Cicilan Anda sebanyak: Rp " +neatSimulasi+ "/Bulan";
	});

        function neatnumber(number) {
                let numStr = String(number);
                if (numStr.length < 7) {       
                    numStr = numStr.slice(0, -3) + '.'+ numStr.slice(-3) ;
                } else {
                    numStr = numStr.slice(0, -6) + '.' + numStr.slice(-6);
                }
                return numStr;
            }
    
})