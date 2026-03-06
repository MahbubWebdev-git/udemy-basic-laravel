// Dashboard chart initialisation with safe guards for missing elements
// Area chart options
var options = {
    series: [{ name: "series1", data: [0, 180, 60, 220, 85, 190, 70] }, { name: "series2", data: [0, 15, 250, 21, 365, 120, 30] }],
    chart: { toolbar: { show: false }, height: 350, type: "area" },
    dataLabels: { enabled: false },
    yaxis: { labels: { formatter: function (e) { return e + "k" } }, tickAmount: 4, min: 0, max: 400 },
    stroke: { curve: "smooth", width: 2 },
    grid: { show: true, borderColor: "#90A4AE", strokeDashArray: 0, position: "back", xaxis: { lines: { show: true } }, yaxis: { lines: { show: true } }, padding: { top: 10, right: 0, bottom: 10, left: 10 } },
    legend: { show: false },
    colors: ["#0f9cf3", "#6fd088"],
    labels: ["2015", "2016", "2017", "2018", "2019", "2020", "2021"]
};

// Render area chart if container exists
var elArea = document.querySelector("#area_chart");
if (elArea) {
    var chart = new ApexCharts(elArea, options);
    chart.render();
}

// Column + line chart
options = {
    series: [{ name: "2020", type: "column", data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16] }, { name: "2019", type: "line", data: [23, 32, 27, 38, 27, 32, 27, 38, 22, 31, 21, 16] }],
    chart: { height: 350, type: "line", toolbar: { show: false } },
    stroke: { width: [0, 2.3], curve: "straight" },
    plotOptions: { bar: { horizontal: false, columnWidth: "34%" } },
    dataLabels: { enabled: false },
    markers: { size: [0, 3.5], colors: ["#6fd088"], strokeWidth: 2, strokeColors: "#6fd088", hover: { size: 4 } },
    legend: { show: false },
    yaxis: { labels: { formatter: function (e) { return e + "k" } }, tickAmount: 5, min: 0, max: 50 },
    colors: ["#0f9cf3", "#6fd088"],
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
};

var elColumn = document.querySelector("#column_line_chart");
if (elColumn) {
    chart = new ApexCharts(elColumn, options);
    chart.render();
}

// Donut chart
options = {
    series: [42, 26, 15],
    chart: { height: 286, type: "donut" },
    labels: ["Market Place", "Last Week", "Last Month"],
    plotOptions: { pie: { donut: { size: "73%", labels: { show: true, name: { show: true, fontSize: "18px", offsetY: 5 }, value: { show: false, fontSize: "20px", color: "#343a40", offsetY: 8 }, total: { show: true, fontSize: "17px", label: "Ethereum", color: "#6c757d", fontWeight: 600 } } } } },
    dataLabels: { enabled: false },
    legend: { show: false },
    colors: ["#0f9cf3", "#6fd088", "#ffbb44"]
};

var elDonut = document.querySelector("#donut-chart");
if (elDonut) {
    chart = new ApexCharts(elDonut, options);
    chart.render();
}