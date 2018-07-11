<!-- 底部菜单 -->
<div class="container footer-nav">
    <div class="row  text-center">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <a href="/index">
                @if(strpos(Request::getUri(),'/index') !== false)
                    <img src="/images/Wristwatch2.png">
                @else
                    <img src="/images/Wristwatch.png">
                @endif
                <div class="
                     @if(strpos(Request::getUri(),'/index') !== false)
                        new-footer-item
@endif">腕表维修
                </div>
            </a>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 text-center">
            <a href="/charge">
                @if(strpos(Request::getUri(),'/charge') !== false)
                    <img src="/images/rates2.png">
                @else
                    <img src="/images/rates.png">
                @endif

                <div class=" @if(strpos(Request::getUri(),'/charge') !== false)
                        new-footer-item
@endif">收费标准
                </div>
            </a>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 text-center">
            <a href="/order">
                @if(strpos(Request::getUri(),'/order') !== false)
                    <img src="/images/guySingle2.png">
                @else
                    <img src="/images/guySingle.png">
                @endif
                <div class="@if(strpos(Request::getUri(),'/order') !== false)
                        new-footer-item
@endif">维修工单
                </div>
            </a>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 text-center right-menu padding-0">
            <a href="/user">
                @if(strpos(Request::getUri(),'/user') !== false)
                    <img src="/images/customer2.png">
                @else
                    <img src="/images/customer.png">
                @endif
                <div class=" @if(strpos(Request::getUri(),'/user') !== false)
                        new-footer-item
@endif">客户中心
                </div>
            </a>
        </div>
    </div>
</div>
