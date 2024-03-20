let labels = []; 

// console.log(courseStatistics)

courseStatistics.forEach(course => {
    labels.push(course.course_name);
});

let requests = []; 
courseStatistics.forEach(course => {
    requests.push(course.total_requests_count);
});

let confirmed = []; 
courseStatistics.forEach(course => {
    confirmed.push(course.confirmed_users_count);
});

let max = []; 
courseStatistics.forEach(course => {
    max.push(course.total_seats);
});

const options = {
    series: [
      {
        name: "Accepted Subscriptions",
        color: "#31C48D",
        data: confirmed,
      },
      {
        name: "Total Requests",
        data: requests,
        color: "#F05252",
      },
      {
        name: "Total Seats",
        data: max,
        color: "#1052ff",
      }
    ],
    chart: {
      sparkline: {
        enabled: false,
      },
      type: "bar",
      width: "100%",
      height: 400,
      toolbar: {
        show: false,
      }
    },
    fill: {
      opacity: 1,
    },
    plotOptions: {
      bar: {
        horizontal: true,
        columnWidth: "100%",
        borderRadiusApplication: "end",
        borderRadius: 6,
        dataLabels: {
          position: "top",
        },
      },
    },
    legend: {
      show: true,
      position: "bottom",
    },
    dataLabels: {
      enabled: false,
    },
    tooltip: {
      shared: true,
      intersect: false,
      formatter: function (value) {
        return "$" + value
      }
    },
    xaxis: {
      labels: {
        show: true,
        style: {
          fontFamily: "Inter, sans-serif",
          cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
        },
        formatter: function(value) {
          return  value
        }
      },
      categories: labels,
      axisTicks: {
        show: false,
      },
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      labels: {
        show: true,
        style: {
          fontFamily: "Inter, sans-serif",
          cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
        }
      }
    },
    grid: {
      show: true,
      strokeDashArray: 4,
      padding: {
        left: 2,
        right: 2,
        top: -20
      },
    },
    fill: {
      opacity: 1,
    }
  }
  
  if(document.getElementById("bar-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("bar-chart"), options);
    chart.render();
  }
  