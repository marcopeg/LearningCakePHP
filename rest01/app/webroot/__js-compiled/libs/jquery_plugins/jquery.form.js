/*!
 * jQuery Form Plugin
 * version: 3.18 (28-SEP-2012)
 * @requires jQuery v1.5 or later
 *
 * Examples and documentation at: http://malsup.com/jquery/form/
 * Project repository: https://github.com/malsup/form
 * Dual licensed under the MIT and GPL licenses:
 *    http://malsup.github.com/mit-license.txt
 *    http://malsup.github.com/gpl-license-v2.txt
 */

define(["jquery"],function(e){(function(t){function r(e){var n=e.data;e.isDefaultPrevented()||(e.preventDefault(),t(this).ajaxSubmit(n))}function i(e){var n=e.target,r=t(n);if(!r.is(":submit,input:image")){var i=r.closest(":submit");if(i.length===0)return;n=i[0]}var s=this;s.clk=n;if(n.type=="image")if(e.offsetX!==undefined)s.clk_x=e.offsetX,s.clk_y=e.offsetY;else if(typeof t.fn.offset=="function"){var o=r.offset();s.clk_x=e.pageX-o.left,s.clk_y=e.pageY-o.top}else s.clk_x=e.pageX-n.offsetLeft,s.clk_y=e.pageY-n.offsetTop;setTimeout(function(){s.clk=s.clk_x=s.clk_y=null},100)}function s(){if(!t.fn.ajaxSubmit.debug)return;var e="[jquery.form] "+Array.prototype.join.call(arguments,"");window.console&&window.console.log?window.console.log(e):window.opera&&window.opera.postError&&window.opera.postError(e)}var n={};n.fileapi=t("<input type='file'/>").get(0).files!==undefined,n.formdata=window.FormData!==undefined,t.fn.ajaxSubmit=function(r){function N(e){var n=t.param(e).split("&"),r=n.length,i={},s,o;for(s=0;s<r;s++)o=n[s].split("="),i[decodeURIComponent(o[0])]=decodeURIComponent(o[1]);return i}function C(n){var s=new FormData;for(var o=0;o<n.length;o++)s.append(n[o].name,n[o].value);if(r.extraData){var u=N(r.extraData);for(var a in u)u.hasOwnProperty(a)&&s.append(a,u[a])}r.data=null;var f=t.extend(!0,{},t.ajaxSettings,r,{contentType:!1,processData:!1,cache:!1,type:i||"POST"});r.uploadProgress&&(f.xhr=function(){var t=e.ajaxSettings.xhr();return t.upload&&(t.upload.onprogress=function(e){var t=0,n=e.loaded||e.position,i=e.total;e.lengthComputable&&(t=Math.ceil(n/i*100)),r.uploadProgress(e,n,i,t)}),t}),f.data=null;var l=f.beforeSend;return f.beforeSend=function(e,t){t.data=s,l&&l.call(this,e,t)},t.ajax(f)}function k(e){function T(e){var t=e.contentWindow?e.contentWindow.document:e.contentDocument?e.contentDocument:e.document;return t}function k(){function o(){try{var e=T(d).readyState;s("state = "+e),e&&e.toLowerCase()=="uninitialized"&&setTimeout(o,50)}catch(t){s("Server abort: ",t," (",t.name,")"),_(x),b&&clearTimeout(b),b=undefined}}var e=a.attr("target"),r=a.attr("action");n.setAttribute("target",h),i||n.setAttribute("method","POST"),r!=f.url&&n.setAttribute("action",f.url),!f.skipEncodingOverride&&(!i||/post/i.test(i))&&a.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"}),f.timeout&&(b=setTimeout(function(){y=!0,_(S)},f.timeout));var u=[];try{if(f.extraData)for(var l in f.extraData)f.extraData.hasOwnProperty(l)&&(t.isPlainObject(f.extraData[l])&&f.extraData[l].hasOwnProperty("name")&&f.extraData[l].hasOwnProperty("value")?u.push(t('<input type="hidden" name="'+f.extraData[l].name+'">').attr("value",f.extraData[l].value).appendTo(n)[0]):u.push(t('<input type="hidden" name="'+l+'">').attr("value",f.extraData[l]).appendTo(n)[0]));f.iframeTarget||(p.appendTo("body"),d.attachEvent?d.attachEvent("onload",_):d.addEventListener("load",_,!1)),setTimeout(o,15),n.submit()}finally{n.setAttribute("action",r),e?n.setAttribute("target",e):a.removeAttr("target"),t(u).remove()}}function _(e){if(v.aborted||M)return;try{A=T(d)}catch(n){s("cannot access response document: ",n),e=x}if(e===S&&v){v.abort("timeout"),E.reject(v,"timeout");return}if(e==x&&v){v.abort("server abort"),E.reject(v,"error","server abort");return}if(!A||A.location.href==f.iframeSrc)if(!y)return;d.detachEvent?d.detachEvent("onload",_):d.removeEventListener("load",_,!1);var r="success",i;try{if(y)throw"timeout";var o=f.dataType=="xml"||A.XMLDocument||t.isXMLDoc(A);s("isXml="+o);if(!o&&window.opera&&(A.body===null||!A.body.innerHTML)&&--O){s("requeing onLoad callback, DOM not available"),setTimeout(_,250);return}var u=A.body?A.body:A.documentElement;v.responseText=u?u.innerHTML:null,v.responseXML=A.XMLDocument?A.XMLDocument:A,o&&(f.dataType="xml"),v.getResponseHeader=function(e){var t={"content-type":f.dataType};return t[e]},u&&(v.status=Number(u.getAttribute("status"))||v.status,v.statusText=u.getAttribute("statusText")||v.statusText);var a=(f.dataType||"").toLowerCase(),c=/(json|script|text)/.test(a);if(c||f.textarea){var h=A.getElementsByTagName("textarea")[0];if(h)v.responseText=h.value,v.status=Number(h.getAttribute("status"))||v.status,v.statusText=h.getAttribute("statusText")||v.statusText;else if(c){var m=A.getElementsByTagName("pre")[0],g=A.getElementsByTagName("body")[0];m?v.responseText=m.textContent?m.textContent:m.innerText:g&&(v.responseText=g.textContent?g.textContent:g.innerText)}}else a=="xml"&&!v.responseXML&&v.responseText&&(v.responseXML=D(v.responseText));try{L=H(v,a,f)}catch(e){r="parsererror",v.error=i=e||r}}catch(e){s("error caught: ",e),r="error",v.error=i=e||r}v.aborted&&(s("upload aborted"),r=null),v.status&&(r=v.status>=200&&v.status<300||v.status===304?"success":"error"),r==="success"?(f.success&&f.success.call(f.context,L,"success",v),E.resolve(v.responseText,"success",v),l&&t.event.trigger("ajaxSuccess",[v,f])):r&&(i===undefined&&(i=v.statusText),f.error&&f.error.call(f.context,v,r,i),E.reject(v,"error",i),l&&t.event.trigger("ajaxError",[v,f,i])),l&&t.event.trigger("ajaxComplete",[v,f]),l&&!--t.active&&t.event.trigger("ajaxStop"),f.complete&&f.complete.call(f.context,v,r),M=!0,f.timeout&&clearTimeout(b),setTimeout(function(){f.iframeTarget||p.remove(),v.responseXML=null},100)}var n=a[0],o,u,f,l,h,p,d,v,m,g,y,b,w=!!t.fn.prop,E=t.Deferred();if(t(":input[name=submit],:input[id=submit]",n).length)return alert('Error: Form elements must not have name or id of "submit".'),E.reject(),E;if(e)for(u=0;u<c.length;u++)o=t(c[u]),w?o.prop("disabled",!1):o.removeAttr("disabled");f=t.extend(!0,{},t.ajaxSettings,r),f.context=f.context||f,h="jqFormIO"+(new Date).getTime(),f.iframeTarget?(p=t(f.iframeTarget),g=p.attr("name"),g?h=g:p.attr("name",h)):(p=t('<iframe name="'+h+'" src="'+f.iframeSrc+'" />'),p.css({position:"absolute",top:"-1000px",left:"-1000px"})),d=p[0],v={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(e){var n=e==="timeout"?"timeout":"aborted";s("aborting upload... "+n),this.aborted=1;if(d.contentWindow.document.execCommand)try{d.contentWindow.document.execCommand("Stop")}catch(r){}p.attr("src",f.iframeSrc),v.error=n,f.error&&f.error.call(f.context,v,n,e),l&&t.event.trigger("ajaxError",[v,f,n]),f.complete&&f.complete.call(f.context,v,n)}},l=f.global,l&&0===t.active++&&t.event.trigger("ajaxStart"),l&&t.event.trigger("ajaxSend",[v,f]);if(f.beforeSend&&f.beforeSend.call(f.context,v,f)===!1)return f.global&&t.active--,E.reject(),E;if(v.aborted)return E.reject(),E;m=n.clk,m&&(g=m.name,g&&!m.disabled&&(f.extraData=f.extraData||{},f.extraData[g]=m.value,m.type=="image"&&(f.extraData[g+".x"]=n.clk_x,f.extraData[g+".y"]=n.clk_y)));var S=1,x=2,N=t("meta[name=csrf-token]").attr("content"),C=t("meta[name=csrf-param]").attr("content");C&&N&&(f.extraData=f.extraData||{},f.extraData[C]=N),f.forceSync?k():setTimeout(k,10);var L,A,O=50,M,D=t.parseXML||function(e,t){return window.ActiveXObject?(t=new ActiveXObject("Microsoft.XMLDOM"),t.async="false",t.loadXML(e)):t=(new DOMParser).parseFromString(e,"text/xml"),t&&t.documentElement&&t.documentElement.nodeName!="parsererror"?t:null},P=t.parseJSON||function(e){return window.eval("("+e+")")},H=function(e,n,r){var i=e.getResponseHeader("content-type")||"",s=n==="xml"||!n&&i.indexOf("xml")>=0,o=s?e.responseXML:e.responseText;return s&&o.documentElement.nodeName==="parsererror"&&t.error&&t.error("parsererror"),r&&r.dataFilter&&(o=r.dataFilter(o,n)),typeof o=="string"&&(n==="json"||!n&&i.indexOf("json")>=0?o=P(o):(n==="script"||!n&&i.indexOf("javascript")>=0)&&t.globalEval(o)),o};return E}if(!this.length)return s("ajaxSubmit: skipping submit process - no element selected"),this;var i,o,u,a=this;typeof r=="function"&&(r={success:r}),i=this.attr("method"),o=this.attr("action"),u=typeof o=="string"?t.trim(o):"",u=u||window.location.href||"",u&&(u=(u.match(/^([^#]+)/)||[])[1]),r=t.extend(!0,{url:u,success:t.ajaxSettings.success,type:i||"GET",iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},r);var f={};this.trigger("form-pre-serialize",[this,r,f]);if(f.veto)return s("ajaxSubmit: submit vetoed via form-pre-serialize trigger"),this;if(r.beforeSerialize&&r.beforeSerialize(this,r)===!1)return s("ajaxSubmit: submit aborted via beforeSerialize callback"),this;var l=r.traditional;l===undefined&&(l=t.ajaxSettings.traditional);var c=[],h,p=this.formToArray(r.semantic,c);r.data&&(r.extraData=r.data,h=t.param(r.data,l));if(r.beforeSubmit&&r.beforeSubmit(p,this,r)===!1)return s("ajaxSubmit: submit aborted via beforeSubmit callback"),this;this.trigger("form-submit-validate",[p,this,r,f]);if(f.veto)return s("ajaxSubmit: submit vetoed via form-submit-validate trigger"),this;var d=t.param(p,l);h&&(d=d?d+"&"+h:h),r.type.toUpperCase()=="GET"?(r.url+=(r.url.indexOf("?")>=0?"&":"?")+d,r.data=null):r.data=d;var v=[];r.resetForm&&v.push(function(){a.resetForm()}),r.clearForm&&v.push(function(){a.clearForm(r.includeHidden)});if(!r.dataType&&r.target){var m=r.success||function(){};v.push(function(e){var n=r.replaceTarget?"replaceWith":"html";t(r.target)[n](e).each(m,arguments)})}else r.success&&v.push(r.success);r.success=function(e,t,n){var i=r.context||this;for(var s=0,o=v.length;s<o;s++)v[s].apply(i,[e,t,n||a,a])};var g=t("input:file:enabled[value]",this),y=g.length>0,b="multipart/form-data",w=a.attr("enctype")==b||a.attr("encoding")==b,E=n.fileapi&&n.formdata;s("fileAPI :"+E);var S=(y||w)&&!E,x;r.iframe!==!1&&(r.iframe||S)?r.closeKeepAlive?t.get(r.closeKeepAlive,function(){x=k(p)}):x=k(p):(y||w)&&E?x=C(p):x=t.ajax(r),a.removeData("jqxhr").data("jqxhr",x);for(var T=0;T<c.length;T++)c[T]=null;return this.trigger("form-submit-notify",[this,r]),this},t.fn.ajaxForm=function(e){e=e||{},e.delegation=e.delegation&&t.isFunction(t.fn.on);if(!e.delegation&&this.length===0){var n={s:this.selector,c:this.context};return!t.isReady&&n.s?(s("DOM not ready, queuing ajaxForm"),t(function(){t(n.s,n.c).ajaxForm(e)}),this):(s("terminating; zero elements found by selector"+(t.isReady?"":" (DOM not ready)")),this)}return e.delegation?(t(document).off("submit.form-plugin",this.selector,r).off("click.form-plugin",this.selector,i).on("submit.form-plugin",this.selector,e,r).on("click.form-plugin",this.selector,e,i),this):this.ajaxFormUnbind().bind("submit.form-plugin",e,r).bind("click.form-plugin",e,i)},t.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")},t.fn.formToArray=function(e,r){var i=[];if(this.length===0)return i;var s=this[0],o=e?s.getElementsByTagName("*"):s.elements;if(!o)return i;var u,a,f,l,c,h,p;for(u=0,h=o.length;u<h;u++){c=o[u],f=c.name;if(!f)continue;if(e&&s.clk&&c.type=="image"){!c.disabled&&s.clk==c&&(i.push({name:f,value:t(c).val(),type:c.type}),i.push({name:f+".x",value:s.clk_x},{name:f+".y",value:s.clk_y}));continue}l=t.fieldValue(c,!0);if(l&&l.constructor==Array){r&&r.push(c);for(a=0,p=l.length;a<p;a++)i.push({name:f,value:l[a]})}else if(n.fileapi&&c.type=="file"&&!c.disabled){r&&r.push(c);var d=c.files;if(d.length)for(a=0;a<d.length;a++)i.push({name:f,value:d[a],type:c.type});else i.push({name:f,value:"",type:c.type})}else l!==null&&typeof l!="undefined"&&(r&&r.push(c),i.push({name:f,value:l,type:c.type,required:c.required}))}if(!e&&s.clk){var v=t(s.clk),m=v[0];f=m.name,f&&!m.disabled&&m.type=="image"&&(i.push({name:f,value:v.val()}),i.push({name:f+".x",value:s.clk_x},{name:f+".y",value:s.clk_y}))}return i},t.fn.formSerialize=function(e){return t.param(this.formToArray(e))},t.fn.fieldSerialize=function(e){var n=[];return this.each(function(){var r=this.name;if(!r)return;var i=t.fieldValue(this,e);if(i&&i.constructor==Array)for(var s=0,o=i.length;s<o;s++)n.push({name:r,value:i[s]});else i!==null&&typeof i!="undefined"&&n.push({name:this.name,value:i})}),t.param(n)},t.fn.fieldValue=function(e){for(var n=[],r=0,i=this.length;r<i;r++){var s=this[r],o=t.fieldValue(s,e);if(o===null||typeof o=="undefined"||o.constructor==Array&&!o.length)continue;o.constructor==Array?t.merge(n,o):n.push(o)}return n},t.fieldValue=function(e,n){var r=e.name,i=e.type,s=e.tagName.toLowerCase();n===undefined&&(n=!0);if(n&&(!r||e.disabled||i=="reset"||i=="button"||(i=="checkbox"||i=="radio")&&!e.checked||(i=="submit"||i=="image")&&e.form&&e.form.clk!=e||s=="select"&&e.selectedIndex==-1))return null;if(s=="select"){var o=e.selectedIndex;if(o<0)return null;var u=[],a=e.options,f=i=="select-one",l=f?o+1:a.length;for(var c=f?o:0;c<l;c++){var h=a[c];if(h.selected){var p=h.value;p||(p=h.attributes&&h.attributes.value&&!h.attributes.value.specified?h.text:h.value);if(f)return p;u.push(p)}}return u}return t(e).val()},t.fn.clearForm=function(e){return this.each(function(){t("input,select,textarea",this).clearFields(e)})},t.fn.clearFields=t.fn.clearInputs=function(e){var n=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each(function(){var r=this.type,i=this.tagName.toLowerCase();n.test(r)||i=="textarea"?this.value="":r=="checkbox"||r=="radio"?this.checked=!1:i=="select"?this.selectedIndex=-1:e&&(e===!0&&/hidden/.test(r)||typeof e=="string"&&t(this).is(e))&&(this.value="")})},t.fn.resetForm=function(){return this.each(function(){(typeof this.reset=="function"||typeof this.reset=="object"&&!this.reset.nodeType)&&this.reset()})},t.fn.enable=function(e){return e===undefined&&(e=!0),this.each(function(){this.disabled=!e})},t.fn.selected=function(e){return e===undefined&&(e=!0),this.each(function(){var n=this.type;if(n=="checkbox"||n=="radio")this.checked=e;else if(this.tagName.toLowerCase()=="option"){var r=t(this).parent("select");e&&r[0]&&r[0].type=="select-one"&&r.find("option").selected(!1),this.selected=e}})},t.fn.ajaxSubmit.debug=!1})(e)})