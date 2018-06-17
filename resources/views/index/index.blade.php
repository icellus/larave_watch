@extends('layout.base')

@section('title','test')


@section('page_css')

	{{--<style type="text/css">
		@media (max-width: 768px){
			body{
				font-family:PingFangSC-Light,helvetica neue,hiragino sans gb,arial,microsoft yahei ui,microsoft yahei,simsun,sans-serif;
				font-size: 14px;
				padding-bottom: 80px;
				padding-top: 50px;
			}
		}
	</style>--}}
@endsection


@section('content')
	<!-- banner -->
	<div class="watch-banner">
		<img src="/images/banner.png">
		<div class="watch-banner-spirit">工匠精神 极致服务</div>
		<div class="watch-banner-repair">腕表维修 品质配件 直营保障 一年质保</div>
	</div>
	<!-- 专业团队 -->
	<div class="watch-team padding-mdLR0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
					<img src="/images/icon.png" alt="..." class="img-responsive">
					<div class="font-s16 color-three">专业团队</div>
					<div class="color-ash">原厂品质高级维修</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
					<img src="/images/qc.png" alt="..." class="img-responsive">
					<div class="font-s16 color-three">质检标准</div>
					<div class="color-ash">杜绝任何遗漏故障</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
					<img src="/images/character.png" alt="..." class="img-responsive">
					<div class="font-s16 color-three">品质配件</div>
					<div class="color-ash">高品质配件严格检验</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
					<img src="/images/quality.png" alt="..." class="img-responsive">
					<div class="font-s16 color-three">一年质保</div>
					<div class="color-ash">原故障免费360天</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
					<img src="/images/priceTransparency.png" alt="..." class="img-responsive">
					<div class="font-s16 color-three">价格透明</div>
					<div class="color-ash">维修费用公示</div>
				</div>
			</div>
		</div>
	</div>



	<!-- 线条 -->
	<div class="watch-border"></div>


	@include('layout.reserve')

	<!-- 线条 -->
	<div class="watch-border"></div>


	<!-- 服务项目 -->
	<div class="watch-Services">
		<div class="text-center padding-bot45 font-s16 color-six">高级腕表 服务项目</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-3 text-center color-ash">
					<img src="/images/CleaningM.png">
					<div class="color-six">清洗保养</div>
					<div class="padding-top15">
						<span>定期保养</span>
						<span>手表进水</span>
					</div>
					<div>
						<span>走时误差</span>
						<span>剧烈磕碰</span>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3 text-center color-ash">
					<img src="/images/replacementPart.png">
					<div class="color-six">更换零件</div>
					<div  class="padding-top15">
						<span>表带、表节、表壳、后盖</span>
					</div>
					<div>
						<span>电池、表蒙、表把、表扣</span>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3 text-center color-ash">
					<img src="/images/Watchrefurbished.png">
					<div class="color-six">手表翻新</div>
					<div class="padding-top15">
						<span>清洗外观</span>
						<span>抛光翻新</span>
					</div>
					<div>
						<span>划痕处理</span>
						<span>整形修复</span>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3 text-center color-ash">
					<img src="/images/Whenthefault.png">
					<div class="color-six">走时故障</div>
					<div class="padding-top15">
						<span>手表走快</span>
						<span>手表走慢</span>
					</div>
					<div>
						<span>腕表不走</span>
						<span>腕表走停</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 维修流程 -->
	<div class="watch-process">
		<div class="text-center padding-bot30 font-s16 color-six">维修流程</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-10 watch-process-border col-md-offset-1 padding-mdLR0">
					<div class="col-xs-2 col-sm-3 col-md-3 process-reset-width20">
						<div class="media">
							<div class="media-left media-middle">
								<img class="media-object" src="/images/work.png" alt="...">
							</div>
							<div class="media-body media-middle color-ash">提交</div>
						</div>
					</div>
					<div class="col-xs-2 col-sm-3 col-md-3 process-reset-width20">
						<div class="media">
							<div class="media-left media-middle">
								<img class="media-object" src="/images/expressage.png" alt="...">
							</div>
							<div class="media-body media-middle color-ash">邮寄</div>
						</div>
					</div>
					<div class="col-xs-2 col-sm-3 col-md-3 process-reset-width20">
						<div class="media">
							<div class="media-left media-middle">
								<img class="media-object" src="/images/maintain.png" alt="...">
							</div>
							<div class="media-body media-middle color-ash">检测</div>
						</div>
					</div>
					<div class="col-xs-2 col-sm-3 col-md-3 process-reset-width20">
						<div class="media">
							<div class="media-left media-middle">
								<img class="media-object" src="/images/pay.png" alt="...">
							</div>
							<div class="media-body media-middle color-ash">支付</div>
						</div>
					</div>
					<div class="col-xs-2 col-sm-3 col-md-3 process-reset-width20">
						<div class="media">
							<div class="media-left media-middle">
								<img class="media-object" src="/images/wacth.png" alt="...">
							</div>
							<div class="media-body media-middle color-ash">回寄</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="watch-btn text-center">
			<a href="/goods">点击提交维修工单</a>
		</div>
	</div>
	<!-- 线条 -->
	<div class="watch-border"></div>
	<!-- 客户须知 -->
	<div class="watch-BuyerReading">
		<div class="font-s16 padding-bot15 color-three">客户须知</div>
		<div class="font-s14 color-ash padding-bot15">您的维修订单我们非常重视，以下客户须知将了解维修及售后服务</div>
		<div class="font-s14 color-green padding-bot15">1、客户提交订单，未确认维修前可以取消或更改。凭此订单已付清应付款后取表</div>
		<div class="font-s14 color-green padding-bot15">2、客户超过十二个月 (从取表日期起) 未将维修手表取走，本公司有权对其自行处置。</div>
		<div class="font-s14 color-green padding-bot15">3、以下不属免费保修范围：皮表带及表面的正常磨损与人为损坏、在博士豪以外维修点损坏、已过免费保修期</div>
	</div>

@endsection


