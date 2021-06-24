function checkcopo(){
    var k, p;
    var flag=0;
    check :
    for (k = 1; k <= 6; k++) {
        for(p = 1; p <= 12; p++){
            if (isNaN(parseInt(document.getElementById('rco' + k + 'cpo' + p ).value)) || parseInt(document.getElementById('rco' + k + 'cpo' + p ).value) < 0 || parseInt(document.getElementById('rco' + k + 'cpo' + p ).value) > 3) {
                event.preventDefault();
                alert("The value of the input should be between 0 and 3 in CO" +k+ " PO"+p);
                var flag=1;
                break check;
            }
        }
    }
    if(flag==0){
    var i, j;
    var sum = 0;
    checkSum :
    for (i = 1; i <= 6; i++) {
        var sum = 0;
        var flag2 =0;
        for(j = 1; j <= 12; j++){
        sum = sum + parseInt(document.getElementById('rco' + i + 'cpo' + j ).value);
        }
        if(sum!=10){
            event.preventDefault();
            alert("sum is not 10 in CO" +i );
            var flag2=1;
            break checkSum;
        }
    }
    if(flag2 ==0){
            event.preventDefault();
             alert("Input values are correct");
   
    }
}
    
    

}