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

    <!-- 手表情况头部 -->
    <div class="watch-case" style="border-bottom: none">
        <div class="media">
            <div class="media-left media-middle">
                <a href="/goods">
                    <img class="media-object" src="/images/left.png" alt="...">
                </a>
            </div>
            <div class="media-body media-middle text-center font-s24"
                 style="margin-top:-34px;padding:8px 0 8px 0;background: white">
                <span class="color-red">1步故障描述 </span>
                <span>-</span>
                <span class="color-three">2步手表情况</span>
                <span>-</span>
                <span class="color-three">3步联系方式</span>
            </div>
        </div>
    </div>
    <!-- 线条 -->
    <div class="watch-border " style="position: fixed;top:50px;z-index:11"></div>
    <!-- 手表情况内容 -->
    <div class="watch-case-cont" style="padding-top:50px;">
        <div class="text-center font-s16 color-six padding-top15">故障描述</div>
        <div class="text-center font-s16 color-ash padding-top15 padding-bot20">腕表当前故障选择，以便快速进入维修</div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list" id="error_movement">
                        <label class="color-six">机芯</label>
                        <span class="" data-id="1"><a href="javascript:;">换电池</a></span>
                        <span class="" data-id="2"><a href="javascript:;">停</a></span>
                        <span data-id="3"><a href="javascript:;">快</a></span>
                        <span class="" data-id="4"><a href="javascript:;">慢</a></span>
                        <span class="" data-id="5"><a href="javascript:;">走走停停</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list" id="error_case">
                        <label class="color-six">表壳</label>
                        <span class="" data-id="1"><a href="javascript:;">翻新</a></span>
                        <span class="" data-id="2"><a href="javascript:;">补钻</a></span>
                        <span class="" data-id="3"><a href="javascript:;">后加钻</a></span>
                        <span class="" data-id="4"><a href="javascript:;">更换</a></span>
                        <span class="" data-id="5"><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list" id="error_bezel">
                        <label class="color-six">表圈</label>
                        <span class="" data-id="1"><a href="javascript:;">翻新</a></span>
                        <span class="" data-id="2"><a href="javascript:;">补钻</a></span>
                        <span class="" data-id="3"><a href="javascript:;">后加钻</a></span>
                        <span class="" data-id="4"><a href="javascript:;">更换</a></span>
                        <span class="" data-id="5"><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list" id="error_cover">
                        <label class="color-six">底盖</label>
                        <span class="" data-id="1"><a href="javascript:;">翻新</a></span>
                        <span class="" data-id="2"><a href="javascript:;">更换</a></span>
                        <span class="" data-id="3"><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list" id="error_bade">
                        <label class="color-six">巴的</label>
                        <span class="" data-id="1"><a href="javascript:;">翻新</a></span>
                        <span class="" data-id="2"><a href="javascript:;">补钻</a></span>
                        <span class="" data-id="3"><a href="javascript:;">更换</a></span>
                        <span class="" data-id="4"><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list" id="error_screws">
                        <label class="color-six">螺丝</label>
                        <span data-id="1"><a href="javascript:;">翻新</a></span>
                        <span class="" data-id="2"><a href="javascript:;">更换</a></span>
                        <span class="" data-id="3"><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list" id="error_glass">
                        <label class="color-six">玻璃</label>
                        <span class="" data-id="1"><a href="javascript:;">更换</a></span>
                        <span class="" data-id="2"><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list" id="error_pin">
                        <label class="color-six">表针</label>
                        <span class="" data-id="1"><a href="javascript:;">更换</a></span>
                        <span class="" data-id="2"><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list" id="error_face">
                        <label class="color-six">字面</label>
                        <span class="" data-id="1"><a href="javascript:;">补钻</a></span>
                        <span data-id="2"><a href="javascript:;">后加钻</a></span>
                        <span class="" data-id="3"><a href="javascript:;">更换</a></span>
                        <span class="" data-id="4"><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list" id="error_band">
                        <label class="color-six">表带</label>
                        <span class="" data-id="1"><a href="javascript:;">翻新</a></span>
                        <span class="" data-id="2"><a href="javascript:;">补钻</a></span>
                        <span class="" data-id="3"><a href="javascript:;">后加钻</a></span>
                        <span class="" data-id="4"><a href="javascript:;">更换</a></span>
                        <span class="" data-id="5"><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15">
                    <div class="padding-top8 watch-case-list" id="error_clasp">
                        <label class="color-six">表扣</label>
                        <span class="" data-id="1"><a href="javascript:;">翻新</a></span>
                        <span class="" data-id="2"><a href="javascript:;">补钻</a></span>
                        <span class="" data-id="3"><a href="javascript:;">后加钻</a></span>
                        <span class="" data-id="4"><a href="javascript:;">更换</a></span>
                        <span class="" data-id="5"><a href="javascript:;">定制</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 padding-top15 ">
                    <div class="padding-top8 watch-case-list" id="error_function">
                        <label class="color-six">功能</label>
                        <span class="" data-id="1"><a href="javascript:;">不防水了</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 padding-top15">
                    <textarea class="ErrorDescription-res" placeholder="其他故障问题补充描述" rows="3" name="error_comment"
                              value="">

                    </textarea>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 padding-top15 ">
                    <div class="padding-top8 watch-case-list">
                        <label class="color-six">取货方式</label>
                        <div id="courier">
                            <span class="" data-id="0"><a href="javascript:;">自取</a></span>
                            <span class="" data-id="1"><a href="javascript:;">顺丰快递</a></span>
                        </div>
                        <input type="text" name="number" placeholder="请填写快递单号" value="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 padding-top15 color-ash">注：维修费用不包含快递及保价....</div>
                <div class="col-xs-12 col-sm-12 col-md-12 watch-btn-next text-center padding-top30 padding-bot45">
                    <a href="javascript:;" id="errorSubmit">下一步</a>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('page_js')

@endsection