function check(){
    var k, p;
    var flag=0;
    check :
    for (k = 1; k <= 6; k++) {
        for(p = 1; p <= 3; p++){
            if (isNaN(parseInt(document.getElementById('rcoo' + k + 'cpoo' + p ).value)) || parseInt(document.getElementById('rcoo' + k + 'cpoo' + p ).value) < 0 || parseInt(document.getElementById('rcoo' + k + 'cpoo' + p ).value) > 3) {
                console.log('rcoo' + k + 'cpoo' + p);
                event.preventDefault();
                alert("The value of the input should be between 0 and 3 in CO" +k+ " PSO"+p);
                var flag=1;
                break check;
            }
        }
    }
    
    if(flag==0){
        event.preventDefault();
        alert("Input values are correct");

    }
}