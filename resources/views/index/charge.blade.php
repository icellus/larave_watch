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
    <!-- nav -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="row nav-top">
                <ul class="list-inline">
                    <li><a href="#">腕表服务项目及维修标准</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav -->
    <div class="container">
        <div class="row text-center">
            <p>高级腕表 服务项目</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- ser -->
            <div class="col-xs-6 col-sm-6 col-md-3 text-center color-ash">
                <img src="images/CleaningM.png">
                <div class="color-six">清洗保养</div>
                <div>定期保养 手表进水</div>
                <div>走时误差 剧烈磕碰</div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3 text-center color-ash">
                <img src="images/replacementPart.png">
                <div class="color-six">更换零件</div>
                <div>表带、表节、表壳、后盖</div>
                <div>电池、表蒙、表把、表扣</div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3 text-center color-ash">
                <img src="images/Watchrefurbished.png">
                <div class="color-six">手表翻新</div>
                <div>清洗外观 抛光翻新</div>
                <div>划痕处理 整形修复</div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3 text-center color-ash">
                <img src="images/Whenthefault.png">
                <div class="color-six">走时故障</div>
                <div>手表走快 手表走慢</div>
                <div>腕表不走 腕表走停</div>
            </div>
            <!-- ser -->
        </div>
    </div>

    <div class="container">
        <div class="row standard text-center">
            <p>博士豪金钻表维修标准</p>
            <p>本标准由2013年01月14日开始执行,最终解释权归博士豪所有。</p>
        </div>

        <div class="row">
            <!-- 价格表 -->
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>项目</th>
                    <th>维修明细</th>
                    <th>非原装手表</th>
                    <th>原装手表</th>
                    <th>维修周期(工作日)</th>
                    <th>备注</th>
                </tr>
                </thead>
                <!-- 翻新 -->
                <tbody>
                <tr>
                    <th rowspan="5">翻新</th>
                    <td>钢带连扣</td>
                    <td>500</td>
                    <td>1000</td>
                    <td>5天</td>
                    <th rowspan="5">加急：<br>24小时内<br>维修完毕。<br>加收￥200<br>加急</th>
                </tr>
                <tr>
                    <td>钢皮带表</td>
                    <td>500</td>
                    <td>1000</td>
                    <td>5天</td>
                </tr>
                <tr>
                    <td>钢钢带表</td>
                    <td>800</td>
                    <td>1600</td>
                    <td>5天</td>
                </tr>
                <tr>
                    <td>18K金皮带表</td>
                    <td>500</td>
                    <td>1000</td>
                    <td>5天</td>
                </tr>
                <tr>
                    <td>18K金金带表</td>
                    <td>1000</td>
                    <td>2000</td>
                    <td>5天</td>
                </tr>
                </tbody>
                <!-- 更换 -->
                <tbody>
                <tr>
                    <th rowspan="12">更换</th>
                    <td>电池</td>
                    <td>100</td>
                    <td>300</td>
                    <td>3天</td>
                    <td></td>
                </tr>
                <tr>
                    <td>钢巴的</td>
                    <td>100</td>
                    <td>200</td>
                    <td>3天</td>
                    <td>特殊巴的<br>费用另报</td>
                </tr>
                <tr>
                    <td>18K金巴的</td>
                    <td>600</td>
                    <td>1200</td>
                    <td>3天</td>
                    <td>特殊巴的<br>费用另报</td>
                </tr>
                <tr>
                    <td>钢螺丝</td>
                    <td>20</td>
                    <td>40</td>
                    <td>3天</td>
                    <td></td>
                </tr>
                <tr>
                    <td>18K金螺丝</td>
                    <td>100</td>
                    <td>200</td>
                    <td>3天</td>
                    <td></td>
                </tr>
                <tr>
                    <td>普通平面玻璃</td>
                    <td>150</td>
                    <td>300</td>
                    <td>5天</td>
                    <td>蓝宝石玻璃</td>
                </tr>
                <tr>
                    <td>异型拱形玻璃</td>
                    <td>380</td>
                    <td>760</td>
                    <td>3天</td>
                    <td>蓝宝石玻璃</td>
                </tr>
                <tr>
                    <td>普通表针</td>
                    <td>50</td>
                    <td>100</td>
                    <td>3天</td>
                    <td></td>
                </tr>
                <tr>
                    <td>高级钢兰针</td>
                    <td>150</td>
                    <td>300</td>
                    <td>3天</td>
                    <td></td>
                </tr>
                <tr>
                    <td>普通印刷面</td>
                    <td>200</td>
                    <td>400</td>
                    <td>3天</td>
                    <td>字面</td>
                </tr>
                <tr>
                    <td>普通表带</td>
                    <td>300</td>
                    <td>600</td>
                    <td>3天</td>
                    <td>普通表带<br>包括<br>牛皮带,<br>沙丁纹带,<br>帆布带,<br>胶带等<br>价格较便宜<br>的带</td>
                </tr>
                <tr>
                    <td>鳄鱼皮表带</td>
                    <td>800</td>
                    <td>1600</td>
                    <td>3天</td>
                    <td></td>
                </tr>
                </tbody>
                <!-- 更换 -->
                <!-- 定制 -->
                <tbody>
                <tr>
                    <th rowspan="12">定制</th>
                    <td>钢巴的</td>
                    <td></td>
                    <td>200</td>
                    <td>15天</td>
                    <td>特殊巴的<br>费用另报</td>
                </tr>
                <tr>
                    <td>18K金巴的</td>
                    <td></td>
                    <td>1500</td>
                    <td>15天</td>
                    <td>特殊巴的<br>费用另报</td>
                </tr>
                <tr>
                    <td>钢螺丝</td>
                    <td></td>
                    <td>50</td>
                    <td>15天</td>
                    <td>螺丝</td>
                </tr>

                <tr>
                    <td>18K金螺丝</td>
                    <td></td>
                    <td>200</td>
                    <td>15天</td>
                    <td>螺丝</td>
                </tr>
                <tr>
                    <td>普通平面玻璃</td>
                    <td></td>
                    <td>300</td>
                    <td>15天</td>
                    <td>蓝宝石玻璃</td>
                </tr>
                <tr>
                    <td>异型拱形玻璃</td>
                    <td></td>
                    <td>800</td>
                    <td>15天</td>
                    <td>蓝宝石玻璃</td>
                </tr>
                <tr>
                    <td>高级钢兰针</td>
                    <td></td>
                    <td>2500</td>
                    <td>20天</td>
                    <td>表针</td>
                </tr>
                <tr>
                    <td>普通印刷面</td>
                    <td></td>
                    <td>500</td>
                    <td>25天</td>
                    <td>字面</td>
                </tr>
                <tr>
                    <td>普通鳄鱼皮表带</td>
                    <td></td>
                    <td>1500</td>
                    <td>15天</td>
                    <td>图纸模具<br>费用已包含</td>
                </tr>
                <tr>
                    <td>特殊鳄鱼皮表带</td>
                    <td></td>
                    <td>2500</td>
                    <td>30天</td>
                    <td>图纸模具<br>费用已包含</td>
                </tr>
                <tr>
                    <td>补钻</td>
                    <td></td>
                    <td>50</td>
                    <td>5天</td>
                    <td>单粒工费<br>钻石费用另计</td>
                </tr>
                <tr>
                    <td>后加钻</td>
                    <td></td>
                    <td>2500</td>
                    <td>30天</td>
                    <td>一个表圈<br>为例的工费<br>钻石费用另计</td>
                </tr>
                </tbody>
                <!-- 定制 -->
                <!-- 机芯 -->
                <tbody>
                <tr>
                    <th rowspan="4">机械机芯</th>
                    <td>正常维修/不防水</td>
                    <td>200</td>
                    <td>500</td>
                    <td>10天</td>
                    <th rowspan="4">损耗配件<br>费用另计</th>
                </tr>
                <tr>
                    <td>正常维修/快/慢</td>
                    <td>200</td>
                    <td>500</td>
                    <td>10天</td>
                </tr>
                <tr>
                    <td>维修保养/停/走走停停</td>
                    <td>1000</td>
                    <td>1500</td>
                    <td>10天</td>
                </tr>
                <tr>
                    <td>维修保养/洗油</td>
                    <td>1000</td>
                    <td>1500</td>
                    <td>10天</td>
                </tr>

                </tbody>
                <!-- 机芯 -->
            </table>
            <!-- 价格表 -->
        </div>
    </div>




    <div class="container">
        <div class="row down">
        </div>
    </div>

@endsection




@section('page_js')
    <script src="js/bootstrap-table.js"></script>
@endsection