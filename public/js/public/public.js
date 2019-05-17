function getrandomNum(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function getRangeStats() {

    var num = [];
    var length = 4;
    var sum;
    for (var i = 1; i <= length; i++) {

        num.push(getrandomNum(1, 6));
    }

    return num;
}

function getSumStats(array) {

    var sort;
    sort = array.sort(function (a, b) {
        return b - a;
    }).slice(0, 3)
    console.log(sort);

    sum = sort.reduce(function (a, b) {
        return a + b;
    }, 0);

    return sum;

}
