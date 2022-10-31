@extends('admin.layouts.app')

@section('head')
<style>
	.count{
		text-align: center;
	    padding: 50px;
	}
</style>
@endsection

@section('breadcrumb')
	@include('admin.includes.breadcrumb', [
		'title'		=> t('Dashboard','site'),
		'menu'		=> [
			t('Dashboard','site') => route('admin.dashboard'),
		],
	])
@endsection

@section('content')
<div class="row">
{{-- 	<div class="col-md-12 text-center" style="margin-top:200px">	
		<img src="{{ $settings['logo']? url($settings['logo']) : url('assets/site/img/logo.png') }}" class="max-h-400px slideDown" alt="" />
	</div> --}}
</div>
{{-- <div class="row">
	<div class="col-xl-4">
		<div class="card card-custom gutter-b card-stretch">
			<div class="card-header border-0 pt-5">
				<div class="card-title">
					<div class="card-label">
						<div class="font-weight-bolder">Weekly Sales Stats</div>
						<div class="font-size-sm text-muted mt-2">890,344 Sales</div>
					</div>
				</div>
				<div class="card-toolbar">
					<div class="dropdown dropdown-inline">
						<a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="ki ki-bold-more-hor"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
							<ul class="navi navi-hover py-5">
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="flaticon2-drop"></i>
										</span>
										<span class="navi-text">New Group</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="flaticon2-list-3"></i>
										</span>
										<span class="navi-text">Contacts</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="navi-text">Groups</span>
										<span class="navi-link-badge">
											<span class="label label-light-primary label-inline font-weight-bold">new</span>
										</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="flaticon2-bell-2"></i>
										</span>
										<span class="navi-text">Calls</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="flaticon2-gear"></i>
										</span>
										<span class="navi-text">Settings</span>
									</a>
								</li>
								<li class="navi-separator my-3"></li>
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="flaticon2-magnifier-tool"></i>
										</span>
										<span class="navi-text">Help</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="flaticon2-bell-2"></i>
										</span>
										<span class="navi-text">Privacy</span>
										<span class="navi-link-badge">
											<span class="label label-light-danger label-rounded font-weight-bold">5</span>
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body d-flex flex-column px-0" style="position: relative;">
				<div id="kt_tiles_widget_1_chart" data-color="danger" style="height: 125px; min-height: 125px;"><div id="apexchartsbbpj7pv3" class="apexcharts-canvas apexchartsbbpj7pv3 apexcharts-theme-light" style="width: 505px; height: 125px;"><svg id="SvgjsSvg1067" width="505" height="125" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1069" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1068"><clipPath id="gridRectMaskbbpj7pv3"><rect id="SvgjsRect1072" width="512" height="128" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskbbpj7pv3"><rect id="SvgjsRect1073" width="509" height="129" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1078" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1079" stop-opacity="1" stop-color="rgba(255,242,243,1)" offset="0.25"></stop><stop id="SvgjsStop1080" stop-opacity="0.2" stop-color="rgba(255,226,229,0.2)" offset="0.5"></stop><stop id="SvgjsStop1081" stop-opacity="0.2" stop-color="rgba(255,226,229,0.2)" offset="1"></stop></linearGradient></defs><g id="SvgjsG1084" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1085" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1099" class="apexcharts-grid"><g id="SvgjsG1100" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1102" x1="0" y1="0" x2="505" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1103" x1="0" y1="12.5" x2="505" y2="12.5" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1104" x1="0" y1="25" x2="505" y2="25" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1105" x1="0" y1="37.5" x2="505" y2="37.5" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1106" x1="0" y1="50" x2="505" y2="50" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1107" x1="0" y1="62.5" x2="505" y2="62.5" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1108" x1="0" y1="75" x2="505" y2="75" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1109" x1="0" y1="87.5" x2="505" y2="87.5" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1110" x1="0" y1="100" x2="505" y2="100" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1111" x1="0" y1="112.5" x2="505" y2="112.5" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1112" x1="0" y1="125" x2="505" y2="125" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1101" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1114" x1="0" y1="125" x2="505" y2="125" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1113" x1="0" y1="1" x2="0" y2="125" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1074" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1075" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1082" d="M0 125L0 57.432432432432435C16.06818181818182 57.432432432432435 29.840909090909093 50.67567567567568 45.909090909090914 50.67567567567568C61.977272727272734 50.67567567567568 75.75 23.648648648648646 91.81818181818183 23.648648648648646C107.88636363636365 23.648648648648646 121.65909090909093 30.405405405405403 137.72727272727275 30.405405405405403C153.79545454545456 30.405405405405403 167.56818181818184 40.54054054054053 183.63636363636365 40.54054054054053C199.70454545454547 40.54054054054053 213.47727272727275 37.16216216216216 229.54545454545456 37.16216216216216C245.61363636363637 37.16216216216216 259.3863636363637 23.648648648648646 275.4545454545455 23.648648648648646C291.5227272727273 23.648648648648646 305.29545454545456 30.405405405405403 321.3636363636364 30.405405405405403C337.4318181818182 30.405405405405403 351.2045454545455 50.67567567567568 367.2727272727273 50.67567567567568C383.3409090909091 50.67567567567568 397.1136363636364 43.91891891891892 413.1818181818182 43.91891891891892C429.25 43.91891891891892 443.0227272727273 40.54054054054053 459.0909090909091 40.54054054054053C475.15909090909093 40.54054054054053 488.93181818181824 6.756756756756758 505.00000000000006 6.756756756756758C505.00000000000006 6.756756756756758 505.00000000000006 6.756756756756758 505.00000000000006 125M505.00000000000006 6.756756756756758C505.00000000000006 6.756756756756758 505.00000000000006 6.756756756756758 505.00000000000006 6.756756756756758 " fill="url(#SvgjsLinearGradient1078)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskbbpj7pv3)" pathTo="M 0 125L 0 57.432432432432435C 16.06818181818182 57.432432432432435 29.840909090909093 50.67567567567568 45.909090909090914 50.67567567567568C 61.977272727272734 50.67567567567568 75.75 23.648648648648646 91.81818181818183 23.648648648648646C 107.88636363636365 23.648648648648646 121.65909090909093 30.405405405405403 137.72727272727275 30.405405405405403C 153.79545454545456 30.405405405405403 167.56818181818184 40.54054054054053 183.63636363636365 40.54054054054053C 199.70454545454547 40.54054054054053 213.47727272727275 37.16216216216216 229.54545454545456 37.16216216216216C 245.61363636363637 37.16216216216216 259.3863636363637 23.648648648648646 275.4545454545455 23.648648648648646C 291.5227272727273 23.648648648648646 305.29545454545456 30.405405405405403 321.3636363636364 30.405405405405403C 337.4318181818182 30.405405405405403 351.2045454545455 50.67567567567568 367.2727272727273 50.67567567567568C 383.3409090909091 50.67567567567568 397.1136363636364 43.91891891891892 413.1818181818182 43.91891891891892C 429.25 43.91891891891892 443.0227272727273 40.54054054054053 459.0909090909091 40.54054054054053C 475.15909090909093 40.54054054054053 488.93181818181824 6.756756756756758 505.00000000000006 6.756756756756758C 505.00000000000006 6.756756756756758 505.00000000000006 6.756756756756758 505.00000000000006 125M 505.00000000000006 6.756756756756758z" pathFrom="M -1 125L -1 125L 45.909090909090914 125L 91.81818181818183 125L 137.72727272727275 125L 183.63636363636365 125L 229.54545454545456 125L 275.4545454545455 125L 321.3636363636364 125L 367.2727272727273 125L 413.1818181818182 125L 459.0909090909091 125L 505.00000000000006 125"></path><path id="SvgjsPath1083" d="M0 57.432432432432435C16.06818181818182 57.432432432432435 29.840909090909093 50.67567567567568 45.909090909090914 50.67567567567568C61.977272727272734 50.67567567567568 75.75 23.648648648648646 91.81818181818183 23.648648648648646C107.88636363636365 23.648648648648646 121.65909090909093 30.405405405405403 137.72727272727275 30.405405405405403C153.79545454545456 30.405405405405403 167.56818181818184 40.54054054054053 183.63636363636365 40.54054054054053C199.70454545454547 40.54054054054053 213.47727272727275 37.16216216216216 229.54545454545456 37.16216216216216C245.61363636363637 37.16216216216216 259.3863636363637 23.648648648648646 275.4545454545455 23.648648648648646C291.5227272727273 23.648648648648646 305.29545454545456 30.405405405405403 321.3636363636364 30.405405405405403C337.4318181818182 30.405405405405403 351.2045454545455 50.67567567567568 367.2727272727273 50.67567567567568C383.3409090909091 50.67567567567568 397.1136363636364 43.91891891891892 413.1818181818182 43.91891891891892C429.25 43.91891891891892 443.0227272727273 40.54054054054053 459.0909090909091 40.54054054054053C475.15909090909093 40.54054054054053 488.93181818181824 6.756756756756758 505.00000000000006 6.756756756756758C505.00000000000006 6.756756756756758 505.00000000000006 6.756756756756758 505.00000000000006 6.756756756756758 " fill="none" fill-opacity="1" stroke="#f64e60" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskbbpj7pv3)" pathTo="M 0 57.432432432432435C 16.06818181818182 57.432432432432435 29.840909090909093 50.67567567567568 45.909090909090914 50.67567567567568C 61.977272727272734 50.67567567567568 75.75 23.648648648648646 91.81818181818183 23.648648648648646C 107.88636363636365 23.648648648648646 121.65909090909093 30.405405405405403 137.72727272727275 30.405405405405403C 153.79545454545456 30.405405405405403 167.56818181818184 40.54054054054053 183.63636363636365 40.54054054054053C 199.70454545454547 40.54054054054053 213.47727272727275 37.16216216216216 229.54545454545456 37.16216216216216C 245.61363636363637 37.16216216216216 259.3863636363637 23.648648648648646 275.4545454545455 23.648648648648646C 291.5227272727273 23.648648648648646 305.29545454545456 30.405405405405403 321.3636363636364 30.405405405405403C 337.4318181818182 30.405405405405403 351.2045454545455 50.67567567567568 367.2727272727273 50.67567567567568C 383.3409090909091 50.67567567567568 397.1136363636364 43.91891891891892 413.1818181818182 43.91891891891892C 429.25 43.91891891891892 443.0227272727273 40.54054054054053 459.0909090909091 40.54054054054053C 475.15909090909093 40.54054054054053 488.93181818181824 6.756756756756758 505.00000000000006 6.756756756756758" pathFrom="M -1 125L -1 125L 45.909090909090914 125L 91.81818181818183 125L 137.72727272727275 125L 183.63636363636365 125L 229.54545454545456 125L 275.4545454545455 125L 321.3636363636364 125L 367.2727272727273 125L 413.1818181818182 125L 459.0909090909091 125L 505.00000000000006 125"></path><g id="SvgjsG1076" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1120" r="0" cx="229.54545454545456" cy="37.16216216216216" class="apexcharts-marker wya026vtlf no-pointer-events" stroke="#f64e60" fill="#ffe2e5" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1077" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1115" x1="0" y1="0" x2="505" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1116" x1="0" y1="0" x2="505" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1117" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1118" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1119" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1098" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1070" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 62.5px;"></div><div class="apexcharts-tooltip apexcharts-theme-light" style="left: 240.545px; top: 40.1622px;"><div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;">Jun</div><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 226, 229);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Net Profit: </span><span class="apexcharts-tooltip-text-value">$26 thousands</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light" style="left: 207.28px; top: 127px;"><div class="apexcharts-xaxistooltip-text" style="font-family: Poppins; font-size: 12px; min-width: 23.5312px;">Jun</div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
				<div class="flex-grow-1 card-spacer-x">
					<div class="d-flex align-items-center justify-content-between mb-10">
						<div class="d-flex align-items-center mr-2">
							<div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
								<div class="symbol-label">
									<img src="/assets/admin/media/svg/misc/006-plurk.svg" alt="" class="h-50">
								</div>
							</div>
							<div>
								<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top Authors</a>
								<div class="font-size-sm text-muted font-weight-bold mt-1">Ricky Hunt, Sandra Trepp</div>
							</div>
						</div>
						<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+105$</div>
					</div>
					<div class="d-flex align-items-center justify-content-between mb-10">
						<div class="d-flex align-items-center mr-2">
							<div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
								<div class="symbol-label">
									<img src="/assets/admin/media/svg/misc/015-telegram.svg" alt="" class="h-50">
								</div>
							</div>
							<div>
								<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Bestsellers</a>
								<div class="font-size-sm text-muted font-weight-bold mt-1">Pitstop Email Marketing</div>
							</div>
						</div>
						<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+60$</div>
					</div>
					<div class="d-flex align-items-center justify-content-between">
						<div class="d-flex align-items-center mr-2">
							<div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
								<div class="symbol-label">
									<img src="/assets/admin/media/svg/misc/003-puzzle.svg" alt="" class="h-50">
								</div>
							</div>
							<div>
								<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top Engagement</a>
								<div class="font-size-sm text-muted font-weight-bold mt-1">KT.com solution provider</div>
							</div>
						</div>
						<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+75$</div>
					</div>
				</div>
			<div class="resize-triggers"><div class="expand-trigger"><div style="width: 506px; height: 448px;"></div></div><div class="contract-trigger"></div></div></div>
		</div>
	</div>
	<div class="col-xl-8">
		<div class="row">
			<div class="col-xl-3">
				<div class="card card-custom bgi-no-repeat bgi-no-repeat bgi-size-cover gutter-b" style="height: 150px; background-image: url(/assets/admin/media/bg/bg-9.jpg)">
					<div class="card-body d-flex flex-column">
						<a href="#" class="text-dark-75 text-hover-primary font-weight-bolder font-size-h3">Properties</a>
					</div>
				</div>
			</div>
			<div class="col-xl-9">
				<div class="card card-custom gutter-b" style="height: 150px">
					<div class="card-body d-flex align-items-center justify-content-between flex-wrap">
						<div class="mr-2">
							<h3 class="font-weight-bolder">Create CRM Reports</h3>
							<div class="text-dark-50 font-size-lg mt-2">Generate the latest CRM Report</div>
						</div>
						<a href="#" class="btn btn-primary font-weight-bold py-3 px-6">Start Now</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-6">
				<div class="card card-custom bgi-no-repeat gutter-b" style="height: 175px; background-color: #663259; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto; background-image: url(/assets/admin/media/svg/patterns/taieri.svg)">
					<div class="card-body d-flex align-items-center">
						<div>
							<h3 class="text-white font-weight-bolder line-height-lg mb-5">Create SaaS 
							<br>Based Reports</h3>
							<a href="#" class="btn btn-success font-weight-bold px-6 py-3">Create Report</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-6">
						<div class="card card-custom bg-primary gutter-b" style="height: 150px">
							<div class="card-body">
								<span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"></rect>
											<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
											<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
										</g>
									</svg>
								</span>
								<div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">790</div>
								<a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1">New Products</a>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card card-custom gutter-b" style="height: 150px">
							<div class="card-body">
								<span class="svg-icon svg-icon-3x svg-icon-success">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24"></polygon>
											<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
											<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
										</g>
									</svg>
								</span>
								<div class="text-dark font-weight-bolder font-size-h2 mt-3">8,600</div>
								<a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">New Customers</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6">
				<div class="card card-custom bgi-no-repeat bgi-size-cover gutter-b card-stretch" style="background-image: url(/assets/admin/media/stock-600x600/img-16.jpg)">
					<div class="card-body d-flex flex-column align-items-start justify-content-start">
						<div class="p-1 flex-grow-1">
							<h3 class="text-white font-weight-bolder line-height-lg mb-5">Create Reports 
							<br>With App</h3>
						</div>
						<a href="#" class="btn btn-link btn-link-warning font-weight-bold">Create Report 
						<span class="svg-icon svg-icon-lg svg-icon-warning">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24"></polygon>
									<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
									<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
								</g>
							</svg>
						</span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 col-xxl-4">
		<div class="card card-custom bg-radial-gradient-danger gutter-b card-stretch">
			<div class="card-header border-0 py-5">
				<h3 class="card-title font-weight-bolder text-white">Sales Progress</h3>
				<div class="card-toolbar">
					<div class="dropdown dropdown-inline">
						<a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="ki ki-bold-more-hor"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
							<ul class="navi navi-hover">
								<li class="navi-header pb-1">
									<span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="flaticon2-shopping-cart-1"></i>
										</span>
										<span class="navi-text">Order</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="flaticon2-calendar-8"></i>
										</span>
										<span class="navi-text">Event</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="flaticon2-graph-1"></i>
										</span>
										<span class="navi-text">Report</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="navi-text">Post</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="flaticon2-writing"></i>
										</span>
										<span class="navi-text">File</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body d-flex flex-column p-0" style="position: relative;">
				<div id="kt_mixed_widget_6_chart" style="height: 200px; min-height: 200px;"><div id="apexchartsx8k0j3xj" class="apexcharts-canvas apexchartsx8k0j3xj apexcharts-theme-light" style="width: 505px; height: 200px;"><svg id="SvgjsSvg1006" width="505" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1008" class="apexcharts-inner apexcharts-graphical" transform="translate(20, 0)"><defs id="SvgjsDefs1007"><linearGradient id="SvgjsLinearGradient1011" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1012" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop1013" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop1014" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></linearGradient><clipPath id="gridRectMaskx8k0j3xj"><rect id="SvgjsRect1016" width="470" height="201" x="-2.5" y="-0.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskx8k0j3xj"><rect id="SvgjsRect1017" width="469" height="204" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><rect id="SvgjsRect1015" width="9.964285714285715" height="200" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1011)" class="apexcharts-xcrosshairs" y2="200" filter="none" fill-opacity="0.9"></rect><g id="SvgjsG1037" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1038" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1046" class="apexcharts-grid"><g id="SvgjsG1047" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1049" x1="0" y1="0" x2="465" y2="0" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine1050" x1="0" y1="20" x2="465" y2="20" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine1051" x1="0" y1="40" x2="465" y2="40" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine1052" x1="0" y1="60" x2="465" y2="60" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine1053" x1="0" y1="80" x2="465" y2="80" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine1054" x1="0" y1="100" x2="465" y2="100" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine1055" x1="0" y1="120" x2="465" y2="120" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine1056" x1="0" y1="140" x2="465" y2="140" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine1057" x1="0" y1="160" x2="465" y2="160" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine1058" x1="0" y1="180" x2="465" y2="180" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine1059" x1="0" y1="200" x2="465" y2="200" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line></g><g id="SvgjsG1048" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1061" x1="0" y1="200" x2="465" y2="200" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1060" x1="0" y1="1" x2="0" y2="200" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1018" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1019" class="apexcharts-series" rel="1" seriesName="NetxProfit" data:realIndex="0"><path id="SvgjsPath1021" d="M23.25 200L23.25 131.99107142857142C26.238095238095237 129.33630952380952 29.226190476190474 129.33630952380952 32.214285714285715 131.99107142857142L32.214285714285715 131.99107142857142L32.214285714285715 200L32.214285714285715 200C32.214285714285715 200 23.25 200 23.25 200 " fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskx8k0j3xj)" pathTo="M 23.25 200L 23.25 131.99107142857142Q 27.732142857142858 128.00892857142856 32.214285714285715 131.99107142857142L 32.214285714285715 131.99107142857142L 32.214285714285715 200L 32.214285714285715 200z" pathFrom="M 23.25 200L 23.25 200L 32.214285714285715 200L 32.214285714285715 200L 32.214285714285715 200L 23.25 200" cy="130" cx="89.17857142857143" j="0" val="35" barHeight="70" barWidth="9.964285714285715"></path><path id="SvgjsPath1022" d="M89.67857142857143 200L89.67857142857143 71.99107142857144C92.66666666666667 69.33630952380952 95.6547619047619 69.33630952380952 98.64285714285714 71.99107142857144L98.64285714285714 71.99107142857144L98.64285714285714 200L98.64285714285714 200C98.64285714285714 200 89.67857142857143 200 89.67857142857143 200 " fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskx8k0j3xj)" pathTo="M 89.67857142857143 200L 89.67857142857143 71.99107142857143Q 94.16071428571429 68.00892857142857 98.64285714285714 71.99107142857143L 98.64285714285714 71.99107142857143L 98.64285714285714 200L 98.64285714285714 200z" pathFrom="M 89.67857142857143 200L 89.67857142857143 200L 98.64285714285714 200L 98.64285714285714 200L 98.64285714285714 200L 89.67857142857143 200" cy="70" cx="155.60714285714286" j="1" val="65" barHeight="130" barWidth="9.964285714285715"></path><path id="SvgjsPath1023" d="M156.10714285714286 200L156.10714285714286 51.991071428571445C159.0952380952381 49.33630952380952 162.08333333333334 49.33630952380952 165.07142857142858 51.991071428571445L165.07142857142858 51.991071428571445L165.07142857142858 200L165.07142857142858 200C165.07142857142858 200 156.10714285714286 200 156.10714285714286 200 " fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskx8k0j3xj)" pathTo="M 156.10714285714286 200L 156.10714285714286 51.99107142857143Q 160.58928571428572 48.00892857142857 165.07142857142858 51.99107142857143L 165.07142857142858 51.99107142857143L 165.07142857142858 200L 165.07142857142858 200z" pathFrom="M 156.10714285714286 200L 156.10714285714286 200L 165.07142857142858 200L 165.07142857142858 200L 165.07142857142858 200L 156.10714285714286 200" cy="50" cx="222.03571428571428" j="2" val="75" barHeight="150" barWidth="9.964285714285715"></path><path id="SvgjsPath1024" d="M222.53571428571428 200L222.53571428571428 91.99107142857143C225.52380952380952 89.33630952380952 228.51190476190476 89.33630952380952 231.5 91.99107142857143L231.5 91.99107142857143L231.5 200L231.5 200C231.5 200 222.53571428571428 200 222.53571428571428 200 " fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskx8k0j3xj)" pathTo="M 222.53571428571428 200L 222.53571428571428 91.99107142857143Q 227.01785714285714 88.00892857142857 231.5 91.99107142857143L 231.5 91.99107142857143L 231.5 200L 231.5 200z" pathFrom="M 222.53571428571428 200L 222.53571428571428 200L 231.5 200L 231.5 200L 231.5 200L 222.53571428571428 200" cy="90" cx="288.4642857142857" j="3" val="55" barHeight="110" barWidth="9.964285714285715"></path><path id="SvgjsPath1025" d="M288.9642857142857 200L288.9642857142857 111.99107142857143C291.95238095238096 109.33630952380952 294.9404761904762 109.33630952380952 297.92857142857144 111.99107142857143L297.92857142857144 111.99107142857143L297.92857142857144 200L297.92857142857144 200C297.92857142857144 200 288.9642857142857 200 288.9642857142857 200 " fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskx8k0j3xj)" pathTo="M 288.9642857142857 200L 288.9642857142857 111.99107142857143Q 293.44642857142856 108.00892857142857 297.92857142857144 111.99107142857143L 297.92857142857144 111.99107142857143L 297.92857142857144 200L 297.92857142857144 200z" pathFrom="M 288.9642857142857 200L 288.9642857142857 200L 297.92857142857144 200L 297.92857142857144 200L 297.92857142857144 200L 288.9642857142857 200" cy="110" cx="354.89285714285717" j="4" val="45" barHeight="90" barWidth="9.964285714285715"></path><path id="SvgjsPath1026" d="M355.39285714285717 200L355.39285714285717 81.99107142857143C358.3809523809524 79.33630952380952 361.3690476190476 79.33630952380952 364.3571428571429 81.99107142857143L364.3571428571429 81.99107142857143L364.3571428571429 200L364.3571428571429 200C364.3571428571429 200 355.39285714285717 200 355.39285714285717 200 " fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskx8k0j3xj)" pathTo="M 355.39285714285717 200L 355.39285714285717 81.99107142857143Q 359.875 78.00892857142857 364.3571428571429 81.99107142857143L 364.3571428571429 81.99107142857143L 364.3571428571429 200L 364.3571428571429 200z" pathFrom="M 355.39285714285717 200L 355.39285714285717 200L 364.3571428571429 200L 364.3571428571429 200L 364.3571428571429 200L 355.39285714285717 200" cy="80" cx="421.3214285714286" j="5" val="60" barHeight="120" barWidth="9.964285714285715"></path><path id="SvgjsPath1027" d="M421.8214285714286 200L421.8214285714286 91.99107142857143C424.80952380952385 89.33630952380952 427.79761904761904 89.33630952380952 430.78571428571433 91.99107142857143L430.78571428571433 91.99107142857143L430.78571428571433 200L430.78571428571433 200C430.78571428571433 200 421.8214285714286 200 421.8214285714286 200 " fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskx8k0j3xj)" pathTo="M 421.8214285714286 200L 421.8214285714286 91.99107142857143Q 426.30357142857144 88.00892857142857 430.78571428571433 91.99107142857143L 430.78571428571433 91.99107142857143L 430.78571428571433 200L 430.78571428571433 200z" pathFrom="M 421.8214285714286 200L 421.8214285714286 200L 430.78571428571433 200L 430.78571428571433 200L 430.78571428571433 200L 421.8214285714286 200" cy="90" cx="487.75000000000006" j="6" val="55" barHeight="110" barWidth="9.964285714285715"></path></g><g id="SvgjsG1028" class="apexcharts-series" rel="2" seriesName="Revenue" data:realIndex="1"><path id="SvgjsPath1030" d="M33.214285714285715 200L33.214285714285715 121.99107142857143C36.20238095238095 119.33630952380952 39.19047619047619 119.33630952380952 42.17857142857143 121.99107142857143L42.17857142857143 121.99107142857143L42.17857142857143 200L42.17857142857143 200C42.17857142857143 200 33.214285714285715 200 33.214285714285715 200 " fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskx8k0j3xj)" pathTo="M 33.214285714285715 200L 33.214285714285715 121.99107142857143Q 37.69642857142857 118.00892857142857 42.17857142857143 121.99107142857143L 42.17857142857143 121.99107142857143L 42.17857142857143 200L 42.17857142857143 200z" pathFrom="M 33.214285714285715 200L 33.214285714285715 200L 42.17857142857143 200L 42.17857142857143 200L 42.17857142857143 200L 33.214285714285715 200" cy="120" cx="99.14285714285714" j="0" val="40" barHeight="80" barWidth="9.964285714285715"></path><path id="SvgjsPath1031" d="M99.64285714285714 200L99.64285714285714 61.991071428571445C102.63095238095238 59.33630952380952 105.61904761904762 59.33630952380952 108.60714285714286 61.991071428571445L108.60714285714286 61.991071428571445L108.60714285714286 200L108.60714285714286 200C108.60714285714286 200 99.64285714285714 200 99.64285714285714 200 " fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskx8k0j3xj)" pathTo="M 99.64285714285714 200L 99.64285714285714 61.99107142857143Q 104.125 58.00892857142857 108.60714285714286 61.99107142857143L 108.60714285714286 61.99107142857143L 108.60714285714286 200L 108.60714285714286 200z" pathFrom="M 99.64285714285714 200L 99.64285714285714 200L 108.60714285714286 200L 108.60714285714286 200L 108.60714285714286 200L 99.64285714285714 200" cy="60" cx="165.57142857142858" j="1" val="70" barHeight="140" barWidth="9.964285714285715"></path><path id="SvgjsPath1032" d="M166.07142857142858 200L166.07142857142858 41.991071428571445C169.05952380952382 39.33630952380952 172.04761904761907 39.33630952380952 175.0357142857143 41.991071428571445L175.0357142857143 41.991071428571445L175.0357142857143 200L175.0357142857143 200C175.0357142857143 200 166.07142857142858 200 166.07142857142858 200 " fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskx8k0j3xj)" pathTo="M 166.07142857142858 200L 166.07142857142858 41.99107142857143Q 170.55357142857144 38.00892857142857 175.0357142857143 41.99107142857143L 175.0357142857143 41.99107142857143L 175.0357142857143 200L 175.0357142857143 200z" pathFrom="M 166.07142857142858 200L 166.07142857142858 200L 175.0357142857143 200L 175.0357142857143 200L 175.0357142857143 200L 166.07142857142858 200" cy="40" cx="232" j="2" val="80" barHeight="160" barWidth="9.964285714285715"></path><path id="SvgjsPath1033" d="M232.5 200L232.5 81.99107142857143C235.48809523809524 79.33630952380952 238.47619047619048 79.33630952380952 241.46428571428572 81.99107142857143L241.46428571428572 81.99107142857143L241.46428571428572 200L241.46428571428572 200C241.46428571428572 200 232.5 200 232.5 200 " fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskx8k0j3xj)" pathTo="M 232.5 200L 232.5 81.99107142857143Q 236.98214285714286 78.00892857142857 241.46428571428572 81.99107142857143L 241.46428571428572 81.99107142857143L 241.46428571428572 200L 241.46428571428572 200z" pathFrom="M 232.5 200L 232.5 200L 241.46428571428572 200L 241.46428571428572 200L 241.46428571428572 200L 232.5 200" cy="80" cx="298.42857142857144" j="3" val="60" barHeight="120" barWidth="9.964285714285715"></path><path id="SvgjsPath1034" d="M298.92857142857144 200L298.92857142857144 101.99107142857143C301.9166666666667 99.33630952380952 304.9047619047619 99.33630952380952 307.89285714285717 101.99107142857143L307.89285714285717 101.99107142857143L307.89285714285717 200L307.89285714285717 200C307.89285714285717 200 298.92857142857144 200 298.92857142857144 200 " fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskx8k0j3xj)" pathTo="M 298.92857142857144 200L 298.92857142857144 101.99107142857143Q 303.4107142857143 98.00892857142857 307.89285714285717 101.99107142857143L 307.89285714285717 101.99107142857143L 307.89285714285717 200L 307.89285714285717 200z" pathFrom="M 298.92857142857144 200L 298.92857142857144 200L 307.89285714285717 200L 307.89285714285717 200L 307.89285714285717 200L 298.92857142857144 200" cy="100" cx="364.8571428571429" j="4" val="50" barHeight="100" barWidth="9.964285714285715"></path><path id="SvgjsPath1035" d="M365.3571428571429 200L365.3571428571429 71.99107142857144C368.34523809523813 69.33630952380952 371.33333333333337 69.33630952380952 374.3214285714286 71.99107142857144L374.3214285714286 71.99107142857144L374.3214285714286 200L374.3214285714286 200C374.3214285714286 200 365.3571428571429 200 365.3571428571429 200 " fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskx8k0j3xj)" pathTo="M 365.3571428571429 200L 365.3571428571429 71.99107142857143Q 369.8392857142857 68.00892857142857 374.3214285714286 71.99107142857143L 374.3214285714286 71.99107142857143L 374.3214285714286 200L 374.3214285714286 200z" pathFrom="M 365.3571428571429 200L 365.3571428571429 200L 374.3214285714286 200L 374.3214285714286 200L 374.3214285714286 200L 365.3571428571429 200" cy="70" cx="431.28571428571433" j="5" val="65" barHeight="130" barWidth="9.964285714285715"></path><path id="SvgjsPath1036" d="M431.78571428571433 200L431.78571428571433 81.99107142857143C434.7738095238096 79.33630952380952 437.7619047619048 79.33630952380952 440.75000000000006 81.99107142857143L440.75000000000006 81.99107142857143L440.75000000000006 200L440.75000000000006 200C440.75000000000006 200 431.78571428571433 200 431.78571428571433 200 " fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskx8k0j3xj)" pathTo="M 431.78571428571433 200L 431.78571428571433 81.99107142857143Q 436.26785714285717 78.00892857142857 440.75000000000006 81.99107142857143L 440.75000000000006 81.99107142857143L 440.75000000000006 200L 440.75000000000006 200z" pathFrom="M 431.78571428571433 200L 431.78571428571433 200L 440.75000000000006 200L 440.75000000000006 200L 440.75000000000006 200L 431.78571428571433 200" cy="80" cx="497.7142857142858" j="6" val="60" barHeight="120" barWidth="9.964285714285715"></path></g><g id="SvgjsG1020" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG1029" class="apexcharts-datalabels" data:realIndex="1"></g></g><line id="SvgjsLine1062" x1="0" y1="0" x2="465" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1063" x1="0" y1="0" x2="465" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1064" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1065" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1066" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1045" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1009" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 100px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 255, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 255, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
				<div class="card-spacer bg-white card-rounded flex-grow-1">
					<div class="row m-0">
						<div class="col px-8 py-6 mr-8">
							<div class="font-size-sm text-muted font-weight-bold">Average Sale</div>
							<div class="font-size-h4 font-weight-bolder">$650</div>
						</div>
						<div class="col px-8 py-6">
							<div class="font-size-sm text-muted font-weight-bold">Commission</div>
							<div class="font-size-h4 font-weight-bolder">$233,600</div>
						</div>
					</div>
					<div class="row m-0">
						<div class="col px-8 py-6 mr-8">
							<div class="font-size-sm text-muted font-weight-bold">Annual Taxes</div>
							<div class="font-size-h4 font-weight-bolder">$29,004</div>
						</div>
						<div class="col px-8 py-6">
							<div class="font-size-sm text-muted font-weight-bold">Annual Income</div>
							<div class="font-size-h4 font-weight-bolder">$1,480,00</div>
						</div>
					</div>
				</div>
			<div class="resize-triggers"><div class="expand-trigger"><div style="width: 506px; height: 419px;"></div></div><div class="contract-trigger"></div></div></div>
		</div>
	</div>
	<div class="col-lg-6 col-xxl-8">
		<div class="card card-custom card-stretch gutter-b">
			<div class="card-header border-0 py-5">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label font-weight-bolder text-dark">Agents Stats</span>
					<span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
				</h3>
				<div class="card-toolbar">
					<a href="#" class="btn btn-success font-weight-bolder font-size-sm">
					<span class="svg-icon svg-icon-md svg-icon-white">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24"></polygon>
								<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
								<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
							</g>
						</svg>
					</span>Add New Member</a>
				</div>
			</div>
			<div class="card-body py-0">
				<div class="table-responsive">
					<table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
						<thead>
							<tr class="text-left">
								<th class="pl-0" style="width: 20px">
									<label class="checkbox checkbox-lg checkbox-inline">
										<input type="checkbox" value="1">
										<span></span>
									</label>
								</th>
								<th class="pr-0" style="width: 50px">authors</th>
								<th style="min-width: 200px"></th>
								<th style="min-width: 150px">company</th>
								<th style="min-width: 150px">progress</th>
								<th class="pr-0 text-right" style="min-width: 150px">action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="pl-0">
									<label class="checkbox checkbox-lg checkbox-inline">
										<input type="checkbox" value="1">
										<span></span>
									</label>
								</td>
								<td class="pr-0">
									<div class="symbol symbol-50 symbol-light mt-1">
										<span class="symbol-label">
											<img src="/assets/admin/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="">
										</span>
									</div>
								</td>
								<td class="pl-0">
									<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Brad Simmons</a>
									<span class="text-muted font-weight-bold text-muted d-block">HTML, JS, ReactJS</span>
								</td>
								<td>
									<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
									<span class="text-muted font-weight-bold">Web, UI/UX Design</span>
								</td>
								<td>
									<div class="d-flex flex-column w-100 mr-2">
										<div class="d-flex align-items-center justify-content-between mb-2">
											<span class="text-muted mr-2 font-size-sm font-weight-bold">65%</span>
											<span class="text-muted font-size-sm font-weight-bold">Progress</span>
										</div>
										<div class="progress progress-xs w-100">
											<div class="progress-bar bg-danger" role="progressbar" style="width: 65%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</td>
								<td class="pr-0 text-right">
									<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
										<span class="svg-icon svg-icon-md svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
													<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
										</span>
									</a>
									<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
										<span class="svg-icon svg-icon-md svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
													<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
												</g>
											</svg>
										</span>
									</a>
									<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
										<span class="svg-icon svg-icon-md svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
													<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
										</span>
									</a>
								</td>
							</tr>
							<tr>
								<td class="pl-0">
									<label class="checkbox checkbox-lg checkbox-inline">
										<input type="checkbox" value="1">
										<span></span>
									</label>
								</td>
								<td class="pr-0">
									<div class="symbol symbol-50 symbol-light mt-1">
										<span class="symbol-label">
											<img src="/assets/admin/media/svg/avatars/018-girl-9.svg" class="h-75 align-self-end" alt="">
										</span>
									</div>
								</td>
								<td class="pl-0">
									<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Jessie Clarcson</a>
									<span class="text-muted font-weight-bold text-muted d-block">C#, ASP.NET, MS SQL</span>
								</td>
								<td>
									<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Agoda</span>
									<span class="text-muted font-weight-bold">Houses &amp; Hotels</span>
								</td>
								<td>
									<div class="d-flex flex-column w-100 mr-2">
										<div class="d-flex align-items-center justify-content-between mb-2">
											<span class="text-muted mr-2 font-size-sm font-weight-bold">83%</span>
											<span class="text-muted font-size-sm font-weight-bold">Progress</span>
										</div>
										<div class="progress progress-xs w-100">
											<div class="progress-bar bg-success" role="progressbar" style="width: 83%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</td>
								<td class="pr-0 text-right">
									<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
										<span class="svg-icon svg-icon-md svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
													<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
										</span>
									</a>
									<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
										<span class="svg-icon svg-icon-md svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
													<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
												</g>
											</svg>
										</span>
									</a>
									<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
										<span class="svg-icon svg-icon-md svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
													<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
										</span>
									</a>
								</td>
							</tr>
							<tr>
								<td class="pl-0">
									<label class="checkbox checkbox-lg checkbox-inline">
										<input type="checkbox" value="1">
										<span></span>
									</label>
								</td>
								<td class="pr-0">
									<div class="symbol symbol-50 symbol-lightv mt-1">
										<span class="symbol-label">
											<img src="/assets/admin/media/svg/avatars/047-girl-25.svg" class="h-75 align-self-end" alt="">
										</span>
									</div>
								</td>
								<td class="pl-0">
									<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Lebron Wayde</a>
									<span class="text-muted font-weight-bold text-muted d-block">PHP, Laravel, VueJS</span>
								</td>
								<td>
									<span class="text-dark-75 font-weight-bolder d-block font-size-lg">RoadGee</span>
									<span class="text-muted font-weight-bold">Transportation</span>
								</td>
								<td>
									<div class="d-flex flex-column w-100 mr-2">
										<div class="d-flex align-items-center justify-content-between mb-2">
											<span class="text-muted mr-2 font-size-sm font-weight-bold">47%</span>
											<span class="text-muted font-size-sm font-weight-bold">Progress</span>
										</div>
										<div class="progress progress-xs w-100">
											<div class="progress-bar bg-primary" role="progressbar" style="width: 83%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</td>
								<td class="pr-0 text-right">
									<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
										<span class="svg-icon svg-icon-md svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
													<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
										</span>
									</a>
									<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
										<span class="svg-icon svg-icon-md svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
													<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
												</g>
											</svg>
										</span>
									</a>
									<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
										<span class="svg-icon svg-icon-md svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
													<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
										</span>
									</a>
								</td>
							</tr>
							<tr>
								<td class="pl-0">
									<label class="checkbox checkbox-lg checkbox-inline">
										<input type="checkbox" value="1">
										<span></span>
									</label>
								</td>
								<td class="pr-0">
									<div class="symbol symbol-50 symbol-light mt-1">
										<span class="symbol-label">
											<img src="/assets/admin/media/svg/avatars/014-girl-7.svg" class="h-75 align-self-end" alt="">
										</span>
									</div>
								</td>
								<td class="pl-0">
									<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Natali Trump</a>
									<span class="text-muted font-weight-bold text-muted d-block">Python, PostgreSQL, ReactJS</span>
								</td>
								<td>
									<span class="text-dark-75 font-weight-bolder d-block font-size-lg">The Hill</span>
									<span class="text-muted font-weight-bold">Insurance</span>
								</td>
								<td>
									<div class="d-flex flex-column w-100 mr-2">
										<div class="d-flex align-items-center justify-content-between mb-2">
											<span class="text-muted mr-2 font-size-sm font-weight-bold">71%</span>
											<span class="text-muted font-size-sm font-weight-bold">Progress</span>
										</div>
										<div class="progress progress-xs w-100">
											<div class="progress-bar bg-danger" role="progressbar" style="width: 71%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</td>
								<td class="pr-0 text-right">
									<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
										<span class="svg-icon svg-icon-md svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
													<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
										</span>
									</a>
									<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
										<span class="svg-icon svg-icon-md svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
													<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
												</g>
											</svg>
										</span>
									</a>
									<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
										<span class="svg-icon svg-icon-md svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
													<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
										</span>
									</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div> --}}
@endsection

@section('scripts')
{{-- my order js  --}}
{{-- <script src="{{ url('/assets/admin/js/pages/custom/ecommerce/my-orders.js') }}"></script> --}}
{{-- chart js --}}
{{-- <script src="{{ url('/assets/admin/js/pages/features/charts/apexcharts.js') }}"></script> --}}

@endsection