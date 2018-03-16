<script id="repairprocess-template" type="text/template">
    <div class="row clearfix form-inline" style="border:1px solid #a1a1a1 ;margin:10px 2px; padding:10px 2px;border-radius: 5px">
        <div class="col-sm-4 form-group">
            <label for="input-repairResult" class="control-label text-right">修理结果&nbsp;&nbsp;</label>
            <input type="radio" name="input-repairResult" id="input-repairResult" value="T" checked> 已修好
            <input type="radio" name="input-repairResult" id="input-repairResult" value="F" > 仍有问题
        </div>
        <div class="form-group col-sm-8">
            <label for="input-remark" class="col-sm-3 control-label text-right">处理备注</label>
            <div class="col-sm-9">
                <textarea class="form-control input-sm" rows="3" name="input-remark" id="input-remark"></textarea>
            </div>
        </div>
    </div>
    <div class="row clearfix form-inline hidden" id="repairinfo" style="border:1px solid #a1a1a1 ;margin:10px 2px; padding:10px 2px;border-radius: 5px">
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
</script>