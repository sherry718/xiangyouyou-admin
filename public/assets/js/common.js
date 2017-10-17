
var failure = function(data,icon) {
    icon=icon?icon:2;//1 success 2error 3question
  var str = typeof(data) == 'string' ? data : data.responseJSON;
    layer.msg(str,{icon:icon});
  return false;
};

seajs.config({
  base: '/assets-new/'
});

var page = function(page_count, total_rows, page_no) {
  if (page_count < 2) return '';
  page_no = parseInt(page_no);
  var page_str = '<ul class="pagination">';
  if (page_no > 1) {
    page_str += '<li><a href="javascript:;" rel="' + (page_no - 1) + '">« 上一页</a></li>';
  } else {
    page_str += '<li><span>« 上一页</a></span>';
  }
  var more = 4;
  var m = (page_no - Math.ceil(more / 2) > 0) ? (page_no - Math.ceil(more / 2)) : 1; //起始页码
  var n = (m + more < page_count) ? (m + more) : page_count; //终止页码
  m = ((n - m) < more) ? (n - more) : m;
  m = (m > 0) ? m : 1;
  if (m > 1) {
    page_str += '<li><a href="javascript:;" rel="1">1</a></li>';
    if (m > 2) {
      page_str += '<li><span>…</span></li>';
    }
  }
  for (i = m; i <= n; i++) {
    if (i == page_no) {
      page_str += '<li class="active"><span>' + i + '</span></li>';
    } else {
      page_str += '<li><a href="javascript:;" rel="' + i + '">' + i + '</a></li>';
    }
  }
  if (i <= page_count) {
    if (i != page_count) {
      page_str += '<li><span>…</span></li>';
    }
    page_str += '<li><a href="javascript:;" rel="' + page_count + '">' + page_count + '</a></li>';
  }
  if (page_no < page_count) {
    page_str += '<li><a href="javascript:;" rel="' + (page_no + 1) + '">下一页 »</a></li>';
  } else {
    page_str += '<li><span>下一页 »</span></li>';
  }
  return page_str + '</ul>';
};

/**
 * 菜单激活，可同时传入多个参数以激活多个菜单
 */
var activeMenu = function () {
    var selector = [];
    for (var i = 0; i < arguments.length; i++) {
        selector.push("[rel='" + arguments[i] + "']");
    }
    selector = selector.join(',');
    $(selector).addClass('active');
};

/**
 * 菜单激活，可同时传入多个参数以激活多个菜单
 */
var renderSwitcher = function (selector) {
    selector = selector ? selector : $("[data-render=switchery]");
    var green = "#00acac", red = "#ff5b57", blue = "#348fe2", purple = "#727cb6", orange = "#f59c1a", black = "#2d353c";
    0 !== selector.length && selector.each(function () {
        var t = green;
        if ($(this).attr("data-theme"))switch ($(this).attr("data-theme")) {
            case"red":
                t = red;
                break;
            case"blue":
                t = blue;
                break;
            case"purple":
                t = purple;
                break;
            case"orange":
                t = orange;
                break;
            case"black":
                t = black
        }
        var a = {};
        a.color = t, a.secondaryColor = $(this).attr("data-secondary-color") ? $(this).attr("data-secondary-color") : "#dfdfdf", a.className = $(this).attr("data-classname") ? $(this).attr("data-classname") : "switchery", a.disabled = $(this).attr("data-disabled") ? !0 : !1, a.disabledOpacity = $(this).attr("data-disabled-opacity") ? parseFloat($(this).attr("data-disabled-opacity")) : .5, a.speed = $(this).attr("data-speed") ? $(this).attr("data-speed") : "0.5s";
        new Switchery(this, a)
    })
};
