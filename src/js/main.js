const till20 = {
    0 : "zero",
    1 : "one",
    2 : "two",
    3 : "three",
    4 : "four",
    5 : "five",
    6 : "six",
    7 : "seven",
    8 : "eight",
    9 : "nine",
    10: "ten",
    11: "eleven",
    12: "twelve",
    13: "thirteen",
    14: "fourteen",
    15: "fifteen",
    16: "sixteen",
    17: "seventeen",
    18: "eighteen",
    19: "nineteen"
};
const after20 = {
    20: "twenty",
    30: "thirty",
    40: "forty",
    50: "fifty",
    60: "sixty",
    70: "seventy",
    80: "eighty",
    90: "ninety"
};

const power = {
    0 : "",
    1 : "",
    2 : " hundred",
    3 : " thousand",
    4 : " thousand",
    5 : " lakh",
    6 : " lakh",
    7 : " crore",
    8 : " crore"
};
// function to club two digits to make a 2 digit number
function twoDigits(x, y) {
    return x + 10 * y;
}
// when the number is less than 20
function lessthan20(num, i) {
    let ret = " ";
    ret += till20[num];
    ret += " ";
    ret += power[i];
    return ret;
}
// when the number is more than 20
function morethan20(num, i) {
    let ret = " ";

    ret += after20[Math.floor(num/10) * 10];
    if(Math.floor(num % 10) > 0) {
        ret += " ";
        ret += till20[Math.floor(num % 10)];
    }
    ret += " ";
    ret += power[i];

    return ret;
}
// main function to convert given number in word
function toWord() {
    let num = document.getElementById("number").value;
    let val = num;
        const arr = [];
    while(num >= 1) {
        arr.push(num % 10);
        num = Math.floor(num/10);
    }
    let ans = " only";
    const n = arr.length;
    let idx = 0;
    for(let i = 0; i < n; i++) {
        let dig;
        if(i == 2) {
            dig = twoDigits(arr[i], 0);
        } else{
            if(i + 1 < n) {
                dig = twoDigits(arr[i], arr[++i]);
            } else {
                dig = twoDigits(arr[i], 0);
            }
        } 
        if(dig < 1) continue;
        if(dig < 20) {
            ans = lessthan20(dig, i) + ans;
        } else {
            ans = morethan20(dig, i) + ans;
        }
    }
    if(val < 0) {
        document.getElementById("output").innerHTML = "please enter positive value";
    } else {
        if(val < 1) {
            ans = "zero";
        } 
        if(val.length < 1) {
            ans = "";
        }
        console.log(val);
        document.getElementById("output").innerHTML = ans;
    }
}