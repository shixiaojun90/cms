/**
 * Created by hezhi on 16/11/3.
 */
define(function () {
    var reqCnf=require.config({
        map:{
            '*':{
                'css':'css'
            }
        },
        shim: {
            'mCustomScrollbar':{
                deps: ['jquery']
            },
            'waves': {
                deps: ['jquery']
            },
            'bootstrap':{
                deps:['jquery']
            },
            'function':{
                deps:['mCustomScrollbar','waves','bootstrap','bootstrapSelect','bootrapDatetimepicker','bootgrid','jbase64']
            },
            'bootstrapSelect':{
                deps:['css!'+HOST+WIDGET_PATH+'/bootstrapSelect/dist/css/bootstrap-select.css']
            },
            'sweetAlert':{
                deps:['css!'+HOST+WIDGET_PATH+'/bootstrap-sweetalert/lib/sweet-alert.css']
            },
            'bootgrid':{
                deps:['css!'+HOST+WIDGET_PATH+'/bootgrid/jquery.bootgrid.min.css','css!../css/update.css']
            },
            'summernote':{
                deps:['css!'+HOST+WIDGET_PATH+'/summernote/dist/summernote.css']
            },
            'summernote-zh':{
                deps:['summernote']
            },
            'jqueryform':{
                deps:['jquery']
            },
            'jbase64':{
                deps:['jquery']
            }
        },
        paths : {
            'mCustomScrollbar':HOST+WIDGET_PATH+'/customScrollbar/jquery.mCustomScrollbar.concat.min',
            'waves':HOST+WIDGET_PATH+'/waves/waves.min',
            'function':'functions',
            'jquery':'jquery-2.2.3.min',
            'bootstrap':'bootstrap.min',
            'fileinput':HOST+WIDGET_PATH+'/fileinput/fileinput.min',
            'moment':HOST+WIDGET_PATH+'/moment/moment',
            'bootrapDatetimepicker':HOST+WIDGET_PATH+'/bootstrapDatetimepicker/js/bootstrap-datetimepicker.min',
            'bootstrapSelect' : HOST+WIDGET_PATH+'/bootstrapSelect/dist/js/bootstrap-select.min',
            'bootgrid':HOST+WIDGET_PATH+'/bootgrid/jquery.bootgrid.updated',
            'sweetAlert':HOST+WIDGET_PATH+'/bootstrap-sweetalert/lib/sweet-alert',
            'summernote':HOST+WIDGET_PATH+'/summernote/dist/summernote.min',
            'summernote-zh':HOST+WIDGET_PATH+'/summernote/lang/zh-CN',
            'jqueryform':'jquery.form',
            'jbase64':HOST+JS_PATH+'/jbase64',
            'common':HOST+JS_PATH+'/common'
        }
    })
    return reqCnf;
})