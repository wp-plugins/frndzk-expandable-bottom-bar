jQuery.noConflict()
function expstickybar(usersetting){var setting=jQuery.extend({position:'bottom',peekamount:30,revealtype:'mouseover',speed:200},usersetting)
var thisbar=this
var cssfixedsupport=!document.all||document.all&&document.compatMode=="CSS1Compat"&&window.XMLHttpRequest
if(!cssfixedsupport||window.opera)
return
jQuery(function($){if(setting.externalcontent){thisbar.$ajaxstickydiv=$('<div id="ajaxstickydiv_'+setting.id+'"></div>').appendTo(document.body)
thisbar.loadcontent($,setting)}
else
thisbar.init($,setting)})}
expstickybar.prototype={loadcontent:function($,setting){var thisbar=this
var ajaxfriendlyurl=setting.externalcontent.replace(/^http:\/\/[^\/]+\//i,"http://"+window.location.hostname+"/")
$.ajax({url:ajaxfriendlyurl,async:true,error:function(ajaxrequest){alert('Error fetching Ajax content.<br />Server Response: '+ajaxrequest.responseText)},success:function(content){thisbar.$ajaxstickydiv.html(content)
thisbar.init($,setting)}})},showhide:function(keyword,anim){var thisbar=this,$=jQuery
var finalpx=(keyword=="show")?0:-(this.height-this.setting.peekamount)
var positioncss=(this.setting.position=="bottom")?{bottom:finalpx}:{top:finalpx}
this.$stickybar.stop().animate(positioncss,(anim)?this.setting.speed:0,function(){thisbar.$indicators.each(function(){var $indicator=$(this)
$indicator.attr('src',(thisbar.currentstate=="show")?$indicator.attr('data-closeimage'):$indicator.attr('data-openimage'))})})
thisbar.currentstate=keyword},toggle:function(){var state=(this.currentstate=="show")?"hide":"show"
 this.showhide(state,true)},init:function($,setting){var thisbar=this
this.$stickybar=$('#'+setting.id).css('visibility','visible')
this.height=this.$stickybar.outerHeight()
this.currentstate="hide"
setting.peekamount=Math.min(this.height,setting.peekamount)
this.setting=setting
if(setting.revealtype=="mouseover")
this.$stickybar.bind("mouseenter mouseleave",function(e){thisbar.showhide((e.type=="mouseenter")?"show":"hide",true)})
this.$indicators=this.$stickybar.find('img[data-openimage]')
this.$stickybar.find('a[href=#togglebar]').click(function(){thisbar.toggle()
return false})
setTimeout(function(){thisbar.height=thisbar.$stickybar.outerHeight()},1000)
this.showhide("hide")}}
var mystickybar=new expstickybar({id:"stickybar",position:'bottom',revealtype:'mouseover',peekamount:35,speed:200})
