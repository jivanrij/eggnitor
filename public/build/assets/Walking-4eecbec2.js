import{_ as f}from"./AppLayout-90038f59.js";import h from"./Table-3213a4d2.js";import{G as x,d as g,y as v,o as w,c as k,w as u,a as s,b as y,u as S}from"./app-d693375e.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./House-904a5750.js";import"./MapsButton-d205f252.js";import"./Select-c876bb39.js";const r=x.create({baseURL:"",withCredentials:!0});r.interceptors.response.use(t=>t,function(t){return t.response&&[401,419].includes(t.response.status),Promise.reject(t)});const b={async updateStatus(t){return await r.get("/sanctum/csrf-cookie"),r.post("/update-status",t)}},E=s("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Adressen ",-1),A={class:"py-12"},B={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},C={class:"bg-white overflow-hidden shadow-xl sm:rounded-lg lg:p-8"},q={__name:"Walking",props:{streets:{type:Array,required:!0}},setup(t){const c=t;let e=g([]);v(()=>{e.value=c.streets});const l=(a,o,n)=>{e.value.forEach((d,i)=>{d.key===o&&e.value[i].houses.forEach((p,m)=>{p.key===n&&(e.value[i].houses[m].status=a,b.updateStatus({streetPart:o,week:1,house:n,status:a}).then(_=>{console.log(_)}))})})};return(a,o)=>(w(),k(f,{title:"Walking"},{header:u(()=>[E]),default:u(()=>[s("div",A,[s("div",B,[s("div",C,[y(h,{onUpdateStatusEvent:l,streets:S(e)},null,8,["streets"])])])])]),_:1}))}};export{q as default};