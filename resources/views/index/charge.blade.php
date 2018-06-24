@extends('layout.base')

@section('title','test')


@section('page_css')

    <link rel="stylesheet" type="text/css" href="css/bootstrap-table.css">
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


    <!-- 极速预约 -->
    @include('layout.reserve')


    <!-- 线条 -->
    <div class="watch-border"></div>
    <!-- 维修标准 -->
    <div class="watch-RepairStandards">
        <div class="text-center color-three">博士豪金钻表维修标准 </div>
        <div class="text-center color-six padding-bot15 padding-lr15">本标准由2013年01月14日开始执行,最终解释权归博士豪所有。</div>
        <!-- 表格 -->
        <div class="RepairStandards-table">
            <table data-toggle="table">
                <thead>
                <tr>
                    <th class="text-center">项目</th>
                    <th>维修明细</th>
                    <th>非原装手表</th>
                    <th>原装手表</th>
                    <th>维修周期</th>
                    <th>备注</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td rowspan="2" class="bg-ddd boder-bot-ccc color-black text-center">翻新</td>
                    <td>Item 1</td>
                    <td>$1</td>
                    <td>Item 1</td>
                    <td>$1</td>
                    <td rowspan="2">备注1111111111111111</td>
                </tr>
                <tr>
                    <td>更换</td>
                    <td>Item 2</td>
                    <td>$2</td>
                    <td>Item 2</td>
                </tr>


                <tr>
                    <td rowspan="2" class="bg-ddd boder-bot-ccc color-black  text-center">更换</td>
                    <td>Item 1</td>
                    <td>$1</td>
                    <td>Item 1</td>
                    <td>$1</td>
                    <td rowspan="2">备注1111111111111111</td>
                </tr>
                <tr>
                    <td>更换</td>
                    <td>Item 2</td>
                    <td>$2</td>
                    <td>Item 2</td>
                </tr>
                <tr>
                    <td rowspan="2" class="bg-ddd boder-bot-ccc color-black text-center">定制</td>
                    <td>Item 1</td>
                    <td>$1</td>
                    <td>Item 1</td>
                    <td>$1</td>
                    <td rowspan="2">备注1111111111111111</td>
                </tr>
                <tr>
                    <td>更换</td>
                    <td>Item 2</td>
                    <td>$2</td>
                    <td>Item 2</td>
                </tr>
                <tr>
                    <td rowspan="2" class="bg-ddd boder-bot-ccc color-black text-center">补钻后加钻</td>
                    <td>Item 1</td>
                    <td>$1</td>
                    <td>Item 1</td>
                    <td>$1</td>
                    <td rowspan="2">备注1111111111111111</td>
                </tr>
                <tr>
                    <td>更换</td>
                    <td>Item 2</td>
                    <td>$2</td>
                    <td>Item 2</td>
                </tr>
                <tr>
                    <td rowspan="2" class="bg-ddd boder-bot-ccc color-black text-center">机械机芯</td>
                    <td>Item 1</td>
                    <td>$1</td>
                    <td>Item 1</td>
                    <td>$1</td>
                    <td rowspan="2">备注1111111111111111</td>
                </tr>
                <tr>
                    <td>更换</td>
                    <td>Item 2</td>
                    <td>$2</td>
                    <td>Item 2</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection




@section('page_js')
    <script src="js/bootstrap-table.js"></script>
@endsection