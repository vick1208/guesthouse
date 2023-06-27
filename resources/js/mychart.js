import { Chart } from "chart.js/auto";

const month = [
    'January',
    'February',
    'March',

];

const guestdata = {
    labels: month,
    datasets: [{
        label: 'Jumlah Pengunjung Hotel',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [20, 20, 30],
    }]
};
const roomdata = {
    labels: ["Standart","Superior","Villa"],
    datasets:[{
        label: 'Jumlah Ruangan',
        data: [10,20,5],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(128, 128, 0, 0.2)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(50, 205, 50)'
        ],
        borderWidth: 1
    }]
}
const statdata = {
    labels: ["Occupied","Vacant"],
    datasets:[{
        data: [8,27],
        backgroundColor: [
          'rgba(255, 99, 132, 0.7)',
          'rgba(255, 205, 86, 0.7)'
        ],
    }]

}

const config1 = {
    type: 'line',
    data: guestdata,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
};
const config2 = {
    type: 'bar',
    data: roomdata,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
};
const config3 ={
    type: 'pie',
    data: statdata,
    options:{}
}


new Chart(
    document.getElementById("guestChart"),
    config1
)
new Chart(
    document.getElementById("barChart"),
    config2
)
new Chart(
    document.getElementById("pieChart"),
    config3
)