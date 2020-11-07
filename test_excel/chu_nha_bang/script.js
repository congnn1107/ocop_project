var n = 5;
var m = 3;

var available = [3,3,2];

var max = [
    [7,5,3],
    [3,2,2],
    [9,0,2],
    [2,2,2],
    [4,3,3]
];
var allocation = [
    [0,1,0],
    [2,0,0],
    [3,0,2],
    [2,1,1],
    [0,0,2]
];
var need = Array(5);
var finish = [0,0,0,0,0];
var work = [...available];
//tính need
for(i = 0; i<n; i++){
    need[i] = Array(3);
    for(j=0;j<m;j++){

        need[i][j] = max[i][j]- allocation[i][j];

    }
    //console.log(work);
}
result = [];
while(!isEnd()){
    for(i = 0; i<n; i++){

        for(j=0;j<m;j++){

            if(need[i][j]<=work[j] && finish[i]==0){

                work[j]+=allocation[i][j];
                allocation[i][j] = 0;
                if(j==m-1){
                    finish[i] = 1;
                }

            }else break;
        }
        if(isEnd()) break;
        console.log(i);
        console.log(work);
        var item ={};
        item.id = "P"+i;
        item.data=work; 
        result.push(item);
        
    }
}

function isEnd(){
    var sum = 0;
    for(i=0;i<n;i++){
        sum+= finish[i];
    }
    return sum==n;
}
    //console.log(sumArray(finish));
    console.log(result);