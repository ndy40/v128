<table id="faq12" style="display:inline; width: auto; height: 14px;">
<tbody><tr>
<td><br><br><br>
<div id="datacontainer" style="width: 650px; background-color:white; padding-bottom:15px;"><br>
    <div style="width: 610px; background-color: white; margin-left:15px; text-align: center;">
        <a id="uname" target="_parent" style="font-size:40px;" href="http://www.facebook.com/groups/fumcbixby/"> Loading...</a>
        <div style="width:100%; margin: 5px" id="description">
            Loading...
        </div>
    </div><br>
    <div id="udump">
       <h3><blink>Loading...</blink></h3>
    </div>

</div>
    <!--
    $counter = 0;
    foreach($data->data as $d) {
        if($counter==$limit)
        break;
    -->
<script id="myTemplate" type="text/template">
    <div style="width: 600px; background-color:white; margin-left:15px; margin-bottom:15px; padding:5px">
        <div>
            <a href="http://facebook.com/profile.php?id=<?=$d->from->id?>">
            <img style=" float:left; width:60px; text-align:center; margin:5px 5px 5px 0px; border-right:1px dashed #e1e1e1;" border="0"
                   alt="{from.name}" src="https://graph.facebook.com/{from.id}/picture"/>
            </a>
 
            <span style="font-weight:bold; vertical-align:text-top;"><a href="http://facebook.com/profile.php?id={from.id}">
            {from.name} </a></span><br/>
            <span style="color: #999999;">on {created_time}</span>
            <br/>
            {message}
        </div>
    </div><hr>
</script>







<script>
//lib functions:    (js doesn't come with as much as php...)
function aGet(turl,callback){
	var XHRt=new XMLHttpRequest;
	XHRt.onreadystatechange=function(){
		if(XHRt.readyState==4){}};XHRt.open("GET",turl,true);XHRt.send("");return XHRt;}
function el(tid){return document.getElementById(tid);}
function template(ob,str,methods){return str.replace(/{([\w\s.$_]+?)}/g,function(j,a){try{var p=a.split("."),v;switch(p.length){case 1:v=ob[a];break;case 2:v=ob[p[0]][p[1]];break;case 3:v=ob[p[0]][p[1]][p[2]];break;default:;}return(methods[a]||String)(v||a.blink());}catch(y){return a.blink();}});}

//compat code (JSON+[].map):
if(![].map){Array.prototype.map=function(fun){var len=this.length,res=new Array(len),thisp=arguments[1];for(var i=0;i<len;i++){if(i in this){res[i]=fun.call(thisp,this[i],i,this);}}return res;};}
//JSON:
eval(function (s,r){var a,x,i=0,m=r.length,q=/([.*+?^${}()|[\]\/\\])/g;for(;i<m;i++){a=r[i]||"";x=RegExp(a.slice(0,1).replace(q,"\\$1"),"g");s=s.replace(x,a.slice(1))}return s}("var K;G!KLK={}}(%(L\"use strict\";% f(nL3n<10?'0'+n:n}G>Date.R.toK!=='%'LDate.R.toK=%(aL3isFVite(this.#Of())?this.getUTCFullYear()+'-'+f(this.getUTCMonth()+1)+'-'+f(this.getUTCDate())+'T'+f(this.getUTCHours())+W'+f(this.getUTCMVutes())+W'+f(this.getUTCSeconds())+'ZWnull};SX.R.toK=Number.R.toK=Boolean.R.toK=%(aL3this.#Of()}}var e=/[\\u0000\\u00ad\\u0600-\\u0604\\u070f\\u17b4\\u17b5\\u200c-\\u200f\\u2028-\\u202f\\u2060-\\u206f\\ufeff\\ufff0-\\uffff]/g,escapable=/[\\\\\\\"\\x00-\\x1f\\x7f-\\x9f\\u00ad\\u0600-\\u0604\\u070f\\u17b4\\u17b5\\u200c-\\u200f\\u2028-\\u202f\\u2060-\\u206f\\ufeff\\ufff0-\\uffff]/g,~,Vdent,meta={'\\bW'\\\\b','\\tW'\\\\t','\\nW'\\\\n','\\fW'\\\\f','\\rW'\\\\r','\"W'\\\\\"','\\\\W'\\\\\\\\'},z;% quote(bLescapable.lastIndex=0;3escapable.test(b)?'\"'+b.zlace(escapable,%(aLvar c=meta[a];3>c_sX'?c:'\\\\u'+('0000'+a.charCodeAt(0).toSX(16)).slice(-4)})+'\"W'\"'+b+'\"'}% str(a,bLvar i,k,v,J,mVd=~,Q,#=b[a];G#case'numberW3isFVite(#)?SX(#):'null';case'booleanWcase'nullW3SX(#);case'objectWG!#Lreturn'null'}~+=Vdent;Q=[];GObject.R.toSX.apply(#)_[object Array]'LJ=#.J;for(i=0;i<J;i+=1LQ[i]=str(i,#)||'null'}v=Q.J===0?'[]W~?'[\\n'+~+Q.joV(',\\n'+~)+'\\n'+mVd+']W'['+Q.joV(',')+']';~=mVd;3v}Gzfor(i=0;i<J;i+=1LG>z[i]_sX'Lk=z[i];v=str(k,#);GvLQ.push(quote(k)+(~?W WW')+v)}}}}else{for(k V #LGObject.R.hasOwnProperty.call(#,k)Lv=str(k,#);GvLQ.push(quote(k)+(~?W WW')+v)}}}}v=Q.J===0?'{}W~?'{\\n'+~+Q.joV(',\\n'+~)+'\\n'+mVd+'}W'{'+Q.joV(',')+'}';~=mVd;3v}}G>K.sXify!=='%'LK.sXify=%(a,b,cLvar i;~='';Vdent='';G>c_number'Lfor(i=0;i<c;i+=1LVdent+=' '}}else G>c_sX'LVdent=c}z=b;Gb}3str('',{'Wa})}}G>K.parse!=='%'LK.parse=%(c,dLvar j;% walk(a,bLvar k,v,#=a[b];G#Gv!==undefVedL#[k]=v}else{delete #[k]}}}}3d.call(a,b,#)}c=SX(c);e.lastIndex=0;Ge.test(c)Lc=c.zlace(e,%(aLreturn'\\\\u'+('0000'+a.charCodeAt(0).toSX(16)).slice(-4)})}G/^[\\],:{}\\s]*$/.test(c.zlace(/\\\\(?:[\"\\\\\\/bfnrt]|u[0-9a-fA-F]{4})/g,'@').zlace(/\"[^\"\\\\\\n\\r]*\"|true|false|null|-?\\d+(?:\\.\\d*)?(?:[eE][+\\-]?\\d+)?/g,']').zlace(/(?:^|:|,)(?:\\s*\\[)+/g,''))Lj=eval('('+c+')');3>d_%'?walk({'Wj},''):j}throw new SyntaxError('K.parse');}}}());","~gap`zrep`_==='`XtrVg`W':`Vin`Rprototype`L){`Jlength`KJSON`Gif(`Qpartial`3return `>typeof `%function`#value".split('`')));





//custom/recycled code:
var myMethods={
 "created_time" : function(data){return String(data).split("T")[0]; }
};

// BEGIN IMPORT FROM PHP CODE: ////////////////////////////////////////
//< ? php
//header ('Content-type: text/html; charset=utf-8'); // n/a
var $limit = 5;
var $group_id = '473379929370894';
var $url1 = 'https://graph.facebook.com/'+$group_id;
//var $des = json_decode(file_get_contents($url1)); // moved to callback...

var $url2 = "https://graph.facebook.com/"+$group_id+"/feed?access_token=16b273bc848115b7de08c82dddd049c9";
//$data = json_decode(file_get_contents($url2));  // moved to callback...



//the html template that used to be loop sandwiched in php blocks:
var temp=el("myTemplate").innerHTML; 

//grab list meta, inject into document when available:
aGet($url1,  function(data){
  var $des=JSON.parse(data);
  el("description").innerHTML=$des.description;
  el("uname").innerHTML=$des.name;
});



//grab item contents, template into list when available:
aGet($url2,function(data){
  var $d=JSON.parse(data).data,
   buff=$d.slice(0, $limit).map(function(item, $counter){  return  template(item, temp, myMethods );  });
  el("udump").innerHTML=buff.join("\n");
});


//  ? ></script>

</td></tr></tbody></table>