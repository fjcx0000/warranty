<script id="waitshoesprocess-template" type="text/template">
    <div class="row clearfix form-inline" style="border:1px solid #a1a1a1 ;margin:10px 2px; padding:10px 2px;border-radius: 5px">
        <div class="col-sm-6 column form-group">
            <label for="input-goodsno" class="control-label col-sm-2 text-right">货号</label>
            <div class="col-sm-8" >
                <input type="text" class="form-control input-sm" id="input-goodsno">
            </div>
            <div class="col-sm-2" >
                <button type="button" class="btn btn-info btn-sm" id="btn-goodsnoremove">
                    <span class="glyphicon glyphicon-remove">重置</span>
                </button>
            </div>
        </div>
        <div class="col-sm-3 column form-group">
            <label for="input-color" class="control-lable col-sm-4 text-right">颜色</label>
            <div class="col-sm-8">
                <select name="input-color" id="input-color">
                </select>
            </div>
        </div>
        <div class="col-sm-3 column form-group">
            <label for="input-size" class="control-label col-sm-4 text-right">尺码</label>
            <div class="col-sm-8">
                <select name="input-size" id="input-size">
                </select>
            </div>
        </div>
        <input type="hidden" name="sku" id="sku">
    </div>
    <div class="row clearfix form-inline" style="border:1px solid #a1a1a1 ;margin:10px 2px; padding:10px 2px;border-radius: 5px">
        <div class="col-sm-6 form-group">
            <label for="input-issueCode" class="control-label col-sm-4 text-right">服务原因</label>
            <div class="col-sm-8">
                <select name="input-issueCode" id="input-issueCode">
                    <option value="F001">产品质量问题</option>
                    <option value="O001">厂商发错货</option>
                    <option value="T001">客户原因退换货</option>
                </select>
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label for="input-supplier" class="control-label col-sm-4 text-right">生产工厂</label>
            <div class="col-sm-8">
                <select name="input-supplier" id="input-supplier">
                </select>
            </div>
        </div>
    </div>
    <div class="row clearfix form-inline" style="border:1px solid #a1a1a1 ;margin:10px 2px; padding:10px 2px;border-radius: 5px">
        <div class="col-sm-3 form-group">
            <label for="input-serviceType" class="control-label text-right">处理方式&nbsp;&nbsp;</label>
            <input type="radio" name="input-serviceType" id="input-serviceType" value="X" checked> 维修
            <input type="radio" name="input-serviceType" id="input-serviceType" value="H" > 更换
            <input type="radio" name="input-serviceType" id="input-serviceType" value="T" > 退货
        </div>
        <div class="col-sm-3 form-group">
            <label for="input-restockFlag" class="control-label text-right">是否回库&nbsp;&nbsp;</label>
            <input type="radio" name="input-restockFlag" id="input-restockFlag" value="false" checked> 不能
            <input type="radio" name="input-restockFlag" id="input-restockFlag" value="true" > 能
        </div>
        <div class="form-group col-sm-6">
            <label for="input-remark" class="col-sm-3 control-label text-right">处理备注</label>
            <div class="col-sm-9">
                <textarea class="form-control input-sm" rows="3" name="input-remark" id="input-remark"></textarea>
            </div>
        </div>
    </div>
    <div class="row clearfix form-inline" id="carrierinfo" style="border:1px solid #a1a1a1 ;margin:10px 2px; padding:10px 2px;border-radius: 5px">
        <div class="col-sm-4 column form-group">
            <label for="input-carrierName" class="control-label col-sm-4 text-right">快递公司</label>
            <div class="col-sm-8">
                <input type="text" class="form-control input-sm" id="input-carrierName">
            </div>
        </div>
        <div class="col-sm-4 column form-group">
            <label for="input-trackNumber" class="control-label col-sm-4 text-right">快递单号</label>
            <div class="col-sm-8">
                <input type="text" class="form-control input-sm" id="input-trackNumber">
            </div>
        </div>
        <div class="col-sm-4 column form-group">
            <label for="input-fee" class="control-label col-sm-4 text-right">快递费用</label>
            <div class="col-sm-8">
                <input type="number" class="form-control input-sm" id="input-fee">
            </div>
        </div>
    </div>
    <div class="row clearfix form-inline" id="repairinfo" style="border:1px solid #a1a1a1 ;margin:10px 2px; padding:10px 2px;border-radius: 5px">
        <div class="col-sm-6 column form-group">
            <label for="input-sendDate" class="control-label col-sm-4 text-right">提交工厂维修日期</label>
            <div class="col-sm-8">
                <input type="text" class="form-control input-sm" id="input-sendDate" name="input-sendDate"/>
            </div>
        </div>
        <div class="col-sm-6 column form-group">
            <label for="input-expectDate" class="control-label col-sm-4 text-right">预期工厂返还日期</label>
            <div class="col-sm-8">
                <input type="text" class="form-control input-sm" id="input-expectDate" name="input-expectDate"/>
            </div>
        </div>
    </div>
    <div class="row clearfix form-inlinen hidden" id="exchangeinfo" style="border:1px solid #a1a1a1 ;margin:10px 2px; padding:10px 2px;border-radius: 5px">
        <div class="col-sm-6 column form-group">
            <label for="input-newgoodsno" class="control-label col-sm-4 text-right">更换货号</label>
            <div class="col-sm-8" >
                <input type="text" class="form-control input-sm" id="input-newgoodsno">
            </div>
        </div>
        <div class="col-sm-3 column form-group">
            <label for="input-newcolor" class="control-lable col-sm-4 text-right">更换颜色</label>
            <div class="col-sm-8">
                <select name="input-newcolor" id="input-newcolor">
                </select>
            </div>
        </div>
        <div class="col-sm-3 column form-group">
            <label for="input-newsize" class="control-label col-sm-4 text-right">更换尺码</label>
            <div class="col-sm-8">
                <select name="input-newsize" id="input-newsize">
                </select>
            </div>
        </div>
        <input type="hidden" name="newsku" id="newsku">
    </div>
</script>