function checkvalue(){
    var k, p;
    var flag=0;
    if(flag==0){
    var i, j, sum = 0;
    checkSum :
    for (i = 1; i <= 6; i++) {
        var flag2 =0;
        var sum =0;
        for(j = 1; j <= 6; j++){
        sum = sum + parseInt(document.getElementById('q' + i + 'c' + j ).value);
        }
        if(sum!=20){
            event.preventDefault();
            alert("sum is not 20 in Question" +i );
            var flag2=1;
            break checkSum;
        }
    }
    if(flag2 ==0){
            event.preventDefault();
             alert("Input values are correct");
             break;
   
    }
}

    

}
