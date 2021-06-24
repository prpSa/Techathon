<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
function check2(){
    var k, p;
    var flag=0;
    check :
    for (k = 1; k <= 3; k++) {
        for(p = 1; p <= 6; p++){
            if (isNaN(parseInt(document.getElementById('r' + k + 'c' + p ).value)) || parseInt(document.getElementById('r' + k + 'c' + p ).value) < 0 || parseInt(document.getElementById('r' + k + 'c' + p ).value) > 20) {
                console.log('r' + k + 'c' + p);
                event.preventDefault();
                swal("The value of the input should be between 0 to 20 in CO" +p+ " ASSIGNMENT"+k);
                var flag=1;
                break check;
            }
        }
    }
    if(flag==0){
    var i, j;
    checkSum :
    for (i = 1; i <= 3; i++) {
        var flag2 =0;
        var sum =0;
        for(j = 1; j <= 6; j++){
        sum = sum + parseInt(document.getElementById('r' + i + 'c' + j ).value);
        }
        if(sum!=20){
            event.preventDefault();
            swal("sum is not 20 in ASSIGNMENT" +i );
            var flag2=1;
            break checkSum;
        }
    }
    if(flag2 ==0){
            event.preventDefault();
             swal("Input values are correct");
   
    }
}

    

}