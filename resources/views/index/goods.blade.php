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
    <div class="watch-banner hidden-xs">
        <img src="images/banner.png">
        <div class="watch-banner-spirit">工匠精神 极致服务</div>
        <div class="watch-banner-repair">腕表维修 品质配件 直营保障 一年质保</div>
    </div>
    <!-- 专业团队 -->
    <div class="watch-team padding-mdLR0 hidden-xs">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/icon.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">专业团队</div>
                    <div class="color-ash">原厂品质高级维修</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/qc.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">质检标准</div>
                    <div class="color-ash">杜绝任何遗漏故障</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/character.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">品质配件</div>
                    <div class="color-ash">高品质配件严格检验</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/quality.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">一年质保</div>
                    <div class="color-ash">原故障免费360天</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/priceTransparency.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">价格透明</div>
                    <div class="color-ash">维修费用公示</div>
                </div>
            </div>
        </div>
    </div>
    <!-- 线条 -->
    <div class="watch-border hidden-xs"></div>
    <!-- 手表情况头部 -->
    <div class="watch-case">
        <div class="media">
            <div class="media-left media-middle">
                <a href="/">
                    <img class="media-object" src="images/left.png" alt="...">
                </a>
            </div>
            <div class="media-body media-middle text-center font-s24">
                <span class="color-red">1步手表情况 </span>
                <span>-</span>
                <span class="color-three">2步故障描述</span>
                <span>-</span>
                <span class="color-three">3步联系方式</span>
            </div>
        </div>
    </div>
    <!-- 线条 -->
    <div class="watch-border hidden-xs"></div>
    <!-- 手表情况内容 -->
    <div class="watch-case-cont">
        <div class="text-center font-s16 color-six padding-top15">手表状况</div>
        <div class="text-center font-s16 color-ash padding-top15 padding-lr15">您的腕表当前基本情况选择以便我们为您的腕表建立初步电子档案</div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="padding-top30 color-six">机芯</div>
                    <div class="padding-top8 watch-case-list">
                        <span><a href="javascript:;">石英机芯</a></span>
                        <span><a href="javascript:;">机械机芯</a></span>
                        <span><a href="javascript:;">多功能机芯</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="padding-top30 color-six">表壳</div>
                    <div class="padding-top8 watch-case-list">
                        <span><a href="javascript:;">不锈钢</a></span>
                        <span><a href="javascript:;">18K金</a></span>
                        <span><a href="javascript:;">千足金</a></span>
                        <span><a href="javascript:;">钻石</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="padding-top30 color-six">字面</div>
                    <div class="padding-top8 watch-case-list">
                        <span><a href="javascript:;">普通字面</a></span>
                        <span><a href="javascript:;">时位钻字面</a></span>
                        <span><a href="javascript:;">满天星字面</a></span>
                        <span><a href="javascript:;">多功能字面</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="padding-top30">表带</div>
                    <div class="padding-top8 watch-case-list">
                        <span><a href="javascript:;">牛皮</a></span>
                        <span><a href="javascript:;">鳄鱼皮</a></span>
                        <span><a href="javascript:;">不锈钢</a></span>
                        <span><a href="javascript:;">18K金</a></span>
                        <span><a href="javascript:;">千足金</a></span>
                        <span><a href="javascript:;">钻石</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="padding-top30 color-six">表扣</div>
                    <div class="padding-top8 watch-case-list">
                        <span><a href="javascript:;">不锈钢</a></span>
                        <span><a href="javascript:;">18K金</a></span>
                        <span><a href="javascript:;">钻石</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="padding-top30"><span class="color-six">重量</span><span class="color-ash">（总重）</span></div>
                    <div class="padding-top15 wacth-weight"><input type="text" name="">克</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="padding-top30"><span class="color-six">照片</span><span class="color-ash">（如有需要，拍照留底确认。正面，反面，左侧，右侧及部份需特写拍照。）</span></div>
                    <div class="row padding-top15 wacth-up-photo">
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <img src="images/photo.png">
                            <div class="wacth-up-text padding-top8 padding-bot15 color-six">正面</div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <img src="images/photo.png">
                            <div class="wacth-up-text padding-top8 padding-bot15 color-six">反面</div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <img src="images/photo.png">
                            <div class="wacth-up-text padding-top8 padding-bot15 color-six">左侧</div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <img src="images/photo.png">
                            <div class="wacth-up-text padding-top8 padding-bot15 color-six">右侧</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="padding-top30 color-six">备注</div>
                    <div class="padding-top15 wacth-remarks"><input type="text" name="" placeholder="您可以简单描述手表当前情况说明或注意事项"></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 watch-btn-next text-center padding-top30 padding-bot45">
                    <a href="/error">下一步</a>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('page_js')

@endsection