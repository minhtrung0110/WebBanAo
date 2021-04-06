var LineChart = {
    labels: ["Ruby", "jQuery", "Java", "ASP.Net", "PHP"],
    datasets: [{
        fillColor: "rgba(151,249,190,0.5)",
        strokeColor: "rgba(255,255,255,1)",
        pointColor: "rgba(220,220,220,1)",
        pointStrokeColor: "#fff",
        data: [10, 20, 30, 40, 50]
    }, {
        fillColor: "rgba(252,147,65,0.5)",
        strokeColor: "rgba(255,255,255,1)",
        pointColor: "rgba(173,173,173,1)",
        pointStrokeColor: "#fff",
        data: [28, 68, 40, 19, 96]
    }]
}
var myLineChart = new Chart(document.getElementById("canvas").getContext("2d")).Line(LineChart, {scaleFontSize: 14, scaleFontColor: "#ff8540"});
