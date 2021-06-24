function checkvalue(){
    var k, p,i;
    var flag=0;
    check :
    for(i=1;i<=2;i++){
    for (k = 1; k <= 3; k++) {
        for(p = 1; p <= 6; p++){
            if (isNaN(parseInt(document.getElementById('t'+i +'q' + k + 'c' + p ).value)) || parseInt(document.getElementById('t'+i +'q' + k + 'c' + p ).value) < 0 || parseInt(document.getElementById('t'+i +'q' + k + 'c' + p ).value) > 10) {
                event.preventDefault();
                alert("The value of the input should be between 0 and 10 in CO" +k+ " Question"+p);
                var flag=1;
                break check;
            }
        }
    }
}
    if(flag==0){
    var i, j,k;
    checkSum :
    for (k = 1; k <= 2; k++){
    for (i = 1; i <= 3; i++) {
        var flag2 =0;
        var sum =0;
        for(j = 1; j <= 6; j++){
        sum = sum + parseInt(document.getElementById('t'+k +'q' + i + 'c' + j ).value);
        }
        if(sum!=20){
            event.preventDefault();
            alert("sum is not 20 in Question"+i + " of term"+k);
            var flag2=1;
            break checkSum;
        }
    }
}
    if(flag2 ==0){
            event.preventDefault();
             alert("Input values are correct");
   
    }
}

    

}