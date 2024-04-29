document.addEventListener("DOMContentLoaded", () => {
        

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