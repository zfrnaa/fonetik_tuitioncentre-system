<?php
require_once('Connections/conn.php');
$sql = "SELECT SUM(fee) AS total_fee,
       COUNT(id_student) AS total_students,
       (SELECT COUNT(id_teacher) FROM tbl_teacher) AS total_teachers
		FROM tbl_student;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No results found";
}


// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'inc/menu.php' ?>
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>

    <?php
    // Generate random data for initial display
    $data = array(
        'labels' => array('Jan', 'Feb', 'Mar', 'Apr', 'May'),
        'datasets' => array(
            array(
                'label' => 'Yuran Dikumpul',
                'data' => array(rand(400, 800), rand(600, 1000), rand(700, 1200), rand(450, 750), rand(650, 900))
            )
        )
    );
    ?>
	<title>E-FONETIK SYSTEM FONETIK TUITION CENTER</title>
</head>
<body class="homeadmin-body">


<section class="dashboard">
	<div class="data-stats-cont">
		<div class="data-stats-row1">
			<div class="data-items1 dtct">
				<div class="data-cont">
					<div class="data-title">
						<h4>Data Pelajar</h4>
					</div>
					<div class="data">
						<img src="img/student.svg" alt="student-icon">
						<h5>Pelajar Semasa Berdaftar</h5>
					</div>
					<h1><?php echo $row["total_students"]; ?></h1>
					<div class="data">
						<img src="img/percentage.svg" alt="average-icon">
						<h5>Purata Kehadiran</h5>
					</div>
					<h1>95%</h1>
				</div>
			</div>
			<div class="data-items1 dtct">
				<div class="data-cont">
					<div class="data-title">
						<h4>Data Cikgu</h4>
					</div>
					<div class="data">
						<img src="img/teacher.svg" alt="teacher-icon">
						<h5>Jumlah Cikgu/Tutor</h5>
					</div>
					<h1><?php echo $row["total_teachers"]; ?></h1>
					<div class="data">
						<img src="img/percentage.svg" alt="average-icon">
						<h5>Prestasi Guru</h5>
					</div>
					<h1>98%</h1>
				</div>
			</div>
			<div class="data-items1 dtac">
				<div class="data-cont">
					<div class="data-title">
						<h4>Data Subjek</h4>
					</div>
					<div class="data">
						<img src="img/course-white.svg" alt="course-icon">
						<h5>Subjek Paling Aktif</h5>
					</div>
					<h1>Bahasa Melayu</h1>
					<h1>Mathematics</h1>
				</div>
			</div>
		</div>
		<div class="data-stats-row2">
			<div class="data-items2 dtf" style="flex-grow: 1; width: 70%;">
				<div class="data-cont">
					<div class="data-title">
						<h4>Data Kewangan</h4>
					</div>
					<div class="data">
						<img src="img/money.svg" alt="fees-icon">
						<h5>Jumlah Yuran Dikumpul</h5>
					</div>
						<h1><?php echo "RM " . $row["total_fee"]; ?></h1>
					<div class="data">
						<img src="img/divide.svg" alt="fraction-icon">
						<h5>Pecahan Perbelanjaan</h5>
					</div>
						<h1>RM 123</h1>
					<div class="data">
						<img src="img/pay.svg" alt="pay-icon">
						<h5>Bayaran Tertunggak</h5>
					</div>
						<h1>RM 430</h1>
				</div>
					<div class="graph-container" style="margin: auto; width: auto">
					<canvas id="graf-yuran" style="width:340px; height: 340px; background-color: darkseagreen;"></canvas>
				</div>
			</div>
			<div class="data-items2 dtc">
				<div class="data-cont dt2">
					<div class="data-title">
						<h5>Kelas dan Acara Akan Datang</h5>
					</div>
					<div class="calendar"></div>
				</div>
			</div>
		</div>
		<div class="data-stats-row3">
			<div class="data-items3 dta">
				<div class="data-cont">
					<div class="data-title dt3">
						<h5>Tindakan</h5>
					</div>
					<h1>100 mendaftar</h1>
				</div>
			</div>
			<div class="data-items3 dta">
				<div class="data-cont">
					<div class="data-title dt3">
						<h5>Paparan Halaman</h5>
					</div>
					<h1>1010</h1>
				</div>
			</div>
			<div class="data-items3 dtr3">
				<div class="data-cont">
					<div class="data-title dt3">
						<h5>Kutipan Derma Hari Ini</h5>
					</div>
					<h1>RM300</h1>
				</div>
			</div>
		</div>
</section>

<main class="utama-footer">
	<div class="mainlogo">
		<img src="img/logo.png" alt="logo">
		<p><strong>E-FONETIK SYSTEM FONETIK TUITION CENTER</strong></p>
	</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- jQuery Easing -->
<!--<script src="js/jquery.easing.1.3.js"></script>-->
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>

<!--<script src="js/jquery.stellar.min.js"></script>-->
<!--<script src="js/owl.carousel.min.js"></script>-->
<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<script>
    //check the console for date click event
    //Fixed day highlight
    //Added previous month and next month view

    function CalendarControl() {
        const calendar = new Date();
        let calendarControl = {
            localDate: new Date(),
            prevMonthLastDate: null,
            calWeekDays: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            calMonthName: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec"
            ],
            daysInMonth: function (month, year) {
                return new Date(year, month, 0).getDate();
            },
            firstDay: function () {
                return new Date(calendar.getFullYear(), calendar.getMonth(), 1);
            },
            lastDay: function () {
                return new Date(calendar.getFullYear(), calendar.getMonth() + 1, 0);
            },
            firstDayNumber: function () {
                return calendarControl.firstDay().getDay() + 1;
            },
            lastDayNumber: function () {
                return calendarControl.lastDay().getDay() + 1;
            },
            getPreviousMonthLastDate: function () {
                let lastDate = new Date(
                    calendar.getFullYear(),
                    calendar.getMonth(),
                    0
                ).getDate();
                return lastDate;
            },
            navigateToPreviousMonth: function () {
                calendar.setMonth(calendar.getMonth() - 1);
                calendarControl.attachEventsOnNextPrev();
            },
            navigateToNextMonth: function () {
                calendar.setMonth(calendar.getMonth() + 1);
                calendarControl.attachEventsOnNextPrev();
            },
            navigateToCurrentMonth: function () {
                let currentMonth = calendarControl.localDate.getMonth();
                let currentYear = calendarControl.localDate.getFullYear();
                calendar.setMonth(currentMonth);
                calendar.setYear(currentYear);
                calendarControl.attachEventsOnNextPrev();
            },
            displayYear: function () {
                let yearLabel = document.querySelector(".calendar .calendar-year-label");
                yearLabel.innerHTML = calendar.getFullYear();
            },
            displayMonth: function () {
                let monthLabel = document.querySelector(
                    ".calendar .calendar-month-label"
                );
                monthLabel.innerHTML = calendarControl.calMonthName[calendar.getMonth()];
            },
            selectDate: function (e) {
                console.log(
                    `${e.target.textContent} ${
                        calendarControl.calMonthName[calendar.getMonth()]
                    } ${calendar.getFullYear()}`
                );
            },
            plotSelectors: function () {
                document.querySelector(
                    ".calendar"
                ).innerHTML += `<div class="calendar-inner"><div class="calendar-controls">
          <div class="calendar-prev"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128"><path fill="#666" d="M88.2 3.8L35.8 56.23 28 64l7.8 7.78 52.4 52.4 9.78-7.76L45.58 64l52.4-52.4z"/></svg></a></div>
          <div class="calendar-year-month">
          <div class="calendar-month-label"></div>
          <div>-</div>
          <div class="calendar-year-label"></div>
          </div>
          <div class="calendar-next"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128"><path fill="#666" d="M38.8 124.2l52.4-52.42L99 64l-7.77-7.78-52.4-52.4-9.8 7.77L81.44 64 29 116.42z"/></svg></a></div>
          </div>
          <div class="calendar-today-date">Today:
            ${calendarControl.calWeekDays[calendarControl.localDate.getDay()]},
            ${calendarControl.localDate.getDate()},
            ${calendarControl.calMonthName[calendarControl.localDate.getMonth()]}
            ${calendarControl.localDate.getFullYear()}
          </div>
          <div class="calendar-body"></div></div>`;
            },
            plotDayNames: function () {
                for (let i = 0; i < calendarControl.calWeekDays.length; i++) {
                    document.querySelector(
                        ".calendar .calendar-body"
                    ).innerHTML += `<div>${calendarControl.calWeekDays[i]}</div>`;
                }
            },
            plotDates: function () {
                document.querySelector(".calendar .calendar-body").innerHTML = "";
                calendarControl.plotDayNames();
                calendarControl.displayMonth();
                calendarControl.displayYear();
                let count = 1;
                let prevDateCount = 0;

                calendarControl.prevMonthLastDate = calendarControl.getPreviousMonthLastDate();
                let prevMonthDatesArray = [];
                let calendarDays = calendarControl.daysInMonth(
                    calendar.getMonth() + 1,
                    calendar.getFullYear()
                );
                // dates of current month
                for (let i = 1; i < calendarDays; i++) {
                    if (i < calendarControl.firstDayNumber()) {
                        prevDateCount += 1;
                        document.querySelector(
                            ".calendar .calendar-body"
                        ).innerHTML += `<div class="prev-dates"></div>`;
                        prevMonthDatesArray.push(calendarControl.prevMonthLastDate--);
                    } else {
                        document.querySelector(
                            ".calendar .calendar-body"
                        ).innerHTML += `<div class="number-item" data-num=${count}><a class="dateNumber" href="#">${count++}</a></div>`;
                    }
                }
                //remaining dates after month dates
                for (let j = 0; j < prevDateCount + 1; j++) {
                    document.querySelector(
                        ".calendar .calendar-body"
                    ).innerHTML += `<div class="number-item" data-num=${count}><a class="dateNumber" href="#">${count++}</a></div>`;
                }
                calendarControl.highlightToday();
                calendarControl.plotPrevMonthDates(prevMonthDatesArray);
                calendarControl.plotNextMonthDates();
            },
            attachEvents: function () {
                let prevBtn = document.querySelector(".calendar .calendar-prev a");
                let nextBtn = document.querySelector(".calendar .calendar-next a");
                let todayDate = document.querySelector(".calendar .calendar-today-date");
                let dateNumber = document.querySelectorAll(".calendar .dateNumber");
                prevBtn.addEventListener(
                    "click",
                    calendarControl.navigateToPreviousMonth
                );
                nextBtn.addEventListener("click", calendarControl.navigateToNextMonth);
                todayDate.addEventListener(
                    "click",
                    calendarControl.navigateToCurrentMonth
                );
                for (let i = 0; i < dateNumber.length; i++) {
                    dateNumber[i].addEventListener(
                        "click",
                        calendarControl.selectDate,
                        false
                    );
                }
            },
            highlightToday: function () {
                let currentMonth = calendarControl.localDate.getMonth() + 1;
                let changedMonth = calendar.getMonth() + 1;
                let currentYear = calendarControl.localDate.getFullYear();
                let changedYear = calendar.getFullYear();
                if (
                    currentYear === changedYear &&
                    currentMonth === changedMonth &&
                    document.querySelectorAll(".number-item")
                ) {
                    document
                        .querySelectorAll(".number-item")
                        [calendar.getDate() - 1].classList.add("calendar-today");
                }
            },
            plotPrevMonthDates: function (dates) {
                dates.reverse();
                for (let i = 0; i < dates.length; i++) {
                    if (document.querySelectorAll(".prev-dates")) {
                        document.querySelectorAll(".prev-dates")[i].textContent = dates[i];
                    }
                }
            },
            plotNextMonthDates: function () {
                let childElemCount = document.querySelector('.calendar-body').childElementCount;
                //7 lines
                if (childElemCount > 42) {
                    let diff = 49 - childElemCount;
                    calendarControl.loopThroughNextDays(diff);
                }

                //6 lines
                if (childElemCount > 35 && childElemCount <= 42) {
                    let diff = 42 - childElemCount;
                    calendarControl.loopThroughNextDays(42 - childElemCount);
                }

            },
            loopThroughNextDays: function (count) {
                if (count > 0) {
                    for (let i = 1; i <= count; i++) {
                        document.querySelector('.calendar-body').innerHTML += `<div class="next-dates">${i}</div>`;
                    }
                }
            },
            attachEventsOnNextPrev: function () {
                calendarControl.plotDates();
                calendarControl.attachEvents();
            },
            init: function () {
                calendarControl.plotSelectors();
                calendarControl.plotDates();
                calendarControl.attachEvents();
            }
        };
        calendarControl.init();
    }

    let calendarControl = new CalendarControl();

</script>
<script>
    const DISPLAY = true;
const CHART_AREA = true;

    var ctx = document.getElementById('graf-yuran').getContext('2d');
    ctx.backgroundColor = '#9BD0F5';
    ctx.imageSmoothingQuality = "high";
    var myChart = new Chart(ctx, {
        type: 'line',
        data: <?php echo json_encode($data); ?>,
        options: {
            display: true,
            responsive: true,
	        aspectRatio: 1,
            borderColor: 'white',
            color: 'white',
	        tension: 0.7,
	        pointRadius: 0,
	        language: "Malay",
            plugins: {
            legend: {
                display: false
            }
        },
    }
    });

    setInterval(function() {
        // Generate new random data using JavaScript's Math.random()
        var newData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                label: 'Yuran Dikumpul',
                data: [
                    Math.floor(Math.random() * 400) + 400,
                    Math.floor(Math.random() * 400) + 600,
                    Math.floor(Math.random() * 500) + 700,
                    Math.floor(Math.random() * 300) + 450,
                    Math.floor(Math.random() * 300) + 650
                ]
            }],
            scales: {
    xAxis: [{
      gridLines: false
    }],
    yAxis: [{
      gridLines: false
    }]
  }
        };

        myChart.data = newData;
    });
</script>
</body>
</html>