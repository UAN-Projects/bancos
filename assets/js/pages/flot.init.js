!function(b){"use strict";var a=function(){this.$body=b("body"),this.$realData=[]};a.prototype.createPlotGraph=function(a,o,t,e,r,i,l){b.plot(b(a),[{data:o,label:e[0],color:r[0]},{data:t,label:e[1],color:r[1]}],{series:{lines:{show:!0,fill:!0,lineWidth:2,fillColor:{colors:[{opacity:.5},{opacity:.5},{opacity:.8}]}},points:{show:!0},shadowSize:0},grid:{hoverable:!0,clickable:!0,borderColor:i,tickColor:"#f9f9f9",borderWidth:1,labelMargin:30,backgroundColor:l},legend:{position:"ne",margin:[0,-32],noColumns:0,labelBoxBorderColor:null,labelFormatter:function(a,o){return a+"&nbsp;&nbsp;"},width:30,height:2},yaxis:{axisLabel:"Daily Visits",tickColor:"#3b434e",font:{color:"#8391a0"}},xaxis:{axisLabel:"Last Days",tickColor:"#3b434e",font:{color:"#8391a0"}},tooltip:!0,tooltipOpts:{content:"%s: Value of %x is %y",shifts:{x:-60,y:25},defaultTheme:!1},splines:{show:!0,tension:.1,lineWidth:1}})},a.prototype.createPlotDotGraph=function(a,o,t,e,r,i,l){b.plot(b(a),[{data:o,label:e[0],color:r[0]},{data:t,label:e[1],color:r[1]}],{series:{lines:{show:!0,fill:!1,lineWidth:3,fillColor:{colors:[{opacity:.3},{opacity:.3}]}},curvedLines:{apply:!0,active:!0,monotonicFit:!0},splines:{show:!0,tension:.4,lineWidth:5,fill:.4}},grid:{hoverable:!0,clickable:!0,borderColor:i,tickColor:"#f9f9f9",borderWidth:1,labelMargin:10,backgroundColor:l},legend:{position:"ne",margin:[0,-32],noColumns:0,labelBoxBorderColor:null,labelFormatter:function(a,o){return a+"&nbsp;&nbsp;"},width:30,height:2},yaxis:{axisLabel:"Gold Price(USD)",tickColor:"#3b434e",font:{color:"#8391a0"}},xaxis:{axisLabel:"Numbers",tickColor:"#3b434e",font:{color:"#8391a0"}},tooltip:!1})},a.prototype.createPieGraph=function(a,o,t,e){var r=[{label:o[0],data:t[0]},{label:o[1],data:t[1]},{label:o[2],data:t[2]},{label:o[3],data:t[3]},{label:o[4],data:t[4]}],i={series:{pie:{show:!0,radius:1,label:{show:!0,radius:1,background:{opacity:.2}}}},legend:{show:!1},grid:{hoverable:!0,clickable:!0},colors:e,tooltip:!0,tooltipOpts:{content:"%s, %p.0%"}};b.plot(b(a),r,i)},a.prototype.randomData=function(){for(0<this.$realData.length&&(this.$realData=this.$realData.slice(1));this.$realData.length<300;){var a=(0<this.$realData.length?this.$realData[this.$realData.length-1]:50)+10*Math.random()-5;a<0?a=0:100<a&&(a=100),this.$realData.push(a)}for(var o=[],t=0;t<this.$realData.length;++t)o.push([t,this.$realData[t]]);return o},a.prototype.createRealTimeGraph=function(a,o,t){return b.plot(a,[o],{colors:t,series:{grow:{active:!1},shadowSize:0,lines:{show:!0,fill:!0,lineWidth:2,steps:!1}},grid:{show:!0,aboveData:!1,color:"#dcdcdc",labelMargin:15,axisMargin:0,borderWidth:0,borderColor:null,minBorderMargin:5,clickable:!0,hoverable:!0,autoHighlight:!1,mouseActiveRadius:20},tooltip:!0,tooltipOpts:{content:"Value is : %y.0%",shifts:{x:-30,y:-50}},yaxis:{axisLabel:"Response Time (ms)",min:0,max:100,tickColor:"#3b434e",font:{color:"#8391a0"}},xaxis:{axisLabel:"Point Value (1000)",show:!0,tickColor:"#3b434e",font:{color:"#8391a0"}}})},a.prototype.createDonutGraph=function(a,o,t,e){var r=[{label:o[0],data:t[0]},{label:o[1],data:t[1]},{label:o[2],data:t[2]},{label:o[3],data:t[3]},{label:o[4],data:t[4]}],i={series:{pie:{show:!0,innerRadius:.7}},legend:{show:!0,labelFormatter:function(a,o){return'<div style="font-size:14px;">&nbsp;'+a+"</div>"},labelBoxBorderColor:null,margin:50,width:20},grid:{hoverable:!0,clickable:!0},colors:e,tooltip:!0,tooltipOpts:{content:"%s, %p.0%"}};b.plot(b(a),r,i)},a.prototype.createStackBarGraph=function(a,o,t,e){var r={bars:{show:!0,barWidth:.2,fill:1},grid:{show:!0,aboveData:!1,labelMargin:5,axisMargin:0,borderWidth:1,minBorderMargin:5,clickable:!0,hoverable:!0,autoHighlight:!1,mouseActiveRadius:20,borderColor:"#3b434e"},series:{stack:0},legend:{position:"ne",margin:[0,-32],noColumns:0,labelBoxBorderColor:null,labelFormatter:function(a,o){return a+"&nbsp;&nbsp;"},width:30,height:2},yaxis:o.y,xaxis:o.x,colors:t,tooltip:!0,tooltipOpts:{content:"%s : %y.0",shifts:{x:-30,y:-50}}};b.plot(b(a),e,r)},a.prototype.createLineGraph=function(a,o,t,e){var r={series:{lines:{show:!0},points:{show:!0}},legend:{position:"ne",margin:[0,-32],noColumns:0,labelBoxBorderColor:null,labelFormatter:function(a,o){return a+"&nbsp;&nbsp;"},width:30,height:2},yaxis:o.y,xaxis:o.x,colors:t,grid:{hoverable:!0,borderColor:"#3b434e",borderWidth:1,backgroundColor:"transparent"},tooltip:!0,tooltipOpts:{content:"%s : %y.0",shifts:{x:-30,y:-50}}};return b.plot(b(a),e,r)},a.prototype.createCombineGraph=function(a,o,t,e){var r=[{label:t[0],data:e[0],lines:{show:!0,fill:!0},points:{show:!0}},{label:t[1],data:e[1],lines:{show:!0},points:{show:!0}},{label:t[2],data:e[2],bars:{show:!0}}],i={series:{shadowSize:0},grid:{hoverable:!0,clickable:!0,tickColor:"#f9f9f9",borderWidth:1,borderColor:"transparent"},colors:["#e3eaef","#f1556c","#3bafda"],tooltip:!0,tooltipOpts:{defaultTheme:!1},legend:{position:"ne",margin:[0,-32],noColumns:0,labelBoxBorderColor:null,labelFormatter:function(a,o){return a+"&nbsp;&nbsp;"},width:30,height:2},yaxis:{axisLabel:"Point Value (1000)",tickColor:"#3b434e",font:{color:"#8391a0"}},xaxis:{axisLabel:"Daily Hours",ticks:o,tickColor:"#3b434e",font:{color:"#8391a0"}}};b.plot(b(a),r,i)},a.prototype.init=function(){this.createPlotGraph("#website-stats",[[0,13],[1,22],[2,27],[3,36],[4,40],[5,25],[6,36],[7,20],[8,12],[9,20],[10,48],[11,16],[12,14]],[[0,28],[1,56],[2,26],[3,20],[4,21],[5,25],[6,19],[7,22],[8,35],[9,28],[10,36],[11,19],[12,11]],["Bitcoin","Ethereum"],["#3bafda","#1abc9c"],"#3b434e","transparent");this.createPlotDotGraph("#website-stats1",[[0,2],[1,4],[2,7],[3,9],[4,6],[5,3],[6,10],[7,8],[8,5],[9,14],[10,10],[11,10],[12,8]],[[0,1],[1,3],[2,6],[3,7],[4,4],[5,2],[6,8],[7,6],[8,4],[9,10],[10,8],[11,14],[12,5]],["Bitcoin","Ethereum"],["#3bafda","#1abc9c"],"#3b434e","transparent");this.createPieGraph("#pie-chart #pie-chart-container",["Bitcoin","Ethereum","Litecoin","Bitcoin Cash","Cardano"],[48,30,15,32,26],["#3bafda","#26c6da","#80deea","#00b19d","#d1dee4"]);var o=this.createRealTimeGraph("#flotRealTime",this.randomData(),["#3bafda"]);o.draw();var t=this;!function a(){o.setData([t.randomData()]),o.draw(),setTimeout(a,(b("html").hasClass("mobile-device"),500))}();this.createDonutGraph("#donut-chart #donut-chart-container",["Bitcoin","Ethereum","Litecoin","Bitcoin Cash","Cardano"],[48,30,15,32,26],["#3bafda","#26c6da","#80deea","#00b19d","#d1dee4"]);var a=[[[0,201],[1,520],[2,337],[3,261],[4,157],[5,95],[6,200],[7,250],[8,320],[9,500],[10,152],[11,214],[12,364],[13,449],[14,558],[15,282],[16,379],[17,429],[18,518],[19,470],[20,330],[21,245],[22,358],[23,74]],[[0,311],[1,630],[2,447],[3,371],[4,267],[5,205],[6,310],[7,360],[8,430],[9,610],[10,262],[11,324],[12,474],[13,559],[14,668],[15,392],[16,489],[17,539],[18,628],[19,580],[20,440],[21,355],[22,468],[23,184]],[[23,727],[22,128],[21,110],[20,92],[19,172],[18,63],[17,150],[16,592],[15,12],[14,246],[13,52],[12,149],[11,123],[10,2],[9,325],[8,10],[7,15],[6,89],[5,65],[4,77],[3,600],[2,200],[1,385],[0,200]]];this.createCombineGraph("#combine-chart #combine-chart-container",[[0,"22h"],[1,""],[2,"00h"],[3,""],[4,"02h"],[5,""],[6,"04h"],[7,""],[8,"06h"],[9,""],[10,"08h"],[11,""],[12,"10h"],[13,""],[14,"12h"],[15,""],[16,"14h"],[17,""],[18,"16h"],[19,""],[20,"18h"],[21,""],[22,"20h"],[23,""]],["Last 24 Hours","Last 48 Hours","Difference"],a);for(var e=[],r=0;r<=10;r+=1)e.push([r,parseInt(30*Math.random())]);var i=[];for(r=0;r<=10;r+=1)i.push([r,parseInt(30*Math.random())]);var l=[];for(r=0;r<=10;r+=1)l.push([r,parseInt(30*Math.random())]);var s=new Array;s.push({label:"Series One",data:e,bars:{order:1}}),s.push({label:"Series Two",data:i,bars:{order:2}}),s.push({label:"Series Three",data:l,bars:{order:3}}),this.createStackBarGraph("#ordered-bars-chart",{y:{axisLabel:"Sales Value (USD)",tickColor:"#3b434e",font:{color:"#8391a0"}},x:{axisLabel:"Last 10 Days",tickColor:"#3b434e",font:{color:"#8391a0"}}},["#e3eaef","#3bafda","#1abc9c"],s);var n=[],h=[];for(r=0;r<12;r+=.2)n.push([r,Math.sin(r+0)]),h.push([r,Math.cos(r+0)]);var c=[{data:n,label:"Google"},{data:h,label:"Yahoo"}];this.createLineGraph("#line-chart-alt",{y:{min:-1.2,max:1.2,tickColor:"#3b434e",font:{color:"#8391a0"}},x:{tickColor:"#3b434e",font:{color:"#8391a0"}}},["#3bafda","#1abc9c"],c)},b.FlotChart=new a,b.FlotChart.Constructor=a}(window.jQuery),function(a){"use strict";window.jQuery.FlotChart.init()}();