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
                <a href="WatchCase.html">
                    <img class="media-object" src="images/left.png" alt="...">
                </a>
            </div>
            <div class="media-body media-middle text-center font-s24">
                <span class="color-three">1步手表情况 </span>
                <span>-</span>
                <span class="color-red">2步故障描述</span>
                <span>-</span>
                <span class="color-three">3步联系方式</span>
            </div>
        </div>
    </div>
    <!-- 线条 -->
    <div class="watch-border hidden-xs"></div>
    <!-- 手表情况内容 -->
    <div class="watch-case-cont">
        <div class="text-center font-s16 color-six padding-top15">故障描述</div>
        <div class="text-center font-s16 color-ash padding-top15 padding-bot45">腕表当前故障选择，以便快速进入维修</div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list">
                        <label class="color-six">机芯</label>
                        <span><a href="javascript:;">换电池</a></span>
                        <span><a href="javascript:;">停</a></span>
                        <span><a href="javascript:;">快</a></span>
                        <span><a href="javascript:;">慢</a></span>
                        <span><a href="javascript:;">走走停停</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list">
                        <label class="color-six">表壳</label>
                        <span><a href="javascript:;">翻新</a></span>
                        <span><a href="javascript:;">补钻</a></span>
                        <span><a href="javascript:;">后加钻</a></span>
                        <span><a href="javascript:;">更换</a></span>
                        <span><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list">
                        <label class="color-six">表圈</label>
                        <span><a href="javascript:;">翻新</a></span>
                        <span><a href="javascript:;">补钻</a></span>
                        <span><a href="javascript:;">后加钻</a></span>
                        <span><a href="javascript:;">更换</a></span>
                        <span><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list">
                        <label class="color-six">底盖</label>
                        <span><a href="javascript:;">翻新</a></span>
                        <span><a href="javascript:;">更换</a></span>
                        <span><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list">
                        <label class="color-six">巴的</label>
                        <span><a href="javascript:;">翻新</a></span>
                        <span><a href="javascript:;">补钻</a></span>
                        <span><a href="javascript:;">更换</a></span>
                        <span><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list">
                        <label class="color-six">螺丝</label>
                        <span><a href="javascript:;">翻新</a></span>
                        <span><a href="javascript:;">更换</a></span>
                        <span><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list">
                        <label class="color-six">玻璃</label>
                        <span><a href="javascript:;">更换</a></span>
                        <span><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list">
                        <label class="color-six">表针</label>
                        <span><a href="javascript:;">更换</a></span>
                        <span><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list">
                        <label class="color-six">字面</label>
                        <span><a href="javascript:;">补钻</a></span>
                        <span><a href="javascript:;">后加钻</a></span>
                        <span><a href="javascript:;">更换</a></span>
                        <span><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list">
                        <label class="color-six">表带</label>
                        <span><a href="javascript:;">翻新</a></span>
                        <span><a href="javascript:;">补钻</a></span>
                        <span><a href="javascript:;">后加钻</a></span>
                        <span><a href="javascript:;">更换</a></span>
                        <span><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list">
                        <label class="color-six">表扣</label>
                        <span><a href="javascript:;">翻新</a></span>
                        <span><a href="javascript:;">补钻</a></span>
                        <span><a href="javascript:;">后加钻</a></span>
                        <span><a href="javascript:;">更换</a></span>
                        <span><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15 ">
                    <div class="padding-top8 watch-case-list">
                        <label class="color-six">功能</label>
                        <span class=""><a href="javascript:;">不防水了</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 padding-top15">
                    <textarea class="ErrorDescription-res" placeholder="其他故障问题补充描述" rows="3"></textarea>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 padding-top15 ">
                    <div class="padding-top8 watch-case-list">
                        <label class="color-six">取货方式</label>
                        <span><a href="javascript:;">自取</a></span>
                        <span class=""><a href="javascript:;">顺丰快递</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 padding-top15 color-ash">注：维修费用不包含快递及保价....</div>
                <div class="col-xs-12 col-sm-12 col-md-12 watch-btn-next text-center padding-top30 padding-bot45">
                    <a href="/contact">下一步</a>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('page_js')

@endsection