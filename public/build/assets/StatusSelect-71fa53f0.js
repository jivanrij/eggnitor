import{y as d,d as r,o as u,e as c,l as p,R as m,u as t,a as s,H as v}from"./app-5573e8b2.js";const g=["selected"],f=["selected"],_=["selected"],h=["selected"],y={__name:"StatusSelect",props:{house:{type:Object,required:!0}},emits:["updateStatusEvent"],setup(a,{emit:S}){const l=a;d(()=>{e.value=l.house.status});let e=r(0);return(i,o)=>(u(),c("div",null,[p(s("select",{onChange:o[0]||(o[0]=n=>i.$emit("updateStatusEvent",t(e))),name:"location","onUpdate:modelValue":o[1]||(o[1]=n=>v(e)?e.value=n:e=n),class:"mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"},[s("option",{selected:t(e)===0,value:0},"Nog aanbellen",8,g),s("option",{selected:t(e)===1,value:1},"Deden niet open",8,f),s("option",{selected:t(e)===2,value:2},"Eieren verkocht",8,_),s("option",{selected:t(e)===3,value:3},"Niets verkocht",8,h)],544),[[m,t(e)]])]))}};export{y as default};
