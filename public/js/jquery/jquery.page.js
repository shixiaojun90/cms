/**
 * Created by hezhi on 2017/2/23.
 */
;( function( $, window, undefined ) {

    'use strict';
    $.fn.tabPage = function( options ) {
        var tp = new TabPage($(this), options);
    };

    var defautls={
        pn:true,
        tabNum:3,
        rowCount:6,
        total:1,
        previous: "←",
        next: "→",
        currentPage:1,
        callback: function (current) {
        }
    }

    function TabPage(ele,options) {
        this.options=$.extend({}, defautls, options);
        this._previous = $(this.options.previous);
        this._next = $(this.options.next);
        this._nav = {};
        this.$el=ele;
        this.pageNum=Math.ceil(this.options.total/this.options.rowCount);
        this.init();
    }

    TabPage.prototype={
        constructor:TabPage,
        init:function(){
            this.setNav();
        },
        writeNav:function () {
            //初始化， 创建nav
            this._nav=$('<div class="holder"></div>');
            if(this.options.pn){
                this._nav.append('<a role="previous" class="jp-previous jp-disabled">'+this.options.previous+'</a>');
                if(this.pageNum<=this.options.tabNum){
                    for(var i=1;i<=this.pageNum;i++){
                        if(i==this.options.currentPage){
                            this._nav.append('<a page="'+i+'" class="jp-current">'+i+'</a>');
                        }else{
                            this._nav.append('<a page="'+i+'" class="">'+i+'</a>');
                        }
                    }
                }else {
                    for(var i=1;i<=this.options.tabNum;i++){
                        if(i==this.options.currentPage){
                            this._nav.append('<a page="'+i+'" class="jp-current">'+i+'</a>');
                        }else{
                            this._nav.append('<a page="'+i+'" class="">'+i+'</a>');
                        }
                    }
                }
                this._nav.append('<a role="next" class="jp-next">'+this.options.next+'</a>');
                if(this.pageNum<=this.options.tabNum){
                   $(this._nav).find(".jp-next").remove();
                    $(this._nav).find(".jp-previous").remove();
                }
            }
	    $(this._nav).append('共'+this.pageNum+'页');
            return this._nav;
        },
        setNav:function () {
            var navhtml=this.writeNav();
            this.$el.append(this._nav);
            this.bindNavHandlers();

        },
        bindNavHandlers:function () {
            var _this=this;
            $(this._nav).bind("click.tagPage",function (e) {
                e.stopPropagation();
                var lastTab=_this._nav.children().eq(3);
                var secondTab=_this._nav.children().eq(2);
                var firstTab=_this._nav.children().eq(1);
                var lasttAddPage=parseInt(lastTab.attr('page'))+1;
                var secondAddPage=parseInt(secondTab.attr('page'))+1;
                var firstAddPage=parseInt(firstTab.attr('page'))+1;
                var lasttCutPage=parseInt(lastTab.attr('page'))-1;
                var secondCutPage=parseInt(secondTab.attr('page'))-1;
                var firstCutPage=parseInt(firstTab.attr('page'))-1;
                var current=parseInt(_this._nav.find(".jp-current").attr('page'));
                if($(e.target).attr("class").indexOf('jp-disabled')>-1){
                    return false;
                }
                if($(e.target).attr("page")!==undefined){
                    _this._nav.children().removeClass('jp-current');
                    $(e.target).addClass("jp-current");
                }else{
                    if($(e.target).attr("role")=='next'){
                        _this._nav.children().removeClass('jp-current');
                        if(current==_this._nav.children().eq(3).attr("page")){
                            //判断最后一页
                            if (parseInt(lastTab.attr('page')) + 1 <= _this.pageNum) {
                                lastTab.attr('page', lasttAddPage).text(lasttAddPage);
                                secondTab.attr('page', secondAddPage).text(secondAddPage);
                                firstTab.attr('page', firstAddPage).text(firstAddPage);
                            }
                        }
                        _this._nav.find("[page="+(current+1)+"]").addClass("jp-current");
                    }else if($(e.target).attr("role")=='previous'){
                        _this._nav.children().removeClass('jp-current');
                        if(parseInt(lastTab.attr('page'))>3){
                            lastTab.attr('page', lasttCutPage).text(lasttCutPage);
                            secondTab.attr('page', secondCutPage).text(secondCutPage);
                            firstTab.attr('page', firstCutPage).text(firstCutPage);
                        }
                        _this._nav.find("[page="+(current-1)+"]").addClass("jp-current");
                    }else{
                        return false;
                    }
                }
                checkpn();
                //判断锁定前进和后退
                function checkpn() {
                    _this._nav.children().removeClass('jp-disabled');
                    if(($(e.target).attr("page")==1)||(_this._nav.find(".jp-current").attr('page')==1)){
                        $(_this._nav.children()[0]).addClass('jp-disabled');
                    }

                    if(($(e.target).attr("page")==_this.pageNum)||(_this._nav.find(".jp-current").attr('page')==_this.pageNum)){
                        $(_this._nav.children()[4]).addClass('jp-disabled');
                    }
                }
                _this.options.callback(parseInt(_this._nav.find(".jp-current").attr('page')));
            });
        }
    }


} )( jQuery, window );
