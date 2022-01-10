<?php 
for($i=0; $i<12; $i++){
	$bulan[$i] = namabulan($i+1);
	$lapMember[$i] = 0;
	$lapPinjam[$i] = 0;
}

function namabulan($bln)
{
	switch ($bln)
	{
		case 1: return "Jan"; break;
		case 2: return "Feb"; break;
		case 3: return "Mar"; break;
		case 4: return "Apr"; break;
		case 5: return "Mei"; break;
		case 6: return "Jun"; break;
		case 7: return "Jul"; break;
		case 8: return "Ags"; break;
		case 9: return "Sep"; break;
		case 10: return "Okt"; break;
		case 11: return "Nov"; break;
		case 12: return "Des"; break;
	}
}

foreach($list_laporan as $i => $val){
	$lapMember[$i] = (float) $val->jml_member;
	$lapPinjam[$i] = (float) $val->jml_peminjaman;
}
?>

<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Beranda</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="./">Beranda</a></li>
			<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
		</ol>
	</div>

	<div class="row mb-3">
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">Earnings (Monthly)</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
							<div class="mt-2 mb-0 text-muted text-xs">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
								<span>Since last month</span>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-primary"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Earnings (Annual) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">Sales</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">650</div>
							<div class="mt-2 mb-0 text-muted text-xs">
								<span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
								<span>Since last years</span>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-shopping-cart fa-2x text-success"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- New User Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">New User</div>
							<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">366</div>
							<div class="mt-2 mb-0 text-muted text-xs">
								<span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
								<span>Since last month</span>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-info"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">Pending Requests</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
							<div class="mt-2 mb-0 text-muted text-xs">
								<span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
								<span>Since yesterday</span>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-comments fa-2x text-warning"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Laporan Member dan Peminjaman</h6>
				</div>
				<div class="card-body">
					<div class="chart-bar">
						<canvas id="myBarChart"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
// Bar and Line Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
	type: 'bar',
	data: {
		labels: <?= json_encode($bulan) ?>,
		datasets: [{
			label: "Jumlah Member",
			backgroundColor: "#4e73df",
			hoverBackgroundColor: "#2e59d9",
			borderColor: "#4e73df",
			data: <?= json_encode($lapMember) ?>,
		},
		{
			label: "Jumlah Peminjaman",
			backgroundColor: "#1cc88a",
			hoverBackgroundColor: "#1cc88a0",
			borderColor: "#4e73df",
			data: <?= json_encode($lapPinjam) ?>,
		}],
	},
	options: {
		maintainAspectRatio: false,
		layout: {
			padding: {
				left: 10,
				right: 25,
				top: 25,
				bottom: 0
			}
		},
		scales: {
			xAxes: [{
				time: {
					unit: 'month'
				},
				gridLines: {
					display: false,
					drawBorder: false
				},
				ticks: {
					maxTicksLimit: 7
				},
			}],
			yAxes: [{
				ticks: {
					maxTicksLimit: 5,
					padding: 10,
					// Include a dollar sign in the ticks
					callback: function(value, index, values) {
						return value;
					}
				},
				gridLines: {
					color: "rgb(234, 236, 244)",
					zeroLineColor: "rgb(234, 236, 244)",
					drawBorder: false,
					borderDash: [2],
					zeroLineBorderDash: [2]
				}
			}],
		},
		legend: {
			display: false
		},
		tooltips: {
			titleMarginBottom: 10,
			titleFontColor: '#6e707e',
			titleFontSize: 14,
			backgroundColor: "rgb(255,255,255)",
			bodyFontColor: "#858796",
			borderColor: '#dddfeb',
			borderWidth: 1,
			xPadding: 15,
			yPadding: 15,
			displayColors: false,
			caretPadding: 10,
			callbacks: {
				label: function(tooltipItem, chart) {
					var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
					return datasetLabel + ': ' + tooltipItem.yLabel;
				}
			}
		},
	}
});

</script>