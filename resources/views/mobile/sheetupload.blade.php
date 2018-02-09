@extends('layouts.mobile')

@section('content')
    <div data-role="page" id="mainPage" data-theme="a">
        <div data-role="header" data-position="fixed">
            <a href="{{route('mobile.index')}}" data-role="button" data-icon="back">返回</a>
            <h1>售后服务信息上传</h1>
        </div>
        <li data-role="main" class="ui-content">
            <form method="post" id="uploadForm" action="{{route('mobile.worksheetupload')}}" enctype="multipart/form-data">
                <ul data-role="listview" data-inset="true">
                    <li data-role="list-divider">工单基本信息</li>
                    <li class="ui-field-contain">
                        <label for="sheetCode">工单号:</label>
                        <input type="text" name="sheetCode" id="sheetCode" readonly value="{{$sheetCode}}"  />
                    </li>
                    <li class="ui-field-contain">
                        <label for="clientName">客户姓名:</label>
                        <input type="text" name="clientName" id="clientName" readonly value="{{$clientName}}"  />
                    </li>
                    <li class="ui-field-contain">
                        <label for="clientMobile">客户手机号:</label>
                        <input type="text" name="clientMobile" id="clientMobile" readonly value="{{$clientMobile}}"  />
                    </li>
                    <input type="hidden" name="clientAddressProvince" id="clientAddressProvince" value=""  />
                    <input type="hidden" name="clientAddressCity" id="clientAddressCity" value=""  />
                    <input type="hidden" name="clientAddressTown" id="clientAddressTown" value=""  />
                    <li data-role="list-divider">收获地址</li>
                    <!--
                    <li class="ui-field-contain" style="float">
                        <div style="display: flex;">
                            <label for="strArea">地区选择:</label>
                            <input class="sg-area-result" type="text" readonly name="strArea" id="strArea" required >
                            <a id="selectBtn" data-icon="arrow-r">选择</a>
                        </div>

                    </li>
                    -->
                    <li class="ui-field-contain">
                        <a>
                            <label for="name">地区选择:</label>
                            <input class="sg-area-result" type="text" readonly name="strArea" id="strArea" required >
                        </a>
                        <a id="selectBtn" data-icon="search">选择</a>
                    </li>
                    <!--
                    <div style="float: left;">
                        <div style="display: flex;">
                            <div style="line-height: 30px;height: 30px">地区选择:</div>
                            <div><input class="sg-area-result" type="text" name="strArea" id="strArea" required style="width: 200px;height: 30px;border: 1px solid #ccc;padding-left: 10px"></div>
                            <div id="selectBtn" style="width: 30px;height: 30px;border: 1px solid #ccc;cursor: pointer; text-align: center">&gt;</div>
                        </div>
                    </div>
                    -->
                    <li class="ui-field-contain">
                        <label for="clientAddress1">收件人详细地址:</label>
                        <input type="text" name="clientAddress1" id="clientAddress1" required value=""  />
                        <input type="text" name="clientAddress2" id="clientAddress2" value=""  />
                    </li>
                    <li class="ui-field-contain">
                        <label for="clientReceiverName">收件人姓名:</label>
                        <input type="text" name="clientReceiverName" id="clientReceiverName" required value=""  />
                    </li>
                    <li class="ui-field-contain">
                        <label for="clientReceiverMobile">收件人手机号:</label>
                        <input type="number" name="clientReceiverMobile" id="clientReceiverMobile" required value=""  />
                    </li>
                    <li data-role="list-divider">问题说明</li>
                    <li class="ui-field-contain">
                        <label for="issueDesc">问题描述:</label>
                        <textarea data-mini="true" cols="40" rows="8" name="issueDesc" required id="issueDesc"></textarea>
                    </li>
                    <li class="ui-field-contain">
                        <label for="picWhole">鞋整体图:</label>
                        <input type="file" id="picWhole" name="picWhole" accept="image/*" draggable="true" required single/>
                        <div id="picWholeShow" style="width:300px;height:300px;border:1px solid #000000;"><img src="nopic.jpg" /></div>
                    </li>
                    <li class="ui-field-contain">
                        <label for="picDamage">鞋破损图:</label>
                        <input type="file" id="picDamage" name="picDamage" accept="image/*" draggable="true" required single/>
                        <div id="picDamageShow" style="width:300px;height:300px;border:1px solid #000000;"><img src="nopic.jpg" /></div>
                    </li>
                    <li class="ui-field-contain">
                        <label for="picBottom">鞋底部图:</label>
                        <input type="file" id="picBottom" name="picBottom" accept="image/*" draggable="true" required single/>
                        <div id="picBottomShow" style="width:300px;height:300px;border:1px solid #000000;"><img src="nopic.jpg" /></div>
                    </li>

                    {{ csrf_field() }}
                    <li class="ui-field-contain">
                        <input type="submit" id="uploadSubmit" name="uploadSubmit" data-inline="true" value="Submit" data-theme="b">
                    </li>
                </ul>
            </form>
        </div>
        <div data-role="popup" id="popupSheetUploadResp" data-dismissible="false" class="ui-corner-all">
            <div role="main" class="ui-content">
                <h4 id="sheetUploadRespMsg"></h4>
                <div align="center">
                    <a href="{{route('mobile.index')}}" data-role="button" data-ajax="false" data-rel="back" data-transition="flow"
                       data-inline="true" class="ui-btn-active">结束</a>
                    <a data-role="button" data-rel="back" data-inline="true">取消</a>
                </div>
            </div>
        </div>
    </div>
@stop

@push('links')
    <style type="text/css">
        #picWholeShow{
            filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(true,sizingMethod=scale);
        }
        #picDamageShow{
            filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(true,sizingMethod=scale);
        }
        #picBottomShow{
            filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(true,sizingMethod=scale);
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/SG_area_select.css') }}">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/localResizeIMG/dist/lrz.all.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/areaSelect/iscroll.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/areaSelect/SG_area_select.js') }}"></script>

    <script type="text/javascript">

        $("#uploadSubmit").click(function(){
            var strs = $('#strArea').val().split("-");
            $('#clientAddressProvince').val(strs[0]);
            $('#clientAddressCity').val(strs[1]);
            $('#clientAddressTown').val(strs[2]);
            var formData = $("#uploadForm").serialize();
            $.ajax({
                type: "POST",
                url: "{{route('mobile.worksheetupload')}}",
                cache: false,
                data: formData,
                beforeSend: function () {
                    showLoader();
                },
                complete:function(){
                    hideLoader();
                },
                success: function(data) {
                    $('#sheetUploadRespMsg').empty();
                    $('#sheetUploadRespMsg').text("运维工单更新成功！");
                    $('#popupSheetUploadResp').popup();
                    $('#popupSheetUploadResp').popup('open');
                },
                error: function(data) {
                    alert(data.responseJSON.error);
                }
            });

            return false;
        });
        $('#selectBtn').on('click',function(){
            $.areaSelect();
        });

        $("#picWhole").change(function () {
            uploadImage(this, 'whole');
        });
        $("#picDamage").change(function () {
            uploadImage(this, 'damage');
        });
        $("#picBottom").change(function () {
            uploadImage(this, 'bottom');
        });

        //处理file input加载的图片文件
        $("#mainPage").bind("pageshow", function(e) {
            //判断浏览器是否有FileReader接口
            if(typeof FileReader =='undefined')
            {
                $("#picWholeShow").css({'background':'none'}).html('亲,您的浏览器还不支持HTML5的FileReader接口,无法使用图片本地预览,请更新浏览器获得最好体验');
                $("#picDamageShow").css({'background':'none'}).html('亲,您的浏览器还不支持HTML5的FileReader接口,无法使用图片本地预览,请更新浏览器获得最好体验');
                $("#picBottomShow").css({'background':'none'}).html('亲,您的浏览器还不支持HTML5的FileReader接口,无法使用图片本地预览,请更新浏览器获得最好体验');
                //如果浏览器是ie
                if($.browser.msie===true)
                {
                    //ie6直接用file input的value值本地预览
                    if($.browser.version==6)
                    {
                        $("#picWhole").change(function(event){
                            //ie6下怎么做图片格式判断?
                            var src = event.target.value;
                            //var src = document.selection.createRange().text;        //选中后 selection对象就产生了 这个对象只适合ie
                            var img = '<img src="'+src+'" width="300px" height="300px" />';
                            $("#picWholeShow").empty().append(img);
                        });
                        $("#picDamage").change(function(event){
                            //ie6下怎么做图片格式判断?
                            var src = event.target.value;
                            //var src = document.selection.createRange().text;        //选中后 selection对象就产生了 这个对象只适合ie
                            var img = '<img src="'+src+'" width="300px" height="300px" />';
                            $("#picDamageShow").empty().append(img);
                        });
                        $("#picBottom").change(function(event){
                            //ie6下怎么做图片格式判断?
                            var src = event.target.value;
                            //var src = document.selection.createRange().text;        //选中后 selection对象就产生了 这个对象只适合ie
                            var img = '<img src="'+src+'" width="300px" height="300px" />';
                            $("#picBottomShow").empty().append(img);
                        });
                    }
                    //ie7,8使用滤镜本地预览
                    else if($.browser.version==7 || $.browser.version==8)
                    {
                        $("#picWhole").change(function(event){
                            $(event.target).select();
                            var src = document.selection.createRange().text;
                            var dom = document.getElementById('picWholeShow');
                            //使用滤镜 成功率高
                            dom.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src= src;
                            dom.innerHTML = '';
                            //使用和ie6相同的方式 设置src为绝对路径的方式 有些图片无法显示 效果没有使用滤镜好
                            /*var img = '<img src="'+src+'" width="200px" height="200px" />';
                            $("#destination").empty().append(img);*/
                        });
                        $("#picDamage").change(function(event){
                            $(event.target).select();
                            var src = document.selection.createRange().text;
                            var dom = document.getElementById('picDamageShow');
                            //使用滤镜 成功率高
                            dom.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src= src;
                            dom.innerHTML = '';
                            //使用和ie6相同的方式 设置src为绝对路径的方式 有些图片无法显示 效果没有使用滤镜好
                            /*var img = '<img src="'+src+'" width="200px" height="200px" />';
                            $("#destination").empty().append(img);*/
                        });
                        $("#picBottom").change(function(event){
                            $(event.target).select();
                            var src = document.selection.createRange().text;
                            var dom = document.getElementById('picBottomShow');
                            //使用滤镜 成功率高
                            dom.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src= src;
                            dom.innerHTML = '';
                            //使用和ie6相同的方式 设置src为绝对路径的方式 有些图片无法显示 效果没有使用滤镜好
                            /*var img = '<img src="'+src+'" width="200px" height="200px" />';
                            $("#destination").empty().append(img);*/
                        });
                    }
                }
                //如果是不支持FileReader接口的低版本firefox 可以用getAsDataURL接口
                else if($.browser.mozilla===true)
                {
                    $("#picWhole").change(function(event){
                        //firefox2.0没有event.target.files这个属性 就像ie6那样使用value值 但是firefox2.0不支持绝对路径嵌入图片 放弃firefox2.0
                        //firefox3.0开始具备event.target.files这个属性 并且开始支持getAsDataURL()这个接口 一直到firefox7.0结束 不过以后都可以用HTML5的FileReader接口了
                        if(event.target.files)
                        {
                            //console.log(event.target.files);
                            for(var i=0;i<event.target.files.length;i++)
                            {
                                var img = '<img src="'+event.target.files.item(i).getAsDataURL()+'" width="300px" height="300px"/>';
                                $("#picWholeShow").empty().append(img);
                            }
                        }
                        else
                        {
                            //console.log(event.target.value);
                            //$("#imgPreview").attr({'src':event.target.value});
                        }
                    });
                    $("#picDamage").change(function(event){
                        if(event.target.files)
                        {
                            for(var i=0;i<event.target.files.length;i++)
                            {
                                var img = '<img src="'+event.target.files.item(i).getAsDataURL()+'" width="300px" height="300px"/>';
                                $("#picDamageShow").empty().append(img);
                            }
                        }
                        else
                        {
                            //console.log(event.target.value);
                            //$("#imgPreview").attr({'src':event.target.value});
                        }
                    });
                    $("#picBottom").change(function(event){
                        if(event.target.files)
                        {
                            for(var i=0;i<event.target.files.length;i++)
                            {
                                var img = '<img src="'+event.target.files.item(i).getAsDataURL()+'" width="300px" height="300px"/>';
                                $("#picBottomShow").empty().append(img);
                            }
                        }
                        else
                        {
                            //console.log(event.target.value);
                            //$("#imgPreview").attr({'src':event.target.value});
                        }
                    });
                }
            }
            else
            {
                // version 1
                /*$("#imgUpload").change(function(e){
                  var file = e.target.files[0];
                  var fReader = new FileReader();
                  //console.log(fReader);
                  //console.log(file);
                  fReader.onload=(function(var_file)
                  {
                      return function(e)
                      {
                          $("#imgPreview").attr({'src':e.target.result,'alt':var_file.name});
                      }
                  })(file);
                  fReader.readAsDataURL(file);
                  });*/

                //单图上传 version 2
                /*$("#imgUpload").change(function(e){
                      var file = e.target.files[0];
                      var reader = new FileReader();
                      reader.onload = function(e){
                          //displayImage($('bd'),e.target.result);
                          //alert('load');
                          $("#imgPreview").attr({'src':e.target.result});
                      }
                      reader.readAsDataURL(file);
                    });*/
                //多图上传 input file控件里指定multiple属性 e.target是dom类型
                $("#picWhole").change(function(e){
                    for(var i=0;i<e.target.files.length;i++)
                    {
                        var file = e.target.files.item(i);
                        //允许文件MIME类型 也可以在input标签中指定accept属性
                        //console.log(/^image\/.*$/i.test(file.type));
                        if(!(/^image\/.*$/i.test(file.type)))
                        {
                            continue;            //不是图片 就跳出这一次循环
                        }


                        //实例化FileReader API
                        var freader = new FileReader();
                        freader.readAsDataURL(file);
                        freader.onload=function(e)
                        {
                            var img = '<img src="'+e.target.result+'" width="300px" height="300px"/>';
                            $("#picWholeShow").empty().append(img);
                        }
                    }
                });
                $("#picDamage").change(function(e){
                    for(var i=0;i<e.target.files.length;i++)
                    {
                        var file = e.target.files.item(i);
                        if(!(/^image\/.*$/i.test(file.type)))
                        {
                            continue;            //不是图片 就跳出这一次循环
                        }

                        var freader = new FileReader();
                        freader.readAsDataURL(file);
                        freader.onload=function(e)
                        {
                            var img = '<img src="'+e.target.result+'" width="300px" height="300px"/>';
                            $("#picDamageShow").empty().append(img);
                        }
                    }
                });
                $("#picBottom").change(function(e){
                    for(var i=0;i<e.target.files.length;i++)
                    {
                        var file = e.target.files.item(i);
                        if(!(/^image\/.*$/i.test(file.type)))
                        {
                            continue;            //不是图片 就跳出这一次循环
                        }

                        var freader = new FileReader();
                        freader.readAsDataURL(file);
                        freader.onload=function(e)
                        {
                            var img = '<img src="'+e.target.result+'" width="300px" height="300px"/>';
                            $("#picBottomShow").empty().append(img);
                        }
                    }
                });

                //处理图片拖拽的代码
                var destDom = document.getElementById('picWholeShow');
                destDom.addEventListener('dragover',function(event){
                    event.stopPropagation();
                    event.preventDefault();
                },false);

                destDom.addEventListener('drop',function(event){
                    event.stopPropagation();
                    event.preventDefault();
                    var img_file = event.dataTransfer.files.item(0);                //获取拖拽过来的文件信息 暂时取一个
                    //console.log(event.dataTransfer.files.item(0).type);
                    if(!(/^image\/.*$/.test(img_file.type)))
                    {
                        alert('您还未拖拽任何图片过来,或者您拖拽的不是图片文件');
                        return false;
                    }
                    fReader = new FileReader();
                    fReader.readAsDataURL(img_file);
                    fReader.onload = function(event){
                        destDom.innerHTML='';
                        destDom.innerHTML = '<img src="'+event.target.result+'" width="300px" height="300px"/>';
                    };
                },false);
            }
        });

        //压缩上传图片
        function uploadImage(fileinput,imagetype)
        {
            /* 压缩图片 */
            lrz(fileinput.files[0], {
                width: 1000 //设置压缩参数
            }).then(function (rst) {
                /* 处理成功后执行 */
                formData = new FormData($('#uploadForm')[0]);
                formData.append('base64img', rst.base64); // 添加额外参数
                formData.append('imagetype', imagetype); // 添加额外参数
                $.ajax({
                    url: "{{route('mobile.imageupload')}}",
                    type: "POST",
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: formData,
                    beforeSend: function () {
                        showLoader();
                    },
                    complete:function(){
                        hideLoader();
                    },
                    processData: false,
                    contentType: false,
                    success: function (data) {
                    }
                });
            }).catch(function (err) {
                /* 处理失败后执行 */
            }).always(function () {
                /* 必然执行 */
            })
        }

        //显示加载器
        function showLoader() {
            //显示加载器.for jQuery Mobile 1.2.0
            $.mobile.loading('show', {
                text: '数据上传中...', //加载器中显示的文字
                textVisible: true, //是否显示文字
                theme: 'a',        //加载器主题样式a-e
                textonly: false,   //是否只显示文字
                html: ""           //要显示的html内容，如图片等
            });
        }

        //隐藏加载器.for jQuery Mobile 1.2.0
        function hideLoader()
        {
            //隐藏加载器
            $.mobile.loading('hide');
        }
    </script>
@endpush

